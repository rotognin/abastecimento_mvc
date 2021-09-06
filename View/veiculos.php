<?php

namespace View;

use Model as Model;

$veiculosUsu = Model\Veiculo::carregarVeiculos($usuID);

if (!isset($_SESSION['mensagem']))
{
    $_SESSION['mensagem'] = '';
}

$mensagem = $_SESSION['mensagem'];
$_SESSION['mensagem'] = '';

?>

<!DOCTYPE html>
<html>
<?php include 'html' . DIRECTORY_SEPARATOR . 'head.php'; ?>
<body>
    <div class="w3-container w3-card-4">
        <h3>Veículos</h3>
        <a class="w3-button w3-blue" href="principal.php?action=menu">Início</a>
        <a class="w3-button w3-blue" href="principal.php?control=veiculo&action=cadVeiculo">Novo</a>
        <br><br>
    </div>
    <div class="w3-container w3-card-4">
        <?php include_once 'lib/mensagem.php'; ?>
        <h3>Veículos:</h3>
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
                        echo '<td>';
                            echo '<form method="post" action="principal.php?control=veiculo&action=cadVeiculo">';
                                echo '<input type="hidden" name="veiID" value="' . $veiculo['veiID'] . '">';
                                echo '<input type="submit" value="Editar" class="w3-button w3-small w3-blue">';
                            echo '</form>';
                        echo '</td>';
                    echo '</tr>';
                }
            ?>
        </table>
        <br>
    </div>
</body>
</html>