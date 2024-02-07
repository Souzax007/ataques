<?php

include "./config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifica se o método da requisição é POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Verifica se os campos obrigatórios estão preenchidos
    if (isset($_POST["nome"], $_POST["email"], $_POST["mensagem"]) && 
        !empty($_POST["nome"]) && !empty($_POST["email"]) && !empty($_POST["mensagem"])) {
        
        // Obtém os dados do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $mensagem = $_POST["mensagem"];
  
        // Prepara a consulta SQL usando uma instrução preparada
        $sql = "INSERT INTO falha (nome, email, mensagem) VALUES (?, ?, ?)";
        
        // Prepara a instrução SQL
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            // Associa os parâmetros
            $stmt->bind_param("sss", $nome, $email, $mensagem);
            
            // Executa a consulta preparada
            if ($stmt->execute()) {
                header("Location: ./index.php");
            exit();
            } else {
                echo "Erro ao enviar o formulário.";
            }
            
            // Fecha a instrução preparada
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta.";
        }
    } else {
        // Retorna uma mensagem de erro se algum campo estiver vazio
        echo "Por favor, preencha todos os campos obrigatórios.";
    }
} else {
    // Retorna uma mensagem de erro se a requisição não for POST
    echo "Método de requisição inválido.";
}

$conn->close();

?>
