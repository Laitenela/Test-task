<main class='feed'>
    <?php include 'app/views/components/banner.php' ?>
    <h1 class='feed__main-word main-word'>Новости</h1>
    <div class='feed__feed-block feed-block'>
        <?php foreach ($articles as $article) : ?>
            <?php include 'app/views/components/shortNewsBlock.php' ?>
        <?php endforeach ?>
        <?php include 'app/views/components/navbar.php' ?>
    </div>
</main>