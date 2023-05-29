<a href='/articles?id=<?= $article['id'] ?>'>
    <div class='ban-image' style='background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.3), 
        rgba(0, 0, 0, 0.3)), url("public/images/<?= $article['image'] ?>");'>
        <h1><?= $article['title'] ?></h1>
        <p><?= $article['announce'] ?></p>
    </div>
</a>