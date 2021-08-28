<?php

use Model as Model;

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

?>

<!DOCTYPE html>
<html>
<?php include 'html' . DIRECTORY_SEPARATOR . 'head.php'; ?>
<body>
    <div class="w3-container w3-card-4 w3-margin">
        <h3>Abastecimento</h3>
        <a class="w3-button w3-blue" href="principal.php?action=menu">Início</a>
        <br><br>
    </div>
    <div class="w3-container w3-card-4 w3-margin">
        <p>
            <?php include_once 'lib/mensagem.php'; ?>

            <form method="post" 
                  class="w3-container" 
                  action="principal.php?control=abastecimento&action=gravarAbastecimento">
                <!-- Placa -->
                <label for="abaPlaca">Placa:</label>
                <select class="w3-select" id="abaPlaca" name="abaPlaca">
                <?php
                    foreach($veiculos as $veiculo)
                    {
                ?>
                        <option value="<?php echo $veiculo['veiPlaca'] ?>">
                            <?php echo $veiculo['veiPlaca'] . ' - ' . $veiculo['veiModelo']; ?>
                        </option>
                <?php
                    }
                ?>
                </select>
                <br><br>
                <!-- Data e Hora -->
                <label for="abaData">Data:</label>
                <input type="date" id="abaData" name="abaData">
                <label for="abaHora">Hora:</label>
                <input type="time" id="abaHora" name="abaHora">
                <br><br>
                <!-- Combustível -->
                <label for="abaCombustivel">Combustível:</label>
                <select class="w3-select" id="abaCombustivel" name="abaCombustivel">
                    <option value="1">Gasolina</option>
                    <option value="2">Etanol</option>
                    <option value="3">Diesel</option>
                    <option value="4">Gasolina Aditivada</option>
                    <option value="5">Etanol Aditivado</option>
                    <option value="6">Gás (GNV)</option>
                </select>
                <br><br>
                <!-- Quantidade -->
                <label for="abaQuantidade">Quantidade:</label>
                <input type="number" id="abaQuantidade" 
                       name="abaQuantidade" value="0" required 
                       min="0" step=".01">
                <br><br>
                <!-- Valor -->
                <label for="abaValor">Valor:</label>
                <input type="number" id="abaValor" 
                       name="abaValor" value="0" min="0" step=".01">
                <br><br>
                <!-- Km -->
                <label for="abaKm">Km:</label>
                <input type="number" id="abaKm" name="abaKm" value="0">
                <br><br>
                <!-- Forma de Pagamento -->
                <label for="abaPagamento">Forma de Pagamento:</label>
                <select class="w3-select" id="abaPagamento" name="abaPagamento">
                    <option value="1">Dinheiro</option>
                    <option value="2">Débito</option>
                    <option value="3">Crédito</option>
                    <option value="4">Convênio</option>
                    <option value="5">PIX</option>
                    <option value="6">Promocional</option>
                </select>
                <br><br>
                <!-- Observações -->
                <label for="abaObservacao">Observações:</label>
                <input type="text" id="abaObservacao" 
                       name="abaObservacao" size="80" style="text-transform:uppercase">

                <input type="hidden" name="abaUsuID" value="<?php echo $usuID; ?>">
                <br>
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