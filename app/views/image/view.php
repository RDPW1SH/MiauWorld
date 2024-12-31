<?php

session_start();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($path, '/'));
$id = end($segments);
$basePhotoPath = 'https://cataas.com/cat/' . $id;

$textColor = $_POST['text-color'] ?? 'black';
$textContent = $_POST['text-content'] ?? '';
$textSize = $_POST['text-size'] ?? '30';

if (isset($_POST['previewImageBtn'])) {
    if (!empty($textContent)) {
        $editedPhotoPath = $basePhotoPath . '/says/' . urlencode($textContent) .
            '?fontColor=' . urlencode($textColor) .
            '&fontSize=' . urlencode($textSize);

        // var_dump($editedPhotoPath);
    } else {
        $editedPhotoPath = $basePhotoPath;
    }
}

if (isset($_POST['saveImgBtn']) && isset($editedPhotoPath)) {
    // Fazer o download da imagem
    // var_dump($editedPhotoPath);

    /*
    $imageContent = file_get_contents($editedPhotoPath);
    $fileName = 'edited_image_' . $id . '.jpg';

    header('Content-Type: image/jpeg');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    exit;*/
}
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
            <?php if (isset($editedPhotoPath) && !empty($editedPhotoPath)): ?>
                <img src="<?= htmlspecialchars($editedPhotoPath) ?>" alt="">
            <?php else: ?>
                <img src="<?= htmlspecialchars($basePhotoPath) ?>" alt="">
            <?php endif; ?>
        </div>
    </div>

    <div class="edit-container">
        <h1>Opções de edição</h1>
        <form action="" method="post">
            <div class="input-div">
                <label for="color">Cor do texto</label>
                <select name="text-color" required>
                    <option value="black" <?= $textColor === 'black' ? 'selected' : '' ?>>Preto</option>
                    <option value="white" <?= $textColor === 'white' ? 'selected' : '' ?>>Branco</option>
                    <option value="red" <?= $textColor === 'red' ? 'selected' : '' ?>>Vermelho</option>
                    <option value="blue" <?= $textColor === 'blue' ? 'selected' : '' ?>>Azul</option>
                    <option value="green" <?= $textColor === 'green' ? 'selected' : '' ?>>Verde</option>
                    <option value="yellow" <?= $textColor === 'yellow' ? 'selected' : '' ?>>Amarelo</option>
                    <option value="purple" <?= $textColor === 'purple' ? 'selected' : '' ?>>Roxo</option>
                    <option value="orange" <?= $textColor === 'orange' ? 'selected' : '' ?>>Laranja</option>
                    <option value="gray" <?= $textColor === 'gray' ? 'selected' : '' ?>>Cinza</option>
                </select>
            </div>

            <div class="input-div">
                <label for="texto">Texto na imagem</label>
                <input type="text" name="text-content" placeholder="Escreva o texto que deve aparecer na imagem"
                    value="<?= htmlspecialchars($textContent) ?>">
            </div>

            <div class="input-div">
                <label for="tamano">Tamanho do texto</label>
                <input type="number" name="text-size" placeholder="Escreva o texto que deve aparecer na imagem"
                    min="1" max="200" value="<?= htmlspecialchars($textSize) ?>">
            </div>

            <div class="btns-div">
                <button class="previewBtn" name="previewImageBtn">Preview da imagem</button>
                <button class="saveImgBtn" name="saveImgBtn">Salvar imagem</button>
                <button class="removeEdit" name="removeEdit">Limpar edição</button>
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

    select {
        padding: 5px;
        font-size: 16px;
    }

    input[type=text] {
        min-width: 300px;
        width: auto;
    }

    input[type=text]:focus {
        outline: none;
    }

    .btns-div {
        display: flex;
        gap: 15px;
    }

    .btns-div button {
        max-width: 150px;
        width: auto;
        padding: 10px;
        background-color: #f4a261;
        font-weight: 600;
        border-radius: 5px;
        border: 2px solid transparent;
        cursor: pointer;
    }

    .btns-div button:hover {
        background-color: rgb(255, 150, 64);
        border: 2px solid grey;
    }
</style>

</html>