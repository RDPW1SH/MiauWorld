<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['redirect'])) {

    header('Location: ./views/home.php');
    exit; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiauWorld: Página não encontrada</title>
</head>
<body>
    <h1>Não conseguimos encontrar a página que procura</h1>
    <form action="" method="POST">
        <button type="submit" name="redirect">Voltar à página inicial</button>
    </form>
</body>
</html>
