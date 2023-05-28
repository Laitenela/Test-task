<?php
/* ГЛАВНАЯ СТРАНИЦА */
//Блок для баннера с последней новостью

$lastArticle = array_shift($data);
echo "
<a href='/articles?id=$lastArticle[id]'>
    <div class='ban-image' style='background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(\"public/images/$lastArticle[image]\");'>
        <h1>$lastArticle[title]</h1>
        <p>$lastArticle[announce]</p>
    </div>
</a>
";
?>

<h1 class='mainWord'>Новости</h1>
<div class='newsBlock'>

<?php

//Отображение сетки новостей с 1 по 4
$isLast = array_pop($data);
foreach ($data as &$value) {
    $value['date'] = date('d.m.Y', strtotime($value['date']));
    echo "
    <a href='/articles?id=$value[id]'>
        <div class='article'>
            <div class='date'>$value[date]</div>
            <h2>$value[title]</h2>
            $value[announce]
            <button>Подробнее <img src='/public/icons/Arrow.svg'></button>
        </div>
    </a>
    ";
}

//Навигация
echo "<div class='nav'>";

//Отображение навигации по страницам новостей
if (!$isLast) {
    //Стрелка следующей страницы
    $pg = $page+1;
    echo "<a href='listNews?page=$pg' class='arrowNav linkable'><img src='public/icons/ShortArrow.svg'></a>";
}

//Кнопки для навигации с конкретными страницами
$nav = [];
if($page === 1) {
    $nav = [[3, true], [2, true], [1, false]];    
} else {
    $nav = $isLast ? 
        [[$page, false], [$page-1, true], [$page-2, true]] :
        [[$page+1, true], [$page, false], [$page-1,true]];
}
for($i = 0; $i < count($nav); $i++){
    $pg = $nav[$i][0];
    echo $nav[$i][1] ?
        "<a href='listNews?page=$pg' class='linkable'><div>$pg</div></a>" :
        "<a class='current'>$pg</a>";
}
echo "</div>";
?>
</div>