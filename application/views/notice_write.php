<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/notice"> 공지사항 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/notice"> 목록으로 돌아가기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container">
    <h4> 공지 작성하기 </h4>
    <hr>
    <!-- Form -->
    <form class="form-horizontal" action="/notice/write_process" method="post">
        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label"> 제목 </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title">
            </div>
        </div>

        <div class="form-group">
            <label for="tag" class="col-sm-2 control-label"> 태그 </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="tag">
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
                <textarea type="text" class="form-control" name="content" rows="30"
                    style="resize:vertical;"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"> 작성 </button>
            </div>
        </div>
    </form>

</main>
