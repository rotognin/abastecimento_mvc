    <div class="w3-container w3-card-4">
        <h3>Sistema de abastecimentos</h3>
        <p>Olá, <?php echo $_SESSION['usuNome']; ?></p>
        <a class="w3-button w3-blue" href="principal.php?action=veiculos">Veículos</a>
        <a class="w3-button w3-blue" href="principal.php?action=cadAbastecimento&control=abastecimento">Abastecimento</a>
        <a class="w3-button w3-blue" href="principal.php?action=relPadrao&control=relatorio">Relatório</a>
        <!--div class="w3-dropdown-hover">
            <button class="w3-button w3-blue">Relatórios</button>
            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                <a href="principal.php?action=relVeiculo&control=relatorio" class="w3-bar-item w3-button">Por veículo</a>
                <a href="principal.php?action=relCombustivel&control=relatorio" class="w3-bar-item w3-button">Por Combustível</a>
                <a href="principal.php?action=relPagamento&control=relatorio" class="w3-bar-item w3-button">Por Tipo de Pagamento</a>
            </div>
        </div-->
        <a class="w3-button w3-blue" href="principal.php?action=logout">Sair</a>
        <br><br>
    </div>