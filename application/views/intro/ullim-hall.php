<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/ullim-hall"> 울림홀 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/ullim-hall/state"> 예약 현황 </a></li>
            <li><a href="/ullim-hall/reservation"> 예약하기 </a></li>
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
            <h1 class="soft-red"> 울림홀<br class="hidden-xs"> 소개 </h1>
        </div>
        <div class="col-sm-9">
            <p class="margin-heading">
                강연, 공연, 상영회 등을 할 수 있는 공간입니다. 강연과 상영회에 특화되어 있습니다.
            </p>
            <div class="spacing"></div>
            <div class="row">
                <div class="col-xs-4">
                    <img src="/static/images/icon/people.png" alt="사람 수" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small> 180명 </small><br>
                    </p>
                </div>
                <div class="col-xs-4">
                    <img src="/static/images/icon/facility.png" alt="장비" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small> 음향과 조명 </small><br>
                        <small> 프로젝터와 스크린 </small><br>
                        <small> 무대 </small><br>
                        <small> 의자 120개 </small><br>
                        <small> 냉난방 시설 </small><br>
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
                울림홀은 예약이 없을 땐 누구나 사용 가능합니다. 조명장치와 빔 프로젝터는 사용할 수 없습니다.
            </p>

            <h3> 상시 예약 </h3>
            <p>
                학내 구성원 전체에게 열린 행사만 예약이 가능합니다.
                행사 대상이 제한된 경우 학생문화공간위원회의 심의를 거쳐 행사를 진행할 수 있습니다.
                리허설을 포함하여 <span class="soft-red">일주일<sup>*</sup>에 2번</span>까지 예약할 수 있습니다.
            </p>

            <h4> 장비 사용 시 </h4>
            <ul class="list-unstyled">
                <li>사용 45일 전부터 14일 전 21:00까지 예약이 가능합니다.</li>
                <li>현재는 <span class="soft-red"><?=date('n',strtotime('+14 day')+10800)?>월
                    <?=date('j',strtotime('+14 day')+10800)?>일</span>부터
                    <span class="soft-red"><?=date('n',strtotime('+44 day')+10800)?>월
                    <?=date('j',strtotime('+44 day')+10800)?>일</span>까지의 예약이 가능합니다.
                </li>
                <li>
                    장비 사용 시 <span class="soft-red">근로학생</span>이 배정됩니다.
                    예약 승인 시 근로 장학생의 연락처가 제공되며 리허설과 행사에서 도움을 받을 수 있습니다.
                    주말의 경우에는 근로 장학생에게 시간당 12,000원의 수당을 지급해야합니다.
                    단, 공연집중기간에는 수당 지급 없이 근로 장학생의 도움을 받을 수 있습니다.
                </li>
                <li> 예약의 취소는 행사 14일 전 오후 9시까지 학생문화공간위원회에 통보해야 합니다.</li>
            </ul>

            <h4> 장비 미사용 시 </h4>
            <ul class="list-unstyled">
                <li>사용 45일 전부터 3일 전 21:00까지 예약이 가능합니다.</li>
                <li>현재는 <span class="soft-red"><?=date('n',strtotime('+3 day')+10800)?>월
                    <?=date('j',strtotime('+3 day')+10800)?>일</span>부터
                    <span class="soft-red"><?=date('n',strtotime('+44 day')+10800)?>월
                    <?=date('j',strtotime('+44 day')+10800)?>일</span>까지의 예약이 가능합니다.
                </li>
                <li> 예약의 취소는 행사 하루 전 오후 9시까지 학생문화공간위원회에 통보해야 합니다.</li>
            </ul>
            <small> * 일주일의 시작은 월요일입니다. </small>

            <h3> 공연집중기간 예약 </h3>
            <p>
                공연집중기간 <span class="soft-red">3월, 5월, 11월</span>을 의미합니다.
                해당 기간 내의 울림홀과 미래홀의 예약은 오프라인 협의로 진행됩니다.
                협의 일정은 매 학기 초 학생문화공간위원회 홈페이지, 아라, 페이스북 페이지에 공지됩니다.
                협의 이후 남는 시간은 상시 예약이 가능합니다.
            </p>

            <h3> 보증금 </h3>
            <p>
                예약이 승인되면 행사 <span class="soft-red">하루 전 21시</span>까지 보증금을 입금해야합니다. 사용 이후 뒷정리와 기물 파손 여부에 따라 보증금 환급 여부가 결정됩니다.
            </p>
            <table class="table">
              <thead>
                  <tr>
                      <th> 반입 안함 </th>
                      <th> 스낵과 음료 </th>
                      <th> 음식과 주류 </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td> 5만원 </td>
                      <td> 15만원 </td>
                      <td> 50만원 </td>
                  </tr>
              </tbody>
            </table>
            <small>
              감사위에 제출할 <span class="soft-red">보증금 입금 증빙 서류</span>가 필요할 경우 scspace.kaist@gmail.com 로 문의 해 주시기 바랍니다
            </small>

            <h3> 패널티 </h3>

            <h4> 한 학기 사용 금지 </h4>
            <ul class="list-unstyled">
                <li> 신청서를 허위로 기재할 경우 </li>
                <li> 금지사항을 어길 경우 </li>
                <li> 울림홀 기기를 무단으로 사용할 경우 </li>
            </ul>

            <h4> 공연집중기간 후순위 배정 </h4>
            <ul class="list-unstyled">
                <li> 예약을 하고 사용하지 않을 경우 </li>
                <li> 사전 공지없이 예약 시간을 지키지 않을 경우 </li>
                <li> 예약 취소를 늦게 공지할 경우 </li>
                <li> 뒷정리가 심각하게 미흡할 경우 </li>
                <li> 그 외 타인에게 피해를 주는 악의적인 행위 </li>
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
                    <img src="/static/images/icon/drink_notdecided.png" alt="음료 협의" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small>음료 협의</small>
                    </p>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <img src="/static/images/icon/snack_notdecided.png" alt="스낵 협의" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small>스낵 협의</small>
                    </p>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <img src="/static/images/icon/food_notdecided.png" alt="음식 협의" class="intro-icon center-block"/>
                    <p class="text-center margin-heading">
                        <small>음식 협의</small>
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

            <h4> 분실물의 처리 </h4>
            <p>
                사용 후 남겨진 분실물은 학생문화공간위원회에서 1달 간 보관합니다.
            </p>

        </div>
    </div>
</main>
