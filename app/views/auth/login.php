<?php
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
session_start();

function redirectToHome()
{
    require_once './app/controllers/HomeController.php';
    $controller = new HomeController();
    $controller->index();
    exit;
}

if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {

    http_response_code(300);
    header('Location: /');
}

if (isset($_POST['auth-btn'])) {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

    require_once './app/models/AuthModel.php';
    $authModel = new AuthModel();
    $user = $authModel->login($email, $password);

    if ($user) {

        $_SESSION['auth'] = true;
        $_SESSION['account_username'] = $user['username'];
        $_SESSION['account_id'] = $user['id'];
        redirectToHome();
        exit;
    } else {

        $error = "Email ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='./app/css/login.css'>
    <title>MiauWorld - Login</title>
</head>


<body>
    <main class="container">
        <form class="login-card" action="" method="post">
            <a class="title" href="/">
                <h1>😺 MiauWorld</h1>
            </a>
            <h2>Login</h2>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Escreva o seu email" required>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Escreva a sua password" required>
            <div class="links">
                <p>Não tem conta? <a class="link" href="/auth/register">Registe-se</a></p>
            </div>
            <div class="placement">
                <button class="auth-btn" name="auth-btn" type="submit">Login</button>
            </div>
            <div class="error">
                <?php if (isset($error)) echo $error; ?>
            </div>
        </form>
    </main>
</body>
<style>

</style>

</html>