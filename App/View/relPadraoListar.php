<?php

namespace App\View;

use App\Model as Model;
use Validacoes as Validacoes;

$parametros = unserialize($_SESSION['addGet']);
$dados = Model\Relatorio::padrao($parametros);

?>

<!DOCTYPE html>
<html>
<?php include 'html' . DIRECTORY_SEPARATOR . 'head.php'; ?>
<body>
    <div class="w3-container w3-card-4 w3-margin">
        <h3>Relatório de Abastecimentos</h3>
        <br>
    </div>
    <div class="w3-container w3-card-4 w3-margin">
        <table class="w3-table w3-striped w3-bordered">
            <tr>
                <th>Veículo</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Km</th>
                <th>Combustível</th>
                <th>Valor Unitário</th>
                <th>Quantidade</th>
                <th>Valor Total</th>
                <th>Pagamento</th>
            </tr>
        <?php
            foreach ($dados as $dado)
            {
                echo '<tr>';
                echo '<td>' . $dado['abaPlaca'] . ' - ' . $dado['veiModelo'] . '</td>';
                echo '<td>' . ajustarData($dado['abaDataHora']) . '</td>';
                echo '<td>' . ajustarHora($dado['abaDataHora']) . '</td>';
                echo '<td>' . $dado['abaKm'] . '</td>';
                echo '<td>' . $combustiveis[$dado['abaCombustivel']] . '</td>';
                echo '<td>' . Validacoes\Calculos::valorUnitario($dado['abaValor'], $dado['abaQuantidade']) . '</td>';
                echo '<td>' . $dado['abaQuantidade'] . '</td>';
                echo '<td>' . $dado['abaValor'] . '</td>';
                echo '<td>' . $pagamentos[$dado['abaPagamento']] . '</td>';
                echo '</tr>';
            }
        ?>
        </table>
        <br>
    </div>
</body>
</html>
