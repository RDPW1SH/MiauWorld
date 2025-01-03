<?php
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
session_start();

if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {

    http_response_code(300);
    header('Location: /');
}

if (isset($_POST['auth-btn'])) {

    $username = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    $repeatPassword = htmlspecialchars($_POST['repeatPassword'], ENT_QUOTES, 'UTF-8');

    if (!$email) {
        $error = "Email inválido.";
    }

    if ($password !== $repeatPassword) {
        $error = "As passwords não são iguais.";
    }

    require_once './app/models/AuthModel.php';
    $authModel = new AuthModel();
    $user = $authModel->register($email, $password, $username);

    if ($user) {

        $_SESSION['auth'] = true;
        $_SESSION['account_username'] = $user['nome'];
        $_SESSION['account_id'] = $user['id'];
        header('Location: /auth/login');
        exit;
    } else {

        $error = "Dados inválidos, tente novamente mais tarde";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='/app//css/register.css'>
    <title>MiauWorld - Register</title>
</head>


<body>
    <main class="container">
        <div class="opaco">
            <form class="login-card" action="" method="post">
                <a class="title" href="/">
                    <h1>MiauWorld</h1>
                </a>
                <h2>Register</h2>
                <label for="nome">Nome</label>
                <input type="text" name="nome" placeholder="Insira um nome válido" required>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Insira um email válido" required>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Insira uma password válida" required>
                <label for="password">Repetir password</label>
                <input type="password" name="repeatPassword" placeholder="Repita a password" required>
                <div class="links">
                    <p>Tem conta? tente fazer <a class="link" href="/auth/login">Login</a></p>
                </div>
                <div class="placement">
                    <button class="auth-btn" name="auth-btn" type="submit">Register</button>
                </div>
                <div class="error">
                    <?php if (isset($error)) echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                </div>
            </form>
        </div>
    </main>
</body>

</html>