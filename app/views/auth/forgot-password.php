<?php

if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {

    http_response_code(300);
    header('Location: ../home.php');
}

if(isset($_POST['auth-btn'])) {

    if(isset($_POST['email']) && !empty($_POST['email'])) {


        // Call db

        try {

            // If email exists in db
            if(true) {

            } 
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        
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
    <title>MiauWorld - Forgot Password</title>
</head>


<body>
<main class="container">
    <form class="login-card" action="" method="post">
        <h1>Esqueçeu-se da sua passe? diga-nos o seu email e nós enviaremos um email de recuperação</h1>
        <input type="email" name="email" placeholder="Escreva o seu email" required>
        <div class="links">
            <p>Lembrou-se da sua passe? tente fazer <a href="./login.php">Login</a></p>
        </div>
        <div class="placement">
            <button class="auth-btn" type="submit">Receber email</button>
        </div>
    </form>
</main>
</body>
</html>