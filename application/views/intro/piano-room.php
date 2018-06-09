<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="#"> 피아노실 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/piano-room/state"> 예약 현황 </a></li>
            <li><a href="/piano-room/reservation"> 예약하기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container">
    <?php $this->load->view('/parts/carousel',array('space'=>$space, 'number'=>3))?>

    <div class="row h1-block">
        <div class="col-sm-3">
            <h1 class="soft-red"> 피아노실<br class="hidden-xs"> 소개 </h1>
        </div>
        <div class="col-sm-9">
            <p class="margin-heading">
                마음껏 피아노를 연습할 수 있는 공간입니다.
            </p>
            <div class="spacing"></div>
            <div class="row">
                <div class="col-xs-4">
                    <img src="/static/images/icon/people.png" alt="사람 수" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small> 최대 2명 </small>
                    </p>
                </div>
                <div class="col-xs-4">
                    <img src="/static/images/icon/facility.png" alt="장비" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small>피아노와 보면대</small><br>
                        <small>공기청정기</small><br>
                        <small> 냉난방 시설</small>
                    </p>
                </div>
                <div class="col-xs-4">
                    <img src="/static/images/icon/time.png" alt="시간" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small>24시간 언제나</small><br>
                    </p>
                </div>
            </div>

        </div>
    </div>

    <hr>

    <div class="row h1-block">
        <div class="col-sm-3">
            <h1 class="soft-red"> 사용<br class="hidden-xs"> 방법 </h1>
        </div>
        <div class="col-sm-9">
            <h3> 상시 개방 </h3>
            <p>
                피아노실은 예약이 없을 땐 누구나 사용 가능합니다.
            </p>
            <h3> 상시 예약 </h3>
            <ul class="list-unstyled">
                <li> 사용 14일 전부터 하루 전 오후 11시 59분까지 예약이 가능합니다. </li>
                <li> 현재는 <span class="soft-red"><?=date('n',strtotime('+1 day'))?>월
                    <?=date('j',strtotime('+1 day'))?>일</span>부터
                    <span class="soft-red"><?=date('n',strtotime('+14 day'))?>월
                    <?=date('j',strtotime('+14 day'))?>일</span>까지의 예약만 가능합니다.
                </li>
                <li> 하루에 최대 <span class="soft-red">2시간</span> 예약할 수 있습니다. </li>
            </ul>
        </div>
    </div>

    <hr>

    <div class="row h1-block">
        <div class="col-sm-3">
            <h1 class="soft-red"> 주의<br class="hidden-xs">사항</h1>
        </div>
        <div class="col-sm-9">
            <div class="spacing"></div>
            <div class="row">
                <div class="col-xs-4 col-sm-2">
                    <img src="/static/images/icon/drink_no.png" alt="음료 반입 금지" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small>음료 반입 금지</small>
                    </p>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <img src="/static/images/icon/snack_no.png" alt="스낵 반입 금지" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small>스낵 반입 금지</small>
                    </p>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <img src="/static/images/icon/food_no.png" alt="음식물 반입 금지" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small>음식 반입 금지</small>
                    </p>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <img src="/static/images/icon/clean.png" alt="사용 후 정리" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small>사용 후 정리</small>
                    </p>
                </div>
            </div>

            <h4> 사용자 </h4>
            <p> KAIST 학내 구성원만 사용 및 예약 사용할 수 있습니다. </p>

            <h4> 예약과 불일치 </h4>
            <p>
                예약과 실제 사용이 다를 경우 예약 제한 등의 패널티가 부과됩니다.
            </p>

            <h4> 분실물의 처리 </h4>
            <p>
                사용 후 남겨진 분실물은 학생문화공간위원회에서 1달 간 보관합니다.
            </p>

            <h4> 정리정돈 </h4>
            <p>
                KAIST 학생 모두가 사용하는 공간입니다. 사용 후에는 주변을 정리정돈해 주시기 바랍니다.
            </p>
        </div>
    </div>

</main>
