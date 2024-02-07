<?php include "./config.php"; ?>
<h1>COM falha</h1>
  <div class="formulario" style="clear:both;float:none; ">
  <form id="meuFormulario" method="POST" action="./com_falha.php">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="mensagem">Mensagem:</label>
    <textarea id="mensagem" name="mensagem" required></textarea><br>

    <input type="submit" value="Enviar">
  </form>
</div>

<div class="tabela"  style="clear:both;float:none;">
  <?php
  $sql = "SELECT id_falha, nome, email, mensagem FROM falha";

  // Executando a consulta
  $result = $conn->query($sql);

  // Verificando se a consulta foi bem-sucedida
  if ($result) {
      // Verificando se há resultados
      if ($result->num_rows > 0) {
          echo "<table border='1'>";
          echo "<tr><th>Nome</th><th>Email</th><th>Mensagem</th><th>Ações</th></tr>";
          // Loop para obter os resultados
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["mensagem"] . "</td>";
            echo "<td><a href='./excluir_falha.php?id=" . $row["id_falha"] . "'>Excluir</a></td>";
            echo "</tr>";
        }
      
          echo "</table>";
      } else {
          echo "Nenhum resultado encontrado.";
      }
  } else {
      echo "Erro na consulta: " . $conn->error;
  }
  ?>

</div>  