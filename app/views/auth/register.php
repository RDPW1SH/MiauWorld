<?php
if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {

    http_response_code(300);
    header('Location: ../home.php');
}

if(isset($_POST['auth-btn'])) {

    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) 
    && !empty($_POST['password']) && isset($_POST['repeatPassword']) && !empty($_POST['repeatPassword']) ) {


        // Call db
        

        try {
            
            // If email doesn't exist in db & data is valid
            if(true) {

            } else {
                return;
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
    <title>MiauWorld - Register</title>
</head>
<main class="container">
    <form class="login-card" action="" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Insira um email válido" required>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Insira uma password válida" required>
        <label for="password">Repetir password</label>
        <input type="password" name="repeatPassword" placeholder="Repita a password" required>
        <p>Tem conta? tente fazer <a href="./login.php">Login</a></p>
        <button class="auth-btn" type="submit">Register</button>
    </form>
</main>

<body>

</body>

</html>