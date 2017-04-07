<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li> <a> 문의하기 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/ask"> 목록으로 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container">
    <form class="form-horizontal" action="/ask/write_process" enctype="multipart/form-data" method="post">
        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />

        <div class="form-group">
            <label for="title" class="col-sm-2 control-label"> 이슈 </label>
            <div class="col-sm-10">
                <input name="title" type="text" class="form-control" required>
            </div>
        </div>

        <div class="form-group">

            <label for="tag" class="col-sm-2 control-label"> 태그 </label>
            <div class="col-sm-2 field-first">
                <select name="tag[place]" class="form-control input-first select-override">
                    <option value="site"> 사이트 </option>
                    <option value="bookdabang"> 책다방 </option>
                    <option value="workshop"> 창작공방 </option>
                    <option value="individual_practice_room"> 개인연습실 </option>
                    <option value="piano_room"> 피아노실 </option>
                    <option value="dance_studio"> 무예실 </option>
                    <option value="multipurpose_room"> 다용도실 </option>
                    <option value="seminar_room"> 세미나실 </option>
                    <option value="group_practice_room"> 합주실 </option>
                    <option value="ullim_hall"> 울림홀 </option>
                    <option value="mirae_hall"> 미래홀 </option>
                    <option value="open_space"> 오픈스페이스 </option>
                    <option value="etc"> 기타 </option>
                </select>
            </div>

            <div class="col-sm-2 field-last">
                <select name="tag[type]" class="form-control input-last select-override">
                    <option value="problem"> 문제 </option>
                    <option value="suggestion"> 건의 </option>
                    <option value="ask"> 문의 </option>
                    <option value="etc"> 기타 </option>
                </select>
            </div>

        </div>

        <div class="form-group">
            <label for="content" class="col-sm-2 control-label"> 내용 </label>
            <div class="col-sm-10">
                <p class="help-block">
                    <span class="glyphicon glyphicon-exclamation-sign"></span>
                    <a data-toggle="modal" data-target="#md">마크다운 문법</a>을 지원합니다.
                </p>
                <?php $this->load->view('parts/md')?>
                <textarea name="content" class="form-control" rows="20" style="resize:vertical;" required></textarea><br>
            </div>
        </div>

        <div class="form-group">
            <label for="image" class="col-sm-2 control-label"> 이미지 </label>
            <div class="col-sm-10">
                <input name="image" type="file">
                <p class="help-block"> 용량 10MB 이하의 이미지를 제출 할 수 있습니다. </p>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"> 이슈 만들기 </button>
            </div>
        </div>
    </form>
</main>
