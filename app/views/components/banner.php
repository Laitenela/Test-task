<a class='banner' href='/articles?id=<?= $article_lst['id'] ?>'>
    <div class='banner__ban-image ban-image' style='background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.3), 
        rgba(0, 0, 0, 0.3)), url("public/images/<?= $article_lst['image'] ?>");'>
        <h1><?= $article_lst['title'] ?></h1>
        <p><?= $article_lst['announce'] ?></p>
    </div>
</a>