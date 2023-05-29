<a href='/articles?id=<?= $article['id'] ?>'>
    <div class='article'>
        <div class='date'><?= $article['date'] ?></div>
        <h2><?= $article['title'] ?></h2>
        <?= $article['announce'] ?>
        <button>Подробнее <img src='/public/icons/Arrow.svg'></button>
    </div>
</a>