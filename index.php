<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ATAQUE XSS</h1>
    <br>
    <?php include "./form_protegido.php"; ?>
    <br><br>
    <?php include "./form_falha.php"; ?>
    <br>
    <h1>ATAQUE DE FORÇA BRUTA</h1>
    <?php include "./login_falha.php";?>
    <br>
    <?php include "./login_protegido.php";?>
</body>
</html>