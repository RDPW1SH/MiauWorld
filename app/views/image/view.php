<?php
session_start();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($path, '/'));
$id = end($segments);

// var_dump($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/css/singleImage.css">
    <title>Editar imagem</title>
</head>

<body>

    <?php include './app/shared/components/nav/navbar.php'; ?>

    <div class="container">
        <h1>Edite esta imagem</h1>
        <div class="images">
            <img src="<?= htmlspecialchars('https://cataas.com/cat/' . $id) ?>" alt="">
        </div>
    </div>

    <div class="edit-container">
        <h1>Opções de edição</h1>
        <form action="" method="post">
            <div class="input-div">
                <label for="color">Cor do texto</label>
                <input type="color" name="text-color" value="#f0f0f0">
            </div>

            <div class="input-div">
                <label for="texto">Texto na imagem</label>
                <input type="text" name="text-content" placeholder="Escreva o texto que que deve apareçer na imagem" required>
            </div>
            <div class="btns-div">
                <button class="previewBtn" name="previewImageBtn">
                    Preview da imagem
                </button>
                <button class="saveImgBtn" name="saveImgBtn">Salvar imagem</button>
            </div>

        </form>
    </div>

    <?php include './app/shared/components/footer/footer.php'; ?>

</body>
<style>
    body,
    html {
        margin: 0;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .container {
        padding: 15px 25px;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: rgb(250, 252, 255);
        flex-grow: 1;
    }

    h1,
    h3 {
        margin: 0;
    }

    img {
        max-width: 600px;
        max-height: 410px;

    }

    .edit-container {
        padding: 15px 25px;
    }

    .edit-container form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .input-div {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    input[type=color] {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: none;
        cursor: pointer;
        background-color: white;
    }

    input[type=text] {
        min-width: 300px;
        width: auto;
    }

    input[type=text]:focus {
        outline: none;
    }

    .previewBtn,
    .saveImgBtn {
        max-width: 150px;
        width: auto;
        padding: 10px;
        background-color: #f4a261;
        font-weight: 600;
        border-radius: 5px;
        border: 2px solid transparent;
        cursor: pointer;
    }

    .previewBtn:hover,
    .saveImgBtn:hover {
        background-color: rgb(255, 150, 64);
        border: 2px solid grey;

    }
</style>

</html>