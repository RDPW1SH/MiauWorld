<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./app/index.css">
    <title>MiauWorld: Página não encontrada</title>
</head>

<body>
    <?php include './app/shared/components/nav/navbar.php'; ?>

    <h1>Não conseguimos encontrar a página que procura</h1>
    <form action="home.php" method="POST">
        <button type="submit" name="redirect">Voltar à página inicial</button>
    </form>
    <?php include './app/shared/components/footer/footer.php'; ?>
</body>
<style>

</style>

</html>