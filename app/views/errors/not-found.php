<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/css/index.css">
    <title>MiauWorld: Página não encontrada</title>
</head>

<body>
    <?php include './app/shared/components/nav/navbar.php'; ?>

    <div class="container">
        <h1>Não conseguimos encontrar a página que procura</h1>
        <form action="/" method="POST">
            <button type="submit" name="redirect">Voltar à página inicial</button>
        </form>
    </div>

    <?php include './app/shared/components/footer/footer.php'; ?>
</body>
<style>

</style>

</html>