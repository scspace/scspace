<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/seminar-room"> 세미나실 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/seminar-room/state"> 예약 현황 </a></li>
            <li><a href="/seminar-room/reservation"> 예약하기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container">
    <?php $this->load->view('/parts/carousel',array('space'=>$space, 'number'=>2))?>

    <div class="row h1-block">
        <div class="col-sm-3">
            <h1 class="soft-red"> 세미나실 <br class="hidden-xs"> 소개 </h1>
        </div>
        <div class="col-sm-9">
            <p class="margin-heading">
                학생들의 세미나 및 회의활동을 지원하는 공간입니다.
                조별과제부터 학과 회의까지 다양한 규모의 회의활동을 지원합니다.
                토론, 세미나, 스터디, 설명회 등 다양한 형태의 회의들이 진행 가능합니다.
            </p>
            <div class="spacing"></div>
            <div class="row">
                <div class="col-xs-4">
                    <img src="/static/images/icon/people.png" alt="사람 수" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small> 1실: 20명 </small><br>
                        <small> 2실: 30명 </small><br>
                    </p>
                </div>
                <div class="col-xs-4">
                    <img src="/static/images/icon/facility.png" alt="장비" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small> 빔 프로젝터, 스피커 </small><br>
                        <small> 책상과 의자 </small><br>
                        <small> 2실: 화이트보드 </small>
                    </p>
                </div>
                <div class="col-xs-4">
                    <img src="/static/images/icon/time.png" alt="시간" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small> 24시간 언제나 </small>
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
                세미나실은 예약이 없을 땐 누구나 사용 가능합니다.
            </p>

            <h3> 상시 예약 </h3>
            <ul class="list-unstyled">
                <li>사용 14일 전부터 하루 전 21:00까지 예약이 가능합니다.</li>
                <li>현재는 <span class="soft-red"><?=date('n',strtotime('+2 day'))?>월
                    <?=date('j',strtotime('+2 day'))?>일</span>부터
                    <span class="soft-red"><?=date('n',strtotime('+14 day'))?>월
                    <?=date('j',strtotime('+14 day'))?>일</span>까지의 예약이 가능합니다.
                </li>
                <li>하루에 최대 <span class="soft-red">3시간</span> 예약할 수 있습니다.</li>
                <li>시험기간 전 주와 시험기간에는 상시 예약이 불가능합니다.</li>
            </ul>

            <h3> 정기 예약 </h3>
            <p>
                정기예약은 회의할 공간이 없는 카이스트 학생 단체를 대상으로 합니다.
                오프라인으로 진행되며 학생문화공간위원회 홈페이지, 아라, 페이스북 페이지에 최소 일주일 전에 공지됩니다.
                정기예약의 취소는 <span class="soft-red">사용 3일 전 21시</span>까지 학생문화공간위원회에 알려야합니다. <br>
                <small> 정기 예약 날짜는 해당 학기의 사정에 따라 조정될 수 있습니다.</small>
            </p>
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
                    <img src="/static/images/icon/drink_ok.png" alt="음료 반입 가능" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small>음료 반입 가능</small>
                    </p>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <img src="/static/images/icon/snack_ok.png" alt="스낵 반입 가능" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small>스낵 반입 가능</small>
                    </p>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <img src="/static/images/icon/food_no.png" alt="음식 반입 금지" class="intro-icon center-block"/>
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

            <h3> 사용자 </h3>
            <p> KAIST 학내 구성원만 사용할 수 있습니다. </p>
            <h3> 예약 사용자 </h3>
            <p>
                예약 사용자는 KAIST 학내 구성원으로 제한하나, 다음의 경우에는 학생문화공간위원회와의 협의 하에 사용 가능합니다.
            </p>
            <ul class="list-unstyled">
                <li>KAIST 학부 총학생회 또는 총학생회 산하 단체가 주최하는 경우</li>
                <li>KAIST 학부 총학생회 회원 전체를 대상으로 열려있는 행사의 경우</li>
                <li>행사의 내용이 KAIST 학생 문화 발전에 기여하는데 도움이 된다고 판단하는 경우</li>
            </ul>

            <h3> 목적의 제한 </h3>
            <p>
                다음의 경우 사용이 불가능합니다. 자세한 사항은 문의해주시기 바랍니다.
            </p>
            <ul class="list-unstyled">
                <li> 정치, 종교적인 행사 및 행위 </li>
                <li> 영리를 목적으로 하는 행사 및 행위 </li>
                <li> 공공질서와 미풍양속을 해칠 우려가 있는 행사 및 행위 </li>
                <li> 시설 또는 설비의 관리에 지장을 줄 수 있는 행사 및 행위 </li>
            </ul>

            <h3> 예약과 불일치 </h3>
            <p>
                예약과 실제 사용이 다를 경우 예약 제한 등의 패널티가 부과됩니다.
            </p>

            <h3> 분실물의 처리 </h3>
            <p>
                사용 후 남겨진 분실물은 학생문화공간위원회에서 1달 간 보관합니다.
            </p>

            <h3> 정리정돈 </h3>
            <p>
                사용 후에는 프로젝터와 컴퓨터를 끄고 케이블을 정리해주시기 바랍니다.
            </p>
        </div>
    </div>
</main>
