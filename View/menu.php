<?php

namespace View;

use Model as Model;
use Validacoes\Calculos;

$usuario = Model\Usuario::carregar($_SESSION['usuID']);
if (!$usuario){
    $_SESSION['mensagem'] .= ' - Realize o login no sistema.';
    header ('Location: index.php');
    Exit;
}

$ultimosAbastecimentos = Model\Abastecimento::ultimos(5);
$aVeiculos = Model\Veiculo::carregarVeiculos($usuario, 1);

// Descobrir os últimos 6 meses, incluindo o atual
$iMesAtual    = (int)date('m');
$iPrimeiroMes = ($iMesAtual > 5) ? $iMesAtual - 5 : $iMesAtual + 7;
$iAno         = ($iMesAtual > 5) ? (int)date('Y') : (int)date('Y') - 1;

$a6Meses = array();

for ($iMes = $iPrimeiroMes; $iMes != $iMesAtual; $iMes++)
{
    if ($iMes == 13) { $iMes = 1; $iAno++; }
    
    $dataInicio = $iAno . '/' . $iMes . '/01';
    $dataFim    = $iAno. '/' . $iMes . '/' . Calculos::ultimoDia($mes, $ano);

    $a6Meses[] = array($dataInicio, $dataFim);
}

?>

<!DOCTYPE html>
<html>
<?php include 'html' . DIRECTORY_SEPARATOR . 'head.php'; ?>
<body>
    <?php include 'html' . DIRECTORY_SEPARATOR . 'menu.php'; ?>
    <div class="w3-container w3-card-4">
        <h3>Últimos 5 abastecimentos:</h3>
        <table class='w3-table w3-striped w3-bordered'>
            <tr>
                <th>Veículo</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Km</th>
                <th>Combustível</th>
                <th>Valor Total</th>
                <th>Ação</th>
            </tr>
            <?php
                foreach ($ultimosAbastecimentos as $abastecimento)
                {
                    echo '<tr>';
                    echo '<td>' . $abastecimento['abaPlaca'] . ' - ' . $abastecimento['veiModelo'] . '</td>';
                    echo '<td>' . ajustarData($abastecimento['abaDataHora']) . '</td>';
                    echo '<td>' . ajustarHora($abastecimento['abaDataHora']) . '</td>';
                    echo '<td>' . $abastecimento['abaKm'] . '</td>';
                    echo '<td>' . $combustiveis[$abastecimento['abaCombustivel']] . '</td>';
                    echo '<td>R$ ' . $abastecimento['abaValor'] . '</td>';
                    echo '<td>';
                    echo '<form method="post" action="principal.php?control=abastecimento&action=cadAbastecimento">';
                        echo '<input type="hidden" name="abaID" value="' . $abastecimento['abaID'] . '">';
                        echo '<input type="submit" value="Editar" class="w3-button w3-small w3-blue">';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            ?>
        </table>
        <br>
    </div>
    <div class="w3-container w3-card-4">
        <h3>Total dos últimos 6 meses por veículo:</h3>
        <table class='w3-table w3-striped w3-bordered'>
            <tr>
                <th>Veículo</th>
                <th>Março/2021</th>
                <th>Abril/2021</th>
                <th>Maio/2021</th>
                <th>Junho/2021</th>
                <th>Julho/2021</th>
                <th>Agosto/2021</th>
            </tr>
            <tr>
                <td>GBR8855 - A4 AVANT 3.2 TFSI</td>
                <td>R$ 300,00</td>
                <td>R$ 250,14</td>
                <td>R$ 291,34</td>
                <td>R$ 270,01</td>
                <td>R$ 301,25</td>
                <td>R$ 303,95</td>
            </tr>
            <tr>
                <td>FXB8666 - GOL 1.0 TREND</td>
                <td>R$ 50,00</td>
                <td>R$ 50,14</td>
                <td>R$ 91,34</td>
                <td>R$ 70,01</td>
                <td>R$ 101,25</td>
                <td>R$ 43,95</td>
            </tr>
            <tr>
                <td>BTS3454 - FIESTA</td>
                <td>R$ 30,00</td>
                <td>R$ 20,14</td>
                <td>R$ 21,34</td>
                <td>R$ 20,01</td>
                <td>R$ 31,25</td>
                <td>R$ 33,95</td>
            </tr>
        </table>
        <br>
    </div>
</body>
</html>

