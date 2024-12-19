<?php


?>

<nav>
    <div class='nav_container'>
        <div class="logo">
            <a href="/">
                <h1>😺</h1>
            </a>
            <p>MiauWorld</p>
        </div>
        <form action='/auth/login' method='GET'>
            <div style='display: flex; gap: 10px; align-items: center;'>
                <?php if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
                    echo ("<a href='./user/profile.php'>Bem Vindo</button>");
                } else {
                    echo ("<a href='/views/auth/login'><button type='submit' class='auth-btn' name='login_btn'>Login</button></a>");
                } ?>
            </div>
        </form>
    </div>
    <style>
        * {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        nav {
            padding: 20px 15px;
            background-color: #32373b;
        }

        .logo {
            display: flex;
            flex-direction: row;
            align-items: end;
            font-size: larger;
            color: white;
            font-weight: 600;

        }

        .logo a {
            text-decoration: none;
            cursor: pointer;
        }

        .logo p,
        .logo h1 {
            margin: 0;
        }

        .nav_container {
            display: flex;
            padding: 0px 20px;
            gap: 10px;
            justify-content: space-between;
            align-items: center;
        }

        input {
            padding: 5px 10px;
            width: 150px;
            height: 25px;
        }

        .auth-btn {
            padding: 8px;
            background-color: white;
            color: black;
            font-size: medium;
            border: none;
            border-radius: 2px;
            outline: none;
            cursor: pointer;
            border: 2px solid transparent;

        }

        .auth-btn:hover {
            background-color: #4a5859;
            color: white;
            border: 2px solid white;
        }
    </style>
</nav>