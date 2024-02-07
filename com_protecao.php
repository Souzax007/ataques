 <?php include "./config.php"; 

// Função de sanitização para evitar injeção de SQL
function sanitize_input($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}

// Verifica se o método da requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário e sanitiza-os
    $nome = sanitize_input($_POST["nome"]);
    $email = sanitize_input($_POST["email"]);
    $mensagem = sanitize_input($_POST["mensagem"]);
    
    // Verifica se os campos obrigatórios estão preenchidos
    if (empty($nome) || empty($email) || empty($mensagem)) {
        // Retorna uma mensagem de erro
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {
        // Insira os dados no banco de dados
        $sql = "INSERT INTO protecao (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: ./index.php");
            exit();
        } else {
            echo "Erro ao enviar o formulário: " . $conn->error;
        }
    }
}

$conn->close();
?>
