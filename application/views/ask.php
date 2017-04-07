<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/ask"> 문의 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/ask/write"> 문의하기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container">
    <p> 급한 문의는 상근시간 방문이나 전화 및 페이스북 문의로 해주시기 바랍니다. </p>

    <table class="table table-hover">
        <thead>
            <tr class="hidden-xs">
                <td> 태그 </td>
                <td> 처리 상태 </td>
                <td> 제목 </td>
                <td> 글쓴이 </td>
                <td> 날짜 </td>
            </tr>
        </thead>
        <tbody>
            <?php
            date_default_timezone_set('Asia/Seoul');
            foreach ($asks as $ask):
                $time_post = date_create_from_format('Y-m-d H:i:s',$ask->time_post)->format('Y-m-d\TH:i:sO');
                $time_post_readable = date_create_from_format('Y-m-d H:i:s',$ask->time_post)->format('m월 d일 H:i');
                $tags = json_decode($ask->tag);
                switch($ask->state){
                    case 'wait':
                        $color = 'red';
                        break;
                    case 'receive':
                        $color = 'yellow';
                        break;
                    case 'solve':
                        $color = 'green';
                        break;
                }?>
            <tr class="pointer" onclick="location.href='/ask/view/<?=$ask->id?>'">
                <td class="col-sm-1 hidden-xs"> <?php foreach($tags as $tag) echo $this->lang->line($tag).' '?> </td>
                <td class="col-sm-2 col-md-1 hidden-xs"> <span class="<?=$color?> circle"></span> <?=$this->lang->line($ask->state)?> </td>
                <td class="col-sm-5 col-md-6 hidden-xs"> <?=$ask->title?> </td>
                <td class="col-sm-1 hidden-xs"> <?=$ask->name?> </td>
                <td class="col-sm-2 hidden-xs">  <time class="timeago" datetime="<?=$time_post?>"><?=$time_post_readable?></time> </td>

                <td class="visible-xs">
                    <small><span class="boardtable-circle <?=$color?>"></span> <?=$this->lang->line($ask->state)?></small> <br>
                    <?=$ask->title?> <br>
                    <small><?=$ask->name?> · <time class="timeago" datetime="<?=$time_post?>"><?=$time_post_readable?></time></small>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <?=$pagination?>
</main>
