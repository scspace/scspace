<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/open-space"> 오픈스페이스 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/open-space/state"> 예약 현황 </a></li>
            <li><a href="/open-space/reservation"> 예약하기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container">
    <div class="card-container">
        <div class="card-row">
            <div class="col-card">
                <div class="card card-soft-red">
                    <h2> 오픈스페이스<br> 소개 </h2>
                    <hr>
                    <p>
                        오픈 스페이스는 전시와 공연을 위해 열려있는 공간입니다.
                    </p>
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <h2> 상시 예약 </h2>
                    <p>
                        행사 45일 전부터 7일 전 오후 9시까지 예약이 가능합니다.
                        현재는 <span class="soft-red"><?=date('n',strtotime('+7 day')+10800)?>월
                            <?=date('j',strtotime('+7 day')+10800)?>일</span>부터
                            <span class="soft-red"><?=date('n',strtotime('+44 day')+10800)?>월
                            <?=date('j',strtotime('+44 day')+10800)?>일</span>까지의 예약만 가능합니다.
                        최대 <span class="soft-red">14일</span>까지 사용할 수 있습니다.
                    </p>
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <h2> 보증금 </h2>
                    <div class="table-container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> 음식, 주류 반입 </th>
                                    <th> 미반입 </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 50만원 </td>
                                    <td> 10만원 </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>
                        시설물을 파손시키거나 뒷정리가 미흡한 경우 보증금이 차감될 수 있습니다.
                    </p>
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <h2> 전시 보조도구 대여 </h2>
                    <p>
                        학생문화공간위원회에서 차단봉, 안내판 등의 전시 보조도구를 대여할 수 있습니다.
                    </p>
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <span class="glyphicon glyphicon-headphones gly-img"></span>
                    <h2> 소음에 대한 <br>
                        양해서 </h2>
                    <p>
                        기획하고 있는 행사가 큰 소리를 낸다면 미리 장영신학생회관 내부의 단체들에게 서명을 받아야합니다.<br>
                        <a class="btn btn-primary soft-red-button" href="/static/documents/20170517 noise understand.docx" download="20170517 noise understand.docx" role="button" style="margin:1em 0 0;color:white;"> 양식 다운로드 </a>
                    </p>
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <h2> 공간 사용 규칙 </h2>
                    <p> 공간 사용 규칙은 <a href="https://docs.google.com/document/d/e/2PACX-1vS0muW5qMM0F-Uj3X6Ps-AKuYaRaWEXP_T2ETNGVSpiWabdoB_gMWJ7BiJjJhaLh0istjHqhQVemyOo/pub">이 문서</a>를 참고해주세요. </p>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="card-container">
        <div class="card-row">
            <div class="col-card">
                <div class="card card-soft-red">
                    <h2> 전시<br>계단 </h2>
                    <hr>
                    <p> 미술품 전시부터 사진전까지. 다양한 전시를 구경 할 수 있습니다. 계단 난간쪽으로는 미디어 스페이스에서 이어지는 다양한 홍보물부터 자보를 구경할 수 있습니다. </p>
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/static/images/space/exhibition_stair.jpg">
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/static/images/space/exhibition_stair.svg">
                </div>
            </div>
            <div class="col-card">
                <div class="card">

                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="card-container">
        <div class="card-row">
            <div class="col-card">
                <div class="card card-soft-red">
                    <h2> 커뮤니티<br>마당 </h2>
                    <hr>
                    <p> 커뮤니티 마당은 장영신학생회관의 마당입니다. 밴드의 버스킹과 야외 뮤지컬, 음악회 등 다양한 행사가 열립니다 </p>
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/static/images/space/community_yard.jpg">
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/static/images/space/community_yard.svg">
                </div>
            </div>


        </div>
    </div>

    <hr>

    <div class="card-container">
        <div class="card-row">
            <div class="col-card">
                <div class="card card-soft-red">
                    <h2> 옥상 </h2>
                    <hr>
                    <p> 때로는 옥상에 올라와 지친 마음을 달래세요. 은은한 조명과 의자, 멋진 풍경이 준비되어있습니다. </p>
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/static/images/space/rooftop.jpg">
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/static/images/space/rooftop.svg">
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="card-container">
        <div class="card-row">
            <div class="col-card">
                <div class="card card-soft-red">
                    <h2> 미디어<br>스페이스 </h2>
                    <hr>
                    <p> 교내의 소식부터 교외의 소식까지. 인쇄 매체부터 영상 매체까지. 다양한 정보를 접할 수 있습니다. </p>
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/static/images/space/media_space.jpg">
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/static/images/space/media_space.svg">
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="card-container">
        <div class="card-row">
            <div class="col-card">
                <div class="card card-soft-red">
                    <h2> 2층 로비 </h2>
                    <hr>
                    <p> 친구, 연인과 얘기를 나누고 때로는 전시를 구경하며 지친 마음을 달래세요. 다양한 전시와 의자가 준비되어있습니다. </p>
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/static/images/space/2f_lobby.jpg">
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/static/images/space/2f_lobby.svg">
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="card-container">
        <div class="card-row">
            <div class="col-card">
                <div class="card card-soft-red">
                    <h2> 3층 로비 </h2>
                    <hr>
                    <p> 세미나실에서 미처 끝내지 못한 얘기를 로비에서 자유롭게 얘기하고 가세요. </p>
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/static/images/space/3f_lobby.jpg">
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/static/images/space/3f_lobby.svg">
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="card-container">
        <div class="card-row">
            <div class="col-card">
                <div class="card card-soft-red">
                    <h2> 모임터 </h2>
                    <hr>
                    <p> 밝게 웃으며 서로 얼굴을 마주 보고 토론과 담소를 나누세요. 가끔은 혼자 앉아 생각도 하며 잠시 쉬어가세요. </p>
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/static/images/space/gathering_place.jpg">
                </div>
            </div>
            <div class="col-card">
                <div class="card">
                    <img class="img-responsive" src="/static/images/space/gathering_place.svg">
                </div>
            </div>
        </div>
    </div>
    <div class="spacing"></div>
</main>
