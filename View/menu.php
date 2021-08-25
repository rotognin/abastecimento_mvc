<?php

session_start();

use Model;

$usuario = Model\Usuario::carregar($_SESSION['usuID']);
if (!$usuario){
    $_SESSION['mensagem'] .= ' - Realize o login no sistema.';
    header ('Location: index.php');
    Exit;
}

?>

<!DOCTYPE html>
<html>
<?php include 'html' . DIRECTORY_SEPARATOR . 'head.php'; ?>
<body>
    <?php include 'html' . DIRECTORY_SEPARATOR . 'menu.php'; ?>
    <br>
    <div class="w3-container w3-card-4 w3-margin">
        <h3>Últimos abastecimentos:</h3>
        <p>
            <table class='w3-table w3-striped w3-bordered'>
                <tr><th>Data</th><th>Veículo</th></tr>
                <tr><td>01/02/2021 15:35</td><td>FXB-4585</td></tr>
                <tr><td>02/02/2021 10:30</td><td>GTF-4005</td></tr>
                <tr><td>15/02/2021 08:01</td><td>FXB-4585</td></tr>
                <tr><td>17/02/2021 22:00</td><td>GTF-4005</td></tr>
            </table>
        </p>
        <br>
    </div>
</body>
</html>

