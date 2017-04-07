<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<main class="container">

    <h1> 분실물 등록하기 </h1>
    <hr>
    <!-- Form -->
    <form class="form-horizontal" action="/manage/lost_process" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label"> 이름 </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name">
            </div>
        </div>

        <div class="form-group">
            <label for="date" class="col-sm-2 control-label"> 습득일 </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="date" placeholder="YYYY-MM-DD">
            </div>
        </div>

        <?php if($error != ''):?>
        <div class="alert alert-danger" role="alert"><?=$error?></div>
        <?php endif?>
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label"> 이미지 첨부 </label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="image" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"> 등록하기 </button>
            </div>
        </div>
    </form>
</main>
