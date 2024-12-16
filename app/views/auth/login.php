<?php

if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {

    http_response_code(300);
    header('Location: ../home.php');
}

if(isset($_POST['auth-btn'])) {

    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {


        // Call db

        $_SESSION['account_username']; // Define username
        $_SESSION['account_id']; // Define user id
        http_response_code(300);
        header('Location: ../home.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='./app/css/auth.css'>
    <title>MiauWorld - Login</title>
</head>
<main class="container">
    <form class="login-card" action="" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Escreva o seu email" required>
        <label for="password">Email</label>
        <input type="password" name="password" placeholder="Escreva a sua password" required>
        <p>Não tem conta?<a href="./register.php">Registe-se</a></p>
        <button class="auth-btn" type="submit">Login</button>
    </form>
</main>

<body>

</body>

</html>