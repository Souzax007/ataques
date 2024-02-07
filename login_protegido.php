<?php
// Incluir arquivo de configuração
include "./config.php";

// Inicializar variável de mensagem de login
$login_message = "";

// Verificar se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os campos de email e senha
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $senha = $_POST["senha"];

    // Consulta SQL para verificar as credenciais do usuário
    $sql = "SELECT email, senha FROM login_protegido WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // "s" porque é uma string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $senha_armazenada = $row['senha'];

        // Verificar se a senha fornecida coincide com a senha armazenada no banco de dados
        if ($senha === $senha_armazenada) {
            $login_message = "Login bem-sucedido!";
            // Você pode adicionar lógica para iniciar a sessão do usuário aqui
        } else {
            $login_message = "Senha incorreta.";
        }
    } else {
        $login_message = "Usuário não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Login_protegido</title>
</head>
<body>
    <h2>Formulário de Login_protegido</h2>
    
    <!-- Exibir a mensagem de login -->
    <?php if (!empty($login_message)) : ?>
        <p><?php echo $login_message; ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="email">Email:</label>    
        <input type="email" name="email" id="email"> <!-- Usamos type="email" para validar o formato do email -->
        <br>
        <label for="senha">Senha:</label>    
        <input type="text" name="senha" id="senha">
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
