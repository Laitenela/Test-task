<main>
    <?php foreach (array($lastArticle) as $article) : ?>
        <?php include 'app/views/components/banner.php' ?>
    <?php endforeach ?>
    <h1 class='mainWord'>Новости</h1>
    <div class='newsBlock'>
        <?php foreach ($articles as $article) : ?>
            <?php include 'app/views/components/shortNewsBlock.php' ?>
        <?php endforeach ?>
        <?php include 'app/views/components/navbar.php' ?>
    </div>
</main>