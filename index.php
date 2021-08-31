<?php

session_start();

// Ao cair nessa página, se o usuário estiver logado, irá ser deslogado do sistema.
$_SESSION['usuID'] = 0;
$_SESSION['usuNome'] = '';
$_SESSION['dir'] = __DIR__ . DIRECTORY_SEPARATOR;

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
    <div class="w3-container w3-card-4 w3-margin">
        <header class="w3-container w3-light-grey w3-margin-top"><h3>Abastecimentos</h3></header>
        <div class="w3-container">
            <p>
            <form method="post" class="w3-container" action="principal.php?action=login">
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" autofocus="autofocus">
                <br><br>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha">
                <br><br>
                <input type="submit" value="Entrar" class="w3-button w3-blue">
            </form>
            </p>
        </div>
        <?php include_once 'lib/mensagem.php'; ?>
    </div>
</body>
</html>