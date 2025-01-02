<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <div class="images">
                        <a href="/image/<?= urlencode($image['_id']) ?>">
                            <img src="<?= htmlspecialchars('https://cataas.com/cat/' . $image['_id']) ?>" alt="">
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Não encontramos fotos para lhe mostrar.</p>
            <?php endif; ?>
        </div>
        <div class="images-container-category">
            <h1>Gatos laranja</h1>
        </div>

    </div>

    <?php include './app/shared/components/footer/footer.php'; ?>

</body>

</html>