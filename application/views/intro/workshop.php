<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/workshop"> 창작공방 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/workshop/state"> 예약 현황 </a></li>
            <li><a href="/workshop/reservation"> 예약하기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container">
    <?php $this->load->view('/parts/carousel',array('space'=>$space, 'number'=>3))?>

    <article>
        <section class="row h1-block">
            <h1 class="col-sm-3 soft-red">창작공방<br class="hidden-xs"> 소개</h1>
            <div class="col-sm-9">
                <p class="margin-heading">
                    자신의 공방을 가지고 싶었던 꿈이 있으셨나요? 창작공방은 바로 당신을 위한 공간입니다. 이미 준비된 공구에 언제든지 열려있으니 몸만 와서 원하는 걸 뚝딱뚝딱! 함께 쓰는 공간인만큼 뒷정리는 필수인 거 아시죠?
                </p>
                <div class="spacing"></div>
                <div class="row">
                    <div class="col-xs-4">
                        <img src="/static/images/icon/people.png" alt="사람 수" class="intro-icon center-block"/>
                    </div>
                    <div class="col-xs-4">
                        <img src="/static/images/icon/facility.png" alt="장비" class="intro-icon center-block"/>
                    </div>
                    <div class="col-xs-4">
                        <img src="/static/images/icon/time.png" alt="시간" class="intro-icon center-block"/>
                    </div>
                </div>
                <div class="spacing"></div>
                <div class="row">
                    <div class="col-xs-4">
                        <p class="text-center">
                            <small>20명 수용 가능</small>
                        </p>
                    </div>
                    <div class="col-xs-4">
                        <p class="text-center">
                            <small>드라이버, 톱 등 공구</small><br>
                            <small>재봉틀 및 관련 용구</small><br>
                            <small>이젤 및 화방 용구</small><br>
                            <small>라이트 박스</small><br>
                            <small>빔 프로젝터, 스피커</small><br>
                            <small>화이트보드</small><br>
                            <small>수도 시설</small><br>
                            <small>그리고 당신을 위한 사물함</small>
                        </p>

                    </div>
                    <div class="col-xs-4">
                        <p class="text-center">
                            <small>24시간 사용 가능</small>
                        </p>
                    </div>
                </div>



            </div>
        </section>
        <hr>
        <section class="row h1-block">
            <h1 class="col-sm-3 soft-red">사용<br class="hidden-xs"> 방법</h1>
            <div class="col-sm-9">
                <h3> 상시 개방 </h3>
                <p>
                    창작공방은 누구나 들어와 자신만의 예술과 공학을 선보일 수 있는 공간입니다. 다른 사람과 나누고 싶은 공구나 자재가 있다면 기부도 환영입니다.
                </p>

                <h3> 상시 예약 </h3>
                <ul class="list-unstyled">
                    <li>사용 14일 전부터 이틀 전 오후 11시 59분까지 예약이 가능합니다.</li>
                    <li>현재는
                        <span class="soft-red"><?=date('n',strtotime('+2 day +9 hour'))?>월 <?=date('j',strtotime('+2 day +9 hour'))?>일</span>부터
                        <span class="soft-red"><?=date('n',strtotime('+14 day +9 hour'))?>월 <?=date('j',strtotime('+14 day +9 hour'))?>일</span>까지의 예약이 가능합니다.
                    </li>
                    <li>하루에 최대 <span class="soft-red">3시간</span> 예약할 수 있습니다.</li>
                    <li>시험기간 전 주와 시험기간에는 상시 예약이 불가능합니다.</li>
                </ul>
                
                <h3> 패널티 </h3>
                <h4> 아래와 같은 경우가 발생했을 시 주의를 부과한다 </h4>
                <ul class="list-unstyled">
                    <li> 음료나 간단한 스낵을 제외한 음식물 및 주류를 반입할 경우 </li>
                    <li> 예약을 취소하지 않고 공간을 사용하지 않을 경우 </li>
                    <li> 뒷정리가 미흡할 경우 </li>
                </ul>

                <h4> 아래와 같은 경우가 발생했을 경고를 부과한다 </h4>
                <ul class="list-unstyled">
                    <li> 예약과 실제 사용 내용이 다를 경우</li>
                    <li> 창작공방 내부 설비 고의 파손 및 안전상의 문제를 야기할 수 있는 행위을 할 경우 </li>
                    <li> 그 외 학생문화공간위원회가 타인에게 피해를 주는 행위 혹은 악의적인 행위라고 판단될 경우 </li>
                </ul>

                <h4> 주의와 경고는 다음과 같이 처리된다 </h4>
                <ul class="list-unstyled">
                    <li> 주의 2회가 누적된 경우, 경고 1회로 대체한다 </li>
                    <li> 경고 1회가 누적된 경우 경고 부과일로부터 30일 동안 해당 공간의 예약이 불가하다. 정기예약의 경우 해당 학기 정기예약이 취소된다 </li>
                    <li> 경고 2회 이상 누적된 경우 경고 부과일로부터 90일 동안 해당 공간의 예약이 불가하다 </li>
                    <li> 경고 및 주의는 매년 봄학기 개강일을 기준으로 초기화된다 </li>
                </ul>

                <h3> 정기 사물함 신청 </h3>
                <p>
                    매 홀수달 셋째 주 월요일 선착순으로 사물함 사용 신청을 받습니다. 자물쇠 분실을 방지하기 위해 보증금 만원을 받습니다.
                </p>
                <h3> 작업물의 보관 </h3>
                <p>
                    작업이 끝나지 않아 창작공방에 계속해서 보관해야 할 경우에는, 이름과 연락처, 보관 기한, 작업물을 적어서 작업물에 붙여 주시면 최대 <span class="soft-red">7일</span>간 보관이 가능합니다.
                </p>
            </div>
        </section>
        <hr>
        <section class="row h1-block">
            <h1 class="col-sm-3 soft-red"> 주의<br class="hidden-xs">사항 </h1>
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
                        <img src="/static/images/icon/food_no.png" alt="음식 금지" class="intro-icon center-block"/>
                        <p class="text-center margin-heading">
                            <small>음식 금지</small>
                        </p>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <img src="/static/images/icon/clean.png" alt="사용 후 정리" class="intro-icon center-block"/>
                        <p class="text-center margin-heading">
                            <small>사용 후 정리</small>
                        </p>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <img src="/static/images/icon/fire_no.png" alt="화기 사용 금지" class="intro-icon center-block"/>
                        <p class="text-center margin-heading">
                            <small>화기 사용 금지</small>
                        </p>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <img src="/static/images/icon/facility_caution.png" alt="타인 작업물 주의" class="intro-icon center-block"/>
                        <p class="text-center margin-heading">
                            <small>타인 작업물 주의</small>
                        </p>
                    </div>
                </div>
                <h4> 사용자 </h4>
                <p>
                    KAIST 학내 구성원만 사용할 수 있습니다.
                </p>
                <h3> 예약 사용자 </h3>
                <p>
                    예약 사용자는 KAIST 학내 구성원으로 제한하나, 다음의 경우에는 학생문화공간위원회와의 협의 하에 사용 가능합니다.
                </p>
                <ul class="list-unstyled">
                    <li>KAIST 학부 총학생회 또는 총학생회 산하 단체가 주최하는 경우</li>
                    <li>KAIST 학부 총학생회 회원 전체를 대상으로 열려있는 행사의 경우</li>
                    <li>행사의 내용이 KAIST 학생 문화 발전에 기여하는데 도움이 된다고 판단하는 경우</li>
                </ul>

                <h4> 분실물의 처리 </h4>
                <p>
                    사용 후 남겨진 분실물은 학생문화공간위원회에서 1달 간 보관합니다.
                </p>

                <h4> 화기 제한 </h4>
                <p>
                    안전을 위해 화기 사용을 금합니다.
                </p>

                <h4> 타인 작업물 주의 </h4>
                <p>
                    타인의 작업물도 소중합니다. 타인의 작업물에 손 대지 말아주세요.
                </p>

                <h4> 작업 후 환기 </h4>
                <p>
                    사용 후에는 창작공방을 환기시켜 주세요.
                </p>

                <h4> 작업용 책상 정리 </h4>
                <p>
                    다른 사람도 기분좋게 쓸 수 있도록, 사용 후에는 작업 책상을 깨끗이 치워 주세요.
                </p>

            </div>
        </section>
    </article>
</main>
