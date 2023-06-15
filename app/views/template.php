<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости</title>
    <link rel="stylesheet" href="public/css/style.css" />
</head>

<body>
    <header class='header'>
        <div class='header__logo logo'>
            <img src='public/icons/logo.svg'>
            <p>Галактический вестник</p>
        </div>
    </header>
    <?php include 'app/views/' . $view; ?>
    <footer class='footer'>
        <p>© 2023 — 2412 «Галактический вестник»</p>
    </footer>
    <script src="public/js/getPrevPage.js"></script>
</body>

</html>