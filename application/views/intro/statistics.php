<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a class="hidden-xs"> 장영신학생회관 </a><a class="visible-xs"> 장영신학생회관 › 통계 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right hidden-xs">
            <li><a href="/intro/center"> 소개 </a></li>
            <li><a href="/intro/history"> 역사 </a></li>
            <li><a href="/intro/statistics"> 통계 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container">
    <h1 class="soft-red"> 공간 별 누적 예약 </h1>
    <div class="">
        <span class="hidden space-num"> <?=json_encode($statistics)?></span>
        <div id="donut-charts"></div>
        <small>
            * 2016년 8월 15일부터 홈페이지를 통해 예약되어 승인된 예약입니다. <br>
            * 미래홀, 울림홀, 오픈 스페이스의 리허설을 포함한 예약은 한 예약으로 집계되었습니다.
        </small>
    </div>
</main>
