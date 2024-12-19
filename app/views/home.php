<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./app/views/index.css">
    <title>Home</title>
</head>

<body>

    <?php include './app/shared/components/nav/navbar.php'; ?>
    <div class="container">
        <div class="website-desc">
            <h1>Gatos, gatos e gatos</h1>
            <h3>Uma galeria de mais de 1000 imagens que tu podes explorar livremente</h3>
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
</style>

</html>