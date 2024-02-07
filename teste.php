<?php
// Exibir todos os erros
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "linuxville";
$dbname = "ajax";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    //echo "ok";
    //exit;

    $name = $_POST["name"];

    // Inserção de dados no banco de dados
    $sql = "INSERT INTO falha (email,mensagem,nome) VALUES ('mensagem','teste','$name')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo registro inserido com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Cadastro</title>
</head>
<body>

<h2>Insira seu nome:</h2>

<form method="post" action="teste.php">
    <input type="text" name="name">
    <input type="submit" value="Enviar">
</form>

</body>
</html>