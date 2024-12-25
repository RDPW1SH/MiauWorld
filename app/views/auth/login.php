<?php

if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {

    http_response_code(300);
    header('Location: ../home.php');
}

if (isset($_POST['auth-btn'])) {

    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {


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
    <link rel="stylesheet" href='./app/css/login.css'>
    <title>MiauWorld - Login</title>
</head>


<body>
    <main class="container">
        <form class="login-card" action="" method="post">
            <h1>😺 MiauWorld</h1>
            <h2>Login</h2>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Escreva o seu email" required>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Escreva a sua password" required>
            <div class="links">
                <p>Não tem conta? <a href="./register.php">Registe-se</a></p>
            </div>
            <div class="placement">
                <button class="auth-btn" type="submit">Login</button>
            </div>

        </form>
    </main>
</body>
<style>

</style>

</html>