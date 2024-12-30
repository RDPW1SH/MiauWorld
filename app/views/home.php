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

        <form action="" method="get">
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
</style>

</html>