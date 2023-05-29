<main>
    <?php foreach (array($data['lastArticle']) as $article) : ?>
        <?php include 'app/views/components/banner.php' ?>
    <?php endforeach ?>
    <h1 class='mainWord'>Новости</h1>
    <div class='newsBlock'>
        <?php foreach ($data['articles'] as $article) : ?>
            <?php include 'app/views/components/article.php' ?>
        <?php endforeach ?>
        <?php foreach (array(['isLast' => $data['isLast'],'pages' => $data['nav']]) as $navbar) : ?>
            <?php include 'app/views/components/navbar.php' ?>
        <?php endforeach ?>
    </div>
</main>