<a class='news-container' href='/articles?id=<?= $article['id'] ?>'>
    <div class='news-container__news-block news-block'>
        <div class='date'><?= $article['date'] ?></div>
        <h2><?= $article['title'] ?></h2>
        <?= $article['announce'] ?>
        <button class="button">Подробнее <img src='/public/icons/Arrow.svg'></button>
    </div>
</a>