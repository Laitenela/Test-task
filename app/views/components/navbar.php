<div class='nav'>
    <?php if (!$navbar['isLast']) : ?>
        <a href='listNews?page=<?= $data['page'] - 1 ?>' class='arrowNav linkable'>
            <img src='public/icons/ShortArrow.svg'>
        </a>
    <?php endif; ?>
    <?php foreach ($navbar['pages'] as $nav) : ?>
        <?php if ($nav[1]) : ?>
            <a href='listNews?page=<?= $nav[0] ?>' class='linkable'>
                <div><?= $nav[0] ?></div>
            </a>
        <?php else : ?>
            <a class='current'><?= $nav[0] ?></a>
        <?php endif; ?>
    <?php endforeach ?>
</div>