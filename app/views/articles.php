<main class='article'>
    <p class='article__info-top'>
        Главная / <a><?= $title ?></a>
    </p>
    <section class='total-article'>
        <h1 class='total-article__main-word main-word'><?= $title ?></h1>
        <div class='date'><?= $date ?></div>
        <div class='article-container'>
            <img class='article-container__side-image' src='public/images/<?= $image ?>'>
            <div class='article-container__info-field info-field'>
                <h2 class='announce'><?= $announce ?></h2>
                <?= $content ?>
            </div>
        </div>
        <a onclick='redirectPrevPage()' class='total-article__button button linkable'><img class='arrow-back' src='public/icons/Arrow.svg'>
            Назад к новостям
        </a>
    </section>
</main>