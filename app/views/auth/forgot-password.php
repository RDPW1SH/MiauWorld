<?php
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
session_start();

if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {

    http_response_code(300);
    header('Location: /');
}

if (isset($_POST['auth-btn'])) {

    if (isset($_POST['email']) && !empty($_POST['email'])) {


        // Call db

        try {

            // If email exists in db
            if (true) {
            }
        } catch (\Throwable $th) {
            //throw $th;
        }


        http_response_code(300);
        header('Location: /');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='/app/css/forgot-password.css'>
    <title>MiauWorld - Forgot Password</title>
</head>


<body>
    <main class="container">
        <div class="opaco">
            <form class="login-card" action="" method="post">
                <a class="title" href="/">
                    <h1>😺 MiauWorld</h1>
                </a>
                <div>
                    <h2>Esqueçeu-se da sua passe?</h2>
                    <p>diga-nos o seu email e nós enviaremos um email de recuperação</p>
                </div>

                <input type="email" name="email" placeholder="Escreva o seu email" required>
                <div class="links">
                    <p>Lembrou-se da sua passe? tente fazer <a class="link" href="/auth/login">Login</a></p>
                </div>
                <div class="placement">
                    <button class="auth-btn" type="submit">Receber email</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>