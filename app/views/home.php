<?php
session_start();
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
                            <button type="submit" class="wishlist-btn">
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

</html>