<?php

namespace App\View;

use App\Model as Model;

// Trazer os veículos do usuário logado (inclusive inativos)
$veiculos = Model\Veiculo::carregarVeiculos($usuID);
$mensagem = '';

if (count($veiculos) == 0){
    $mensagem = 'Nenhum veículo cadastrado. Não será possível listar os dados.';
}

?>

<!DOCTYPE html>
<html>
<?php include 'html' . DIRECTORY_SEPARATOR . 'head.php'; ?>
<body>
    <div class="w3-container w3-card-4">
        <h3>Relatório de Abastecimentos</h3>
        <a class="w3-button w3-blue" href="principal.php?action=menu">Início</a>
        <br><br>
    </div>
    <div class="w3-container w3-card-4">
        <?php include_once 'lib/mensagem.php'; ?>

        <form target="_blank" 
                method="post" 
                class="w3-container" 
                action="principal.php?control=relatorio&action=relPadraoListar">
            <br>
            <!-- Placa -->
            <label for="relPlaca">Placa:</label>
            <select class="w3-select" id="relPlaca" name="relPlaca">
                <option value="todas">Todas</option>
            <?php
                foreach ($veiculos as $veiculo)
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
            <!-- Combustível -->
            <label for="relCombustivel">Combustível:</label>
            <select class="w3-select" id="relCombustivel" name="relCombustivel">
                <option value="todos">Todos</option>
            <?php
                foreach ($combustiveis as $codigo => $combustivel)    
                {
                    echo '<option value="' . $codigo . '">' . $combustivel . '</option>';
                }
            ?>
            </select>
            <br><br>
            <!-- Forma de Pagamento -->
            <label for="relPagamento">Forma de Pagamento:</label>
            <select class="w3-select" id="relPagamento" name="relPagamento">
                <option value="todas">Todas</option>
            <?php
                foreach ($pagamentos as $codigo => $pagamento)
                {
                    echo '<option value="' . $codigo . '">' . $pagamento . '</option>';
                }
            ?>
            </select>
            <br><br>
            <!-- Ordenação -->
            <label for="relOrdenacao">Ordenação:</label>
            <select class="w3-select" id="relOrdenaPor" name="relOrdenaPor">
            <?php 
                foreach ($ordenacoes as $codigo => $ordem)
                {
                    echo '<option value="' . $codigo . '">' . $ordem . '</option>';
                }
            ?>
            </select>
            &nbsp&nbsp&nbsp&nbsp
            <input type="radio" id="relOrdemCrescente" name="relOrdem" value="1" checked>
            <label for="relOrdemCrescente">Crescente</label>
            &nbsp&nbsp&nbsp&nbsp
            <input type="radio" id="relOrdemDecrescente" name="relOrdem" value="2">
            <label for="relOrdemDecrescente">Decrescente</label>
            <br><br>

            <input type="hidden" name="abaUsuID" value="<?php echo $usuID; ?>">
            <br>
            <input type="submit" value="Listar" class="w3-button w3-blue">
        </form>
        <br>
    </div>
</body>
</html>