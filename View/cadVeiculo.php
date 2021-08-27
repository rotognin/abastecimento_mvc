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
            Formulário do veículo....
            <?php echo $veiculo['veiID'] . ' - ' . $veiculo['veiPlaca']; ?>
        </p>
        <br>
    </div>
</body>
</html>