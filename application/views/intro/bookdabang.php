<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/bookdabang"> 책다방 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/bookdabang/state"> 예약 현황 </a></li>
            <li><a href="/bookdabang/reservation"> 예약하기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>
<main class="container">

    <?php $this->load->view('/parts/carousel',array('space'=>'bookdabang','number'=>4))?>

    <article>
        <section class="row h1-block">
            <h1 class="col-sm-3 soft-red">책다방<br class="hidden-xs">소개</h1>
            <div class="col-sm-9">
                <p class="margin-heading">
                    돈을 내지 않고도 편하게 와서 휴식할 수 있는 공간. 좋은 책이 있어 자유로이 독서하고 사색할 수 있는 공간. 다른 사람들과 부담 없이 의견을 나누며 토론과 세미나를 즐길 수 있는 공간. 그런 공간을 꿈꾸며 지어진 곳이 바로 여기, 책다방입니다.
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
                            <small>70명 수용 가능</small><br>
                            <small>행사공간은 25명</small>
                        </p>
                    </div>
                    <div class="col-xs-4">
                        <p class="text-center">
                            <small>책, 책, 그리고 책</small><br>
                            <small>프로젝터, 스피커</small><br>
                            <small>칠판, 책상, 의자</small><br>
                            <small>수도 시설</small>
                        </p>

                    </div>
                    <div class="col-xs-4">
                        <p class="text-center">
                            <small>하단 표 참고</small>
                        </p>
                    </div>
                </div>


                <a class="btn btn-soft-red pull-right" href="/book"> 책 목록 </a>
                <div class="clearfix"></div>
                <h3> 책다방 운영 시간 </h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="4"> 학기 중 </th>
                            <th colspan="2"> 방학 중 </th>
                        </tr>

                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <small> 시험기간에는 운영하지 않으며, 시험 전 주에는 운영시간이 달라집니다. 공지사항을 참고해 주세요. </small>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td> 월, 화, 목 </td>
                            <td> 수 </td>
                            <td> 금 </td>
                            <td> 주말, 공휴일 </td>
                            <td> 평일 </td>
                            <td> 주말, 공휴일 </td>
                        </tr>
                        <tr>
                            <td> 16시 -24시 </td>
                            <td> 16시 -22시 </td>
                            <td> 14시 -20시 </td>
                            <td> 쉼 </td>
                            <td> 13시 -21시 </td>
                            <td> 쉼 </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <hr>
        <section class="row h1-block">
            <h1 class="col-sm-3 soft-red">사용<br class="hidden-xs">방법</h1>

            <div class="col-sm-9">

                <h3> 열린 독서공간 </h3>
                <p>
                    책다방은 누구나 자유롭게 독서와 토론, 그리고 사색할 수 있는 공간입니다. 간단한 음료도 판매합니다.
                </p>

                <h3> 일반 예약 </h3>
                <ul class="list-unstyled">
                    <li>행사 45일 전부터 7일 전 21:00까지 예약이 가능합니다.</li>
                    <li>현재는 <span class="soft-red"><?=date('n',strtotime('+7 day'))?>월
                        <?=date('j',strtotime('+7 day'))?>일</span>부터
                        <span class="soft-red"><?=date('n',strtotime('+44 day'))?>월
                        <?=date('j',strtotime('+44 day'))?>일</span>까지의 예약이 가능합니다.</li>
                    <li>하루에 최대 <span class="soft-red">4시간</span> 예약할 수 있습니다.</li>
                    <li>예약을 받은 후 최소 이틀 이내로 신청자에게 승인 여부 연락이 갑니다.</li>
                    <li>예약 취소는 행사 3일 전 오후 9시까지 학생문화공간위원회에 통보해야 합니다.</li>
                    <li>예약 후 미 사용 시 경고 1회 부과됩니다.</li>
                    <li>경고 2회 누적 시 부과받은 날로부터 4개월 동안 일반 예약과 정기 예약이 불가능합니다.</li>
                    <li>책다방 운영 시간 외의 예약 또는 4시간 이상의 예약일 경우 학생문화공간위원회에 이메일로 연락해주세요.</li>
                </ul>

                <h3> 정기 예약 </h3>
                <ul class="list-unstyled">
                    <li>정규 학기 시작 후 1주일간 이메일로 정기예약 신청서를 받습니다. (계절학기 없음)</li>
                    <li>사용 시 신학관 내부 자보 홍보 및 아라에 등에 홍보를 해야 합니다.</li>
                    <li>예약 후 행사 미진행 2회 초과 시 해당 학기 정기 예약 취소 및 일반 예약이 불가능합니다.</li>
                    <li>일반 예약 불가능 페널티는 2회 초과한 날로부터 4개월간 적용됩니다.</li>
                    <li>예약 취소는 행사 3일 전 오후 9시까지 학생문화공간위원회의 통보해야 합니다.</li>
                    <li>정기예약의 신청기간을 놓친 경우 학생문화공간위원회에 이메일로 연락해주세요.</li>
                </ul>

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
                </div>

                <h4> 유실물의 처리 </h4>
                <p>
                    사용 후 남겨진 유실물은 공간위에서 1달 간 보관합니다.
                </p>

                <h4> 정리정돈 </h4>
                <p>
                    KAIST 학생 모두가 사용하는 공간입니다. 사용 후에는 주변을 정리정돈해 주시기 바랍니다.
                </p>
            </div>
        </section>
    </article>

</main>
