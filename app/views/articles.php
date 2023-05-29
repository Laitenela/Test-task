<main>
    <p class='articleInfoTop'>
        Главная /
        <a><?= $title ?></a>
    </p>
    <section class='articleFull'>
        <h1 class='mainWord articleName'><?= $title ?></h1>
        <div class='date'><?= $date ?></div>
        <div class='compose'>
            <img class='sideArticleImg' src='public/images/<?= $image ?>'>
            <div class='infoField'>
                <h2 class='announce'><?= $announce ?></h2>
                <?= $content ?>
            </div>
        </div>
        <a onclick='redirectPrevPage()' class='back linkable'><img class='arrowBack' src='public/icons/Arrow.svg'>
            Назад к новостям
        </a>
    </section>
</main>