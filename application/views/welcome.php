<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<main class="container">
    <div class="spacing"></div>
    <h1 class="text-center soft-red"> 학생문화공간위원회 홈페이지에 오신 것을 환영합니다. </h1>

    <div class="row">
        <!-- <div class="col-sm-3">
            <h2> 리크루팅 </h2>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th> 날짜 </th>
                        <th> 일정 </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 2월 26 - 3월 2일, 3월 5-9일 19-21시</td>
                        <td> 오픈 공간위 </td>
                    </tr>
                    <tr>
                        <td> 3월 11일까지 </td>
                        <td> 서류 접수 </td>
                    </tr>
                    <tr>
                        <td> 3월 12-14일 </td>
                        <td> 면접 </td>
                    </tr>
                </tbody>
            </table>
            <a href="/recruit" type="button" class="btn soft-red-button btn-lg btn-block"> 리크루팅 바로가기 </a>
        </div> -->
        <div class="col-sm-9">
            <h2> 공지사항 </h2> <hr>
            <table class="table table-hover">
                <thead>
                    <tr class="hidden-xs">
                        <td> 태그 </td>
                        <td> 제목 </td>
                        <td> 날짜 </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    date_default_timezone_set('Asia/Seoul');
                    foreach ($notices as $notice):
                        $time_post = date_create_from_format('Y-m-d H:i:s',$notice['time_post'])->format('n월 j일 H:i');
                        ?>
                    <tr class="pointer" onclick="location.href='/notice/view/<?=$notice['id']?>'">
                        <td class="col-sm-2 hidden-xs"> <?=$notice['tag']?> </td>
                        <td class="col-sm-8 hidden-xs"> <?=$notice['title']?> </td>
                        <td class="col-sm-2 hidden-xs"> <?=$time_post?> </td>

                        <td class="visible-xs">
                            <?=$notice['title']?> <br>
                            <small>#<?=$notice['tag']?> | <?=$time_post?></small>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


</main>
