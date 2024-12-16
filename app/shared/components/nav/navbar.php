<?php

if(isset($_SESSION['auth'])) {

    echo ("<nav>
        <div class='nav_container'>
            <h1>😺</h1>
            <form action='/pesquisar/pesquisar.php' method='GET'>
                <div style='display: flex; gap: 10px; align-items: center;'>
                    <input type='text' name='pesquisa' placeholder='pesquise os gatos'>
                    <h2>Bem vindo</h2>
                </div>
            </form>
        </div>
        <style>
            nav {
                padding: 0;
                background-color: violet;
            }
            .nav_container {
                display: flex;
                padding: 0px 20px;
                gap: 10px;
                justify-content: space-between;
                align-items: center;
            }
            input {
                padding: 6px 3px;
                width: 150px;
                height: 25px;
            }
        </style>
    </nav>
");
    
} else {
    echo ("<nav>
        <div class='nav_container'>
            <h1>😺</h1>
            <form action='/pesquisar/pesquisar.php' method='GET'>
                <div style='display: flex; gap: 10px; align-items: center;'>
                    <input type='text' name='pesquisa' placeholder='pesquise os gatos'>
                    <a href='./login.php'><button type='submit' name='login_btn'>Login</button></a>
                </div>
            </form>
        </div>
        <style>
            nav {
                padding: 0;
                background-color: violet;
            }
            .nav_container {
                display: flex;
                padding: 0px 20px;
                gap: 10px;
                justify-content: space-between;
                align-items: center;
            }
            input {
                padding: 6px 3px;
                width: 150px;
                height: 25px;
            }
        </style>
    </nav>");
}
?>
