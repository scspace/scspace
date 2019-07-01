<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="#"> 합주실 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/group-practice-room/state"> 예약 현황 </a></li>
            <li><a href="/group-practice-room/reservation"> 예약하기 </a></li>
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
            <h1 class="soft-red"> 합주실 <br class="hidden-xs"> 소개 </h1>
        </div>
        <div class="col-sm-9">
            <p class="margin-heading">
                키보드와 드럼, 앰프, 믹서, 마이크 그리고 앰프까지 갖춘 밴드에 최적화된 연습실입니다.
            </p>
            <div class="spacing"></div>
            <div class="row">
                <div class="col-xs-4">
                    <img src="/static/images/icon/people.png" alt="사람 수" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small> 5명 </small><br>
                        <small> 3명 이상<sup>*</sup> </small>
                    </p>
                </div>
                <div class="col-xs-4">
                    <img src="/static/images/icon/facility.png" alt="장비" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small> 키보드, 드럼 </small><br>
                        <small> 베이스용, 일렉용 앰프 </small><br>
                        <small> 마이크, 마이크스탠드 </small><br>
                        <small> 책상, 의자, 보면대 </small><br>
                        <small> 캐논잭/55잭 케이블 </small><br>
                        <small> 파워드 믹서 </small>
                    </p>
                </div>
                <div class="col-xs-4">
                    <img src="/static/images/icon/time.png" alt="시간" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small> 예약자만 사용 가능 </small><br>
                        <small> 24시간 언제나 </small>
                    </p>
                </div>
            </div>
            <small>* 3인 이하의 연습은 개인연습실을 이용해주시기 바랍니다.</small>
        </div>
    </div>

    <hr>

    <div class="row h1-block">
        <div class="col-sm-3">
            <h1 class="soft-red"> 사용<br class="hidden-xs"> 방법 </h1>
        </div>
        <div class="col-sm-9">

            <h3> 상시 예약 </h3>
            <h4> 팀 등록 </h4>
            <p>
              예약을 위하여 최소 3인의 팀 등록을 필요합니다. <br>
              팀 등록은 매 정규학기가 끝날 때 초기화 됩니다
            </p>
            <a href="/group-practice-room/team-register" class="btn btn-soft-red pull-right"> 팀 등록 </a>
            <div class="clearfix"></div>

            <h4> 카드키와 보증금 </h4>
            <ul class="list-unstyled">
                <!-- <li> 카드키는 사용 전 마지막 상근시간에 학생문화공간위원회 사무실을 방문하여 <span class="soft-red">보증금 2만원과 신분증</span>을 맡긴 후 빌려갈 수 있습니다. </li> -->
                <li> 카드키는 사용시간 직전의 상근시간에 사무실을 방문하여 대여하여야 하며 사용시간 직후의 상근시간에 사무실을 방문하여 반납하여야 합니다. </li>
                <li> 반납이 하루<sup>**</sup> 늦어질 때마다 보증금 2천원을 차감하여 최대 2만원을 차감합니다. </li>
                <li> 카드키를 분실할 경우 보증금 2만원을 차감하며 1주일 내에 분실을 신고하지 않았을 경우 해당 학기의 합주실 사용이 금지됩니다. </li>
            </ul>
            <small>** 주말은 상근이 없으므로 보증금 차감에서 제외됩니다.</small>

            <br>
            <h4> 예약 가능 시간 </h4>
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
                <li> 물을 제외한 음식물 및 주류를 반입할 경우 </li>
                <li> 예약을 취소하지 않고 공간을 사용하지 않을 경우 </li>
                <li> 예약 이오ㅢ의 시간에 사용할 경우</li>
                <li> 뒷정리가 미흡할 경우 </li>
            </ul>

            <h4> 아래와 같은 경우가 발생했을 경고를 부과한다 </h4>
            <ul class="list-unstyled">
                <li> 합주실 내부 설비 고의 파손 및 안전상의 문제를 야기할 수 있는 행위을 할 경우 </li>
                <li> 그 외 학생문화공간위원회가 타인에게 피해를 주는 행위 혹은 악의적인 행위라고 판단될 경우 </li>
                <li> 카드키 분실을 반납기한으로부터 1주일 이내에 신고를 하지 않은 경우 </li>
            </ul>

            <h4> 주의와 경고는 다음과 같이 처리된다 </h4>
            <ul class="list-unstyled">
                <li> 주의 2회가 누적된 경우, 경고 1회로 대체한다 </li>
                <li> 경고 1회가 누적된 경우 경고 부과일로부터 30일 동안 해당 공간의 예약이 불가하다. 정기예약의 경우 해당 학기 정기예약이 취소된다 </li>
                <li> 경고 2회 이상 누적된 경우 경고 부과일로부터 90일 동안 해당 공간의 예약이 불가하다 </li>
                <li> 경고 및 주의는 매년 봄학기 개강일을 기준으로 초기화된다 </li>
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
                <div class="col-xs-4 col-sm-2">
                    <img src="/static/images/icon/facility_caution.png" alt="장비 파손 주의" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small>장비 파손 주의</small>
                    </p>
                </div>
            </div>

            <h4> 사용자 </h4>
            <p> KAIST 학내 구성원만 사용할 수 있습니다. </p>

            <h4> 예약 사용자 </h4>
            <p>
                예약 사용자는 KAIST 학내 구성원으로 제한하나, 다음의 경우에는 학생문화공간위원회와의 협의 하에 사용 가능합니다.
            </p>
            <ul class="list-unstyled">
                <li>KAIST 학부 총학생회 또는 총학생회 산하 단체가 주최하는 경우</li>
                <li>KAIST 학부 총학생회 회원 전체를 대상으로 열려있는 행사의 경우</li>
                <li>행사의 내용이 KAIST 학생 문화 발전에 기여하는데 도움이 된다고 판단하는 경우</li>
            </ul>

            <h4> 목적의 제한 </h4>
            <p>
                다음의 경우 사용이 불가능합니다. 자세한 사항은 문의해주시기 바랍니다.
            </p>
            <ul class="list-unstyled">
                <li> 정치, 종교적인 행사 및 행위 </li>
                <li> 영리를 목적으로 하는 행사 및 행위 </li>
                <li> 공공질서와 미풍양속을 해칠 우려가 있는 행사 및 행위 </li>
                <li> 시설 또는 설비의 관리에 지장을 줄 수 있는 행사 및 행위 </li>
            </ul>

            <h4> 예약과 불일치 </h4>
            <p>
                예약과 실제 사용이 다를 경우 예약 제한 등의 패널티가 부과됩니다.
            </p>

            <h4> 분실물의 처리 </h4>
            <p>
                사용 후 남겨진 분실물은 학생문화공간위원회에서 1달 간 보관합니다.
            </p>

            <h4> 정리정돈 </h4>
            <ul class="list-unstyled">
                <li> 사용 후 키보드와 앰프의 전원을 꺼주세요. </li>
                <li> 케이블은 앰프 전원을 끈 후 분리해주세요. </li>
                <li> 케이블은 잘 정리해주세요. </li>
            </ul>
        </div>
    </div>
    <section class="row h1-block">
        <h1 class="col-sm-3 soft-red"> 장비 목록 </h1>
        <div class="col-sm-9 margin-heading">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> 용도 </th>
                        <th> 모델명 </th>
                        <th> 수량 </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 베이스 앰프 </td>
                        <td> AMPEG BA-108 </td>
                        <td> 1 </td>
                    </tr>
                    <tr>
                        <td> 일렉 앰프 </td>
                        <td> Fender 212R </td>
                        <td> 1 </td>
                    </tr>
                    <tr>
                        <td> 키보드 </td>
                        <td> KURZWEIL SP4-8 </td>
                        <td> 1 </td>
                    </tr>
                    <tr>
                        <td> 드럼 </td>
                        <td> MAPEX </td>
                        <td> 1 </td>
                    </tr>
                    <tr>
                        <td> 마이크 </td>
                        <td> SHURE SM58SK </td>
                        <td> 2 </td>
                    </tr>
                    <tr>
                        <td> 마이크 스탠드 </td>
                        <td> iMi MTC-503 </td>
                        <td> 1 </td>
                    </tr>
                    <tr>
                        <td> 드럼용 카페트 </td>
                        <td> TAMA </td>
                        <td> 1 </td>
                    </tr>
                    <tr>
                        <td> 파워드 믹서 </td>
                        <td> YAMAHA 400i </td>
                        <td> 1 </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>

