<?php defined('BASEPATH') OR exit('No direct script access allowed');
$time_post = date_create_from_format('Y-m-d H:i:s',$notice->time_post)->format('Y-m-d\TH:i:sO');
$time_post_readable = date_create_from_format('Y-m-d H:i:s',$notice->time_post)->format('m월 d일 H:i');
?>
<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/notice"> 공지사항 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/notice"> 목록으로 </a></li>
            <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 'admin'):?>
            <li><a href="/notice/update/<?=$notice->id?>"> 업데이트 </a></li>
            <li><button type="button" class="btn btn-danger btn-navbar" data-toggle="modal" data-target="#delete">삭제</button></li>
            <?php endif;?>
        </ul>

    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<?php if (isset($_SESSION['type']) && $_SESSION['type'] == 'admin'):?>
<div id="delete" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">정말 공지사항을 삭제하시겠습니까?</h4>
            </div>
            <div class="modal-body">
                영원히 삭제됩니다.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="/notice/delete/<?=$notice->id?>" class="btn btn-primary"> 삭제 </a>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<div class="affix-fix"></div>

<main class="container">
    <h1 class="title"> <?=$notice->title?> </h1>
    <div class="meta-row">
        <span class="tag"> <?=$notice->tag?> </span> <time class="timeago" datetime="<?=$time_post?>"> <?=$time_post_readable?> </time>
    </div>
    <div class="row notice">
        <div class="col-sm-9">
            <?=$this->markdown->parse($notice->content)?>
        </div>
        <aside class="col-sm-3">
            <strong> 게시 시간 </strong>
            <p>
                <?=$notice->time_post?>
            </p>
            <?php if($notice->time_edit != ''):?>
            <strong> 수정 시간 </strong>
            <p>
                <?=$notice->time_edit?>
            </p>
            <?php endif;?>
            <strong> 열람 수 </strong>
            <p>
                <?=$notice->hit?>
            </p>
        </aside>
    </div>

    <div class="share-row">
        <a class="share facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?=current_url()?>" target="_blank" > Share </a>

        <a class="share twitter" href='http://twitter.com/share?url=<?=current_url()?>&text=<?=$notice->title?>' target="_blank" > Tweet </a>

        <a class="share email" href="mailto:?subject=<?=$notice->title?>&body=<?=current_url()?>" target="_blank" > Email </a>
    </div>


</main>
