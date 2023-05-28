<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="public/css/style.css" />
<script src="public/js/getPrevPage.js" type="text/javascript"></script>
    <header>
        <div class='logo'>
            <img src='public/icons/logo.svg'>
            <p>Галактический вестник</p>
        </div>
    </header>
    <main>
    <?php include 'app/views/'.$content_view; ?>
    </main>
    <footer>
        <p>© 2023 — 2412 «Галактический вестник»</p>
    </footer>
</body>
</html>