<?php
session_start();

if (isset($_POST['wishlist-btn'])) {

    if (isset($_POST['cat_id']) && !empty($_POST['cat_id'])) {

        $userId = $_SESSION['account_id'] ?? null;
        $catId = htmlspecialchars($_POST['cat_id']);

        if ($userId) {
            try {
                // Instância do modelo HomeModel
                require_once './app/models/HomeModel.php';
                require_once './database/connection.php';

                $db = Connection::getInstance();
                $homeModel = new HomeModel($db);

                $homeModel->setLikes($userId, $catId);
                exit;
            } catch (Exception $e) {
                error_log("Erro ao adicionar à lista de desejos: " . $e->getMessage());
                echo "Erro ao processar a solicitação.";
            }
        } else {
            header('Location: /auth/login');
        }
    } else {
        // echo "ID do gato não enviado.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font awesome css-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/app/css/index.css">
    <title>Home</title>
</head>

<body>

    <?php include './app/shared/components/nav/navbar.php'; ?>
    <div class="container">
        <div class="website-desc">
            <h1>Gatos, gatos e gatos</h1>
            <h3>Uma galeria de mais de 1000 imagens que tu podes explorar livremente</h3>
        </div>
        <?php error_log('Resposta da API: ' . print_r($homeData, true)); ?>


        <div class="images-container">
            <?php if (!empty($homeData)): ?>
                <?php foreach ($homeData as $image): ?>
                    <?php
                    $catId = $image['_id']; // id do gato = ao id da imagem retirada da api
                    $isLiked = in_array($catId, $likes); // Verificar lista de gostos
                    ?>
                    <div class="images">
                        <a href="/image/<?= urlencode($catId) ?>">
                            <img src="<?= htmlspecialchars('https://cataas.com/cat/' . $catId) ?>" alt="">
                        </a>
                        <form method="post" action="/" class="wishlist-form">
                            <input type="hidden" name="cat_id" value="<?= htmlspecialchars($catId) ?>">
                            <button type="submit" name="wishlist-btn" class="wishlist-btn">
                                <?php if ($isLiked): ?>
                                    <i class="fa-solid fa-heart"></i> <!-- Ícone de coração cheio -->
                                <?php else: ?>
                                    <i class="fa-regular fa-heart"></i> <!-- Ícone de coração vazio -->
                                <?php endif; ?>
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Não encontramos fotos para lhe mostrar.</p>
            <?php endif; ?>
        </div>


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
        background-color: rgb(250, 252, 255);
        flex-grow: 1;
    }

    .website-desc {
        padding-bottom: 25px;
    }

    h1,
    h3 {
        margin: 0;
    }

    .website-desc h1 {
        font-size: 36px;
        font-weight: 600;
        color: rgb(29, 29, 29);
    }

    .website-desc {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 15px;
    }

    img {
        max-width: 400px;
        max-height: 290px;

    }

    img:hover {
        cursor: pointer;
    }

    .images-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-evenly;
        gap: 20px;
    }

    .images-container-category {
        text-align: center;
        font-size: 28px;
        margin-top: 10px;
    }

    .images {
        position: relative;
    }

    .images form {
        position: absolute;
        top: 5px;
        left: 5px;
    }

    .wishlist-btn {

        background: none;
        border: none;
        cursor: pointer;
        font-size: 24px;
        color: red;
        margin-top: 8px;
    }

    .wishlist-btn:hover {
        color: darkred;
    }
</style>

</html>