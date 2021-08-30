<?php

use Model as Model;

$usuario = Model\Usuario::carregar($_SESSION['usuID']);
if (!$usuario){
    $_SESSION['mensagem'] .= ' - Realize o login no sistema.';
    header ('Location: index.php');
    Exit;
}

$ultimosAbastecimentos = Model\Abastecimento::ultimos(5);

?>

<!DOCTYPE html>
<html>
<?php include 'html' . DIRECTORY_SEPARATOR . 'head.php'; ?>
<body>
    <?php include 'html' . DIRECTORY_SEPARATOR . 'menu.php'; ?>
    <div class="w3-container w3-card-4 w3-margin">
        <h3>Últimos abastecimentos:</h3>
        <p>
            <table class='w3-table w3-striped w3-bordered'>
                <tr>
                    <th>Veículo</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Km</th>
                    <th>Combustível</th>
                    <th>Valor Total</th>
                </tr>
                <?php
                    foreach ($ultimosAbastecimentos as $abastecimento)
                    {
                        echo '<tr>';
                        echo '<td>' . $$abastecimento['abaPlaca'] . '</td>';
                        echo '<td>' . ajustarData($abastecimento['abaDataHora']) . '</td>';
                        echo '<td>' . ajustarHora($abastecimento['abaDataHora']) . '</td>';
                        echo '<td>' . $abastecimento['abaKm'] . '</td>';
                        echo '<td>' . $combustiveis[$abastecimento['abaCombustivel']] . '</td>';
                        echo '<td>R$ ' . $abastecimento['abaValor'] . '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </p>
        <br>
    </div>
</body>
</html>

