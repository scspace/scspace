<?php defined('BASEPATH') OR exit('No direct script access allowed');
$time_post = date_create_from_format('Y-m-d H:i:s',$ask->time_post)->format(DATE_ISO8601);
$time_post_readable = date_create_from_format('Y-m-d H:i:s',$ask->time_post)->format('n월 j일 G:i');
?>
<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/ask"> 문의 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/ask"> 목록으로 </a></li>
            <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 'admin'):?>
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
                <h4 class="modal-title">정말 문의사항을 삭제하시겠습니까?</h4>
            </div>
            <div class="modal-body">
                영원히 삭제됩니다.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="/ask/delete/<?=$id?>" class="btn btn-primary"> 삭제 </a>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<div class="affix-fix"></div>
<main class="container">
    <?php
    switch ($ask->state){
        case 'wait': $color = 'red';break;
        case 'receive': $color = 'yellow';break;
        case 'solve': $color = 'green';break;
    } ?>
    <h1 class="title"> <?=$ask->title?> </h1>
    <div class="meta-row">
        <?=$ask->name?> · <time class="timeago" datetime="<?=$time_post?>"><?=$time_post_readable?></time>
    </div>
    <div class="ask row">
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-heading"> <span class="red circle"></span> <?=$ask->name?> · <time class="timeago" datetime="<?=$time_post?>"><?=$time_post_readable?></time> </div>
                <div class="panel-body">
                    <?=$this->markdown->parse($ask->content)?>
                </div>
            </div>


            <?php if($comments != NULL):
                foreach ($comments as $comment):
                    $time_post = date_create_from_format('Y-m-d H:i:s',$comment['time_post'])->format(DATE_ISO8601);
                    $time_post_readable = date_create_from_format('Y-m-d H:i:s',$comment['time_post'])->format('n월 j일 G:i');
                    $type = ($comment['type'] == 'admin') ? '<code>관리자</code> ':'';
                    switch ($comment['state']){
                        case 'wait': $color = 'red';break;
                        case 'receive': $color = 'yellow';break;
                        case 'solve': $color = 'green';break;
                    }
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="<?=$color?> circle"></span>
                            <?=$type?>
                            <?=$comment['name']?> · <time class="timeago" datetime="<?=$time_post?>"><?=$time_post_readable?></time>
                            <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 'admin'):?>
                            <a type="button" class="close" aria-label="Close" href="/ask/comment/delete/<?=$comment['id']?>"><span aria-hidden="true">&times;</span></a>
                            <?php endif;?>
                        </div>
                        <div class="panel-body">
                            <?=$this->markdown->parse($comment['content'])?>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
            <?php if (isset($_SESSION['student_id'])):
                if ($_SESSION['type'] == 'user'):?>
            <form action='/ask/write_comment/<?=$id?>' method="post" id="comment">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
                <div class="form-group">
                    <textarea name="comment" class="form-control" type="text" placeholder="여기에 댓글을 입력하세요."style="resize:vertical;" rows="5"></textarea>
                </div>
                <button class="btn btn-primary pull-right" type="submit" form="comment">달기!</button>
            </form>
            <?php elseif($_SESSION['type'] == 'admin'):?>
            <form action='/ask/write_comment_admin/<?=$id?>' method="post" id="comment">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
                <div class="row">
                    <div class="form-group col-sm-2">
                        <select name="state" class="form-control">
                            <option value="wait"> 대기 중 </option>
                            <option value="receive"> 접수됨 </option>
                            <option value="solve"> 해결됨 </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <textarea name="comment" class="form-control" type="text" placeholder="여기에 댓글을 입력하세요."style="resize:vertical;" rows="5"></textarea>
                    <p class="help-block">
                        <span class="glyphicon glyphicon-exclamation-sign"></span>
                        <a data-toggle="modal" data-target="#md">마크다운 문법</a>을 지원합니다.
                    </p>
                    <?php $this->load->view('parts/md')?>
                </div>
                <button class="btn btn-primary pull-right" type="submit" form="comment">달기!</button>
            </form>
            <?php endif;
                else:?>
            <p class="text-center">
                댓글을 달기 위해 먼저 <mark><a href="/login_error">로그인</a></mark>해주세요.
            </p>
            <?php endif;?>

        </div>
        <div class="clearfix visible-xs"></div>
        <div class="container visible-xs">
            <hr>
        </div>
        <aside class="col-sm-3">
            <strong> 현재 상태 </strong>
            <p>
                <span class="<?=$color?> circle"></span> <?=$this->lang->line($ask->state)?>
            </p>
            <strong> 게시 시간 </strong>
            <p>
                <?=$ask->time_post?>
            </p>
            <?php if($ask->time_edit != ''):?>
            <strong> 수정 시간 </strong>
            <p>
                <?=$ask->time_edit?>
            </p>
            <?php endif;?>
            <strong> 열람 수 </strong>
            <p>
                <?=$ask->hit?>
            </p>
        </aside>
    </div>
</main>
