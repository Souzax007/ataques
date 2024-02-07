<?php
// Exibir todos os erros
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluir arquivo de configuração
include "./config.php";

// Verificar se o ID da mensagem a ser excluída foi fornecido via POST
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_protecao = $_GET['id'];

    // Consulta SQL para excluir a mensagem com o ID fornecido
    $sql = "DELETE FROM protecao WHERE id_protecao = $id_protecao";

    // Executar a consulta[]
    if ($conn->query($sql) === TRUE) {
        // Redirecionar de volta para a página principal
        header("Location:./index.php");
        exit();
    } else {
        // Se houver algum erro na exclusão, exibir uma mensagem de erro
        echo "Erro ao excluir mensagem: " . $conn->error;
    }
} else {
    // Se o ID não foi fornecido, exibir uma mensagem de erro
    echo "ID da mensagem não fornecido.";
}

