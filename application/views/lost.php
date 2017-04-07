<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="#"> 분실물 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container">
    <p>
        본인의 분실물이 있다면 장영신학생회관 3층 학생문화공간위원회 사무실을 평일 오후 7~9시에 방문하여 수령하시기 바랍니다. 분실물을 찾으셨다면 사무실로 가져와주시기 바랍니다.
    </p>
    <div class="card-container">
        <div class="card-row">
            <?php foreach ($articles as $article):?>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/uploads/image/lost/<?=$article['image']?>" alt="<?=$article['name']?>">
                    <h2> <?=$article['name']?> </h2>
                    <p>
                        <?=$article['date']?>
                    </p>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</main>
