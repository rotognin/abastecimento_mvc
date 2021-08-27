<?php

use Model as Model;

$veiID = (isset($_SESSION['veiID'])) ? $_SESSION['veiID'] : 0;

$veiculo = Model\Veiculo::getArray();
$novo = true;

if ($veiID > 0){
    $veiculo = Model\Veiculo::carregarVeiculoUnico($veiID);
    $novo = false;
}

?>

<!DOCTYPE html>
<html>
<?php include 'html' . DIRECTORY_SEPARATOR . 'head.php'; ?>
<body>
    <div class="w3-container w3-card-4 w3-margin">
        <h3><?php echo verdade($novo, 'Novo ', 'Editar '); ?>Veículo</h3>
        <a class="w3-button w3-blue" href="principal.php?action=menu">Início</a>
        <br><br>
    </div>
    <div class="w3-container w3-card-4 w3-margin">
        <p>
            <form method="post" 
                  class="w3-container" 
                  action="principal.php?control=veiculo&action=<?php echo verdade($novo, 'gravarVeiculo', 'atualizarVeiculo'); ?>">
                <label for="veiID">ID:</label>
                <input type="text" id="veiID" name="veiID" value="<?php echo $veiculo['veiID']; ?>" disabled>
                <br><br>
                <label for="veiPlaca">Placa:</label>
                <input type="text" id="veiPlaca" 
                       name="veiPlaca" value="<?php echo $veiculo['veiPlaca']; ?>" autofocus
                       size="10" style="text-transform:uppercase" maxlength="7">
                <br><br>
                <label for="veiMarca">Marca:</label>
                <input type="text" id="veiMarca" 
                       name="veiMarca" value="<?php echo $veiculo['veiMarca']; ?>"
                       style="text-transform:uppercase">
                <br><br>
                <label for="veiModelo">Modelo:</label>
                <input type="text" id="veiModelo" 
                       name="veiModelo" value="<?php echo $veiculo['veiModelo']; ?>"
                       style="text-transform:uppercase">
                <br><br>
                <label for="veiAno">Ano:</label>
                <input type="number" id="veiAno" 
                       name="veiAno" value="<?php echo $veiculo['veiAno']; ?>"
                       min="1950" max="2050">
                <br><br>
                <label for="veiDescricao">Descrição:</label>
                <input type="text" id="veiDescricao" 
                       name="veiDescricao" value="<?php echo $veiculo['veiDescricao']; ?>"
                       size="80" style="text-transform:uppercase">
                <br><br>
                <p>Situação:
                    <br>
                    <input type="radio" id="veiSituacaoAtivo" name="veiSituacao" value="1"
                           <?php if ($veiculo['veiSituacao'] == 1) { echo ' checked '; }?>>
                    <label for="veiSituacaoAtivo">Ativo</label>
                    <br>
                    <input type="radio" id="veiSituacaoInativo" name="veiSituacao" value="2"
                           <?php if ($veiculo['veiSituacao'] == 2) { echo ' checked '; }?>>
                    <label for="veiSituacaoAtivo">Inativo</label>
                </p>
                <input type="hidden" name="veiUsuID" value="<?php echo $veiculo['veiUsuID']; ?>">
                <input type="submit" value="Gravar" class="w3-button w3-blue">
            </form>
        </p>
        <br>
    </div>
</body>
</html>