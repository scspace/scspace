<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<main class="container">
    <div class="spacing"></div>
    <div class="alert alert-danger" role="alert"> 이 기능은 현재 작동하지 않습니다.</div>
    <h1> 분실물 관리하기 </h1>
    <hr>
    <h3> <a href="/manage/lost_register"> 분실물 등록하기 </a></h3>
    <hr>
    <?php foreach ($articles as $article):?>
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="/uploads/image/lost/<?=$article['image']?>" alt="<?=$article['name']?>">
            <div class="caption">
                <h3> <?=$article['name']?> </h3>
                <p> <?=$article['date']?> </p>
                <!-- Single button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        처리하기 <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a onclick="">주인의 품으로..</a></li>
                        <li><a onclick="">오래되서 버림</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</main>
