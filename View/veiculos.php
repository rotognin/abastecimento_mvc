<?php

use Model;

$veiculosUsu = Model\Veiculo::carregarVeiculos($usuID);

?>

<!DOCTYPE html>
<html>
<?php include 'html' . DIRECTORY_SEPARATOR . 'head.php'; ?>
<body>
    <h3>Veículos</h3>
    <a class="w3-button w3-blue" href="principal.php">Início</a>
    <a class="w3-button w3-blue" href="principal.php?action=novoVeiculo">Novo</a>
    <div class="w3-container w3-card-4 w3-margin">
        <h3>Veículos:</h3>
        <p>
            <table class='w3-table w3-striped w3-bordered'>
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Descrição</th>
                    <th>Situação</th>
                    <th>Ação</th>
                </tr>

                <?php
                    foreach ($veiculosUsu as $veiculo)
                    {
                        echo '<tr>';
                        echo '<td>' . $veiculo['veiID'] . '</td>';
                        echo '<td>' . $veiculo['veiPlaca'] . '</td>';
                        echo '<td>' . $veiculo['veiMarca'] . '</td>';
                        echo '<td>' . $veiculo['veiModelo'] . '</td>';
                        echo '<td>' . $veiculo['veiAno'] . '</td>';
                        echo '<td>' . $veiculo['veiDescricao'] . '</td>';
                        echo '<td>' . Model\Veiculo::getSituacao($veiculo['veiSituacao']) . '</td>';
                        echo '<td><a class="w3-button w3-blue" href="principal.php?action=editarVeiculo">Editar</a></td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </p>
        <br>
    </div>
</body>
</html>