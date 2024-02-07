<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir arquivo de configuração
include "./config.php";

// Inicializar variável de mensagem de login
$login_message = "";

// Verificar se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os campos de email e senha
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Consulta SQL para verificar as credenciais do usuário
    $sql = "SELECT email, senha FROM login_falha WHERE email = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $senha); // "ss" porque ambos são strings
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $login_message = "Login bem-sucedido!";
    } else {
        $login_message = "Usuário não encontrado ou senha incorreta.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Login</title>
</head>
<body>
    <h2>Formulário de Login_falha</h2>
    
    <!-- Exibir a mensagem de login -->
    <?php if (!empty($login_message)) : ?>
        <p><?php echo $login_message; ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="email">Email:</label>    
        <input type="text" name="email" id="email">
        <br>
        <label for="senha">Senha:</label>    
        <input type="text" name="senha" id="senha">
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
