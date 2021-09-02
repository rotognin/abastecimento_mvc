<?php

namespace View;

use Model as Model;

$abaID = (isset($_SESSION['abaID'])) ? $_SESSION['abaID'] : 0;

$abastecimento = Model\Abastecimento::getArray();
$novo = true;

if ($abaID > 0){
    $abastecimento = Model\Abastecimento::carregarAbastecimentoUnico($abaID);

    if (!$abastecimento){
        $_SESSION['mensagem'] = 'Não foi possível carregar os dados do abastecimento.';
    } else {
        $novo = false;
    }
}

if (!isset($_SESSION['mensagem']))
{
    $_SESSION['mensagem'] = '';
}

$mensagem = $_SESSION['mensagem'];
$_SESSION['mensagem'] = '';

// Trazer os veículos ativos do usuário logado
$veiculos = Model\Veiculo::carregarVeiculos($usuID, 1);

if (count($veiculos) == 0){
    $mensagem = 'Nenhum veículo cadastrado. Não será possível realizar o abastecimento.';
}

$abaData = str_replace('/', '-', substr($abastecimento['abaDataHora'], 0, 10));
$abaHora = substr($abastecimento['abaDataHora'], 11, 5);

?>

<!DOCTYPE html>
<html>
<?php include 'html' . DIRECTORY_SEPARATOR . 'head.php'; ?>
<body>
    <div class="w3-container w3-card-4">
        <h3>Abastecimento</h3>
        <a class="w3-button w3-blue" href="principal.php?action=menu">Início</a>
        <br><br>
    </div>
    <div class="w3-container w3-card-4">
        <p>
            <?php include_once 'lib/mensagem.php'; ?>

            <form method="post" 
                  class="w3-container" 
                  action="principal.php?control=abastecimento&action=<?php echo verdade($novo, 'gravarAbastecimento', 'atualizarAbastecimento'); ?>">
                <!-- Placa -->
                <label for="abaPlaca">Placa:</label>
                <select class="w3-select" id="abaPlaca" name="abaPlaca">
                <?php
                    foreach($veiculos as $veiculo)
                    {
                        echo '<option value="' . $veiculo['veiPlaca'] . '" ';

                        if (!$novo && $abastecimento['abaPlaca'] == $veiculo['veiPlaca']){
                            echo 'selected';
                        }

                        echo '>';
                        echo $veiculo['veiPlaca'] . ' - ' . $veiculo['veiModelo'];
                        echo '&nbsp;&nbsp;&nbsp;</option>';
                    }
                ?>
                </select>
                <br><br>
                <!-- Data e Hora -->
                <label for="abaData">Data:</label>
                <input type="date" id="abaData" name="abaData" value="<?php echo $abaData; ?>">
                <label for="abaHora">Hora:</label>
                <input type="time" id="abaHora" name="abaHora" value="<?php echo $abaHora; ?>">
                <br><br>
                <!-- Combustível -->
                <label for="abaCombustivel">Combustível:</label>
                <select class="w3-select" id="abaCombustivel" name="abaCombustivel">
                <?php
                    foreach($combustiveis as $codigo => $combustivel)    
                    {
                        echo '<option value="' . $codigo . '" ';
                        
                        if (!$novo && $abastecimento['abaCombustivel'] == $codigo){
                            echo 'selected';
                        }
                        echo '>';
                        echo $combustivel . '&nbsp;&nbsp;&nbsp;</option>';
                    }
                ?>
                </select>
                <br><br>
                <!-- Quantidade -->
                <label for="abaQuantidade">Quantidade:</label>
                <input type="number" id="abaQuantidade" 
                       name="abaQuantidade" value="<?php echo $abastecimento['abaQuantidade']; ?>" required 
                       min="0" step=".01">
                <br><br>
                <!-- Valor Total -->
                <label for="abaValor">Valor Total:</label>
                <input type="number" id="abaValor" 
                       name="abaValor" value="<?php echo $abastecimento['abaValor']; ?>" min="0" step=".01">
                <!-- Valor Unitário -->
                <?php
                    if (!$novo && $abastecimento['abaQuantidade'] > 0 && $abastecimento['abaValor'] > 0){
                        echo '&nbsp;&nbsp;&nbsp;';
                        echo '<label for="abaValorUnitario">Valor Unitário: </label>';
                        echo '<input type="number" id="abaValorUnitario" name="abaValorUnitario" ';
                        echo 'value="' . number_format((float)$abastecimento['abaValor'] / (float)$abastecimento['abaQuantidade'], 2, '.', '') . '" ';
                        echo 'readonly>';
                    }
                ?>
                <br><br>
                <!-- Km -->
                <label for="abaKm">Km:</label>
                <input type="number" id="abaKm" name="abaKm" value="<?php echo $abastecimento['abaKm']; ?>">
                <br><br>
                <!-- Forma de Pagamento -->
                <label for="abaPagamento">Forma de Pagamento:</label>
                <select class="w3-select" id="abaPagamento" name="abaPagamento">
                <?php
                    foreach($pagamentos as $codigo => $pagamento)
                    {
                        echo '<option value="' . $codigo . '" ';
                        if (!$novo && $abastecimento['abaPagamento'] == $codigo){
                            echo 'selected';
                        }
                        echo '>' . $pagamento . '&nbsp;&nbsp;&nbsp;</option>';
                    }
                ?>
                </select>
                <br><br>
                <!-- Observações -->
                <label for="abaObservacao">Observações:</label>
                <input type="text" id="abaObservacao" 
                       name="abaObservacao" size="80" style="text-transform:uppercase"
                       value="<?php echo $abastecimento['abaObservacao']; ?>">

                <input type="hidden" name="abaID" value="<?php echo $abastecimento['abaID']; ?>">
                <input type="hidden" name="abaUsuID" value="<?php echo $abastecimento['abaUsuID']; ?>">
                <br><br>
                <?php if (count($veiculos) > 0) {
                    echo '<input type="submit" value="Gravar" class="w3-button w3-blue">';
                }
                ?>
            </form>
        </p>
        <br>
    </div>
</body>
</html>