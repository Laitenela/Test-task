<?php

//Блок с полной новостью
$data['date'] = date('d.m.Y', strtotime($data['date']));
echo "
<p class='articleInfoTop'>Главная / <a>$data[title]</a></p>
<section class='articleFull'>
    <h1 class='mainWord articleName'>$data[title]</h1>
    <div class='date'>$data[date]</div>
    <div class='compose'>
        <img class='sideArticleImg' src='public/images/$data[image]'>
        <div class='infoField'>
            <h2 class='announce'>$data[announce]</h2>
            $data[content]
        </div>
    </div>
    <a onclick='redirectPrevPage();' class='back linkable'><img class='arrowBack' src='public/icons/Arrow.svg'>Назад к новостям</a>
</section>
";

?>
