<?php
// Configurações do banco de dados
$servername = "localhost"; // Nome do servidor
$username = "root"; // Nome de usuário do banco de dados
$password = "linuxville"; // Senha do banco de dados
$dbname = "ajax"; // Nome do banco de dados

// Criar uma conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

//echo "Conexão bem-sucedida";

// Depois de fazer o que precisa com o banco de dados, é recomendado fechar a conexão

