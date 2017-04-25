<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/group-practice-room"> 합주실 </a></li>
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
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-success">
                <div class="panel-heading"> 다음과 같이 합주실 팀이 등록 되었습니다. </div>
                <div class="panel-body">
                    <section class="form-horizontal">
                        <h4> 팀 정보 </h4> <hr>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> 팀 이름 </label>
                            <div class="col-sm-10">
                                <p class="form-control-static"><?=$team['team_name']?></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label"> 팀 대표자 </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-xs-12" style="margin-bottom:8px;">
                                        <div class="row">
                                            <label class="col-xs-3 col-sm-2 control-label second-label"> 이름 </label>
                                            <div class="col-xs-9 col-sm-10">
                                                <p class="form-control-static"> <?=$team['name']?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="margin-bottom:8px;">
                                        <div class="row">
                                            <label class="col-xs-3 col-sm-2 control-label second-label"> 학번 </label>
                                            <div class="col-xs-9 col-sm-10">
                                                <p class="form-control-static"> <?=$team['student_id']?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="margin-bottom:8px;">
                                        <div class="row">
                                            <label class="col-xs-3 col-sm-2 control-label second-label"> 전화번호 </label>
                                            <div class="col-xs-9 col-sm-10">
                                                <p class="form-control-static"> <?=$team['phone']?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="margin-bottom:8px;">
                                        <div class="row">
                                            <label class="col-xs-3 col-sm-2 control-label second-label"> 이메일 </label>
                                            <div class="col-xs-9 col-sm-10">
                                                <p class="form-control-static"> <?=$team['email']?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section>
                        <h4> 팀원 정보 </h4> <hr>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> 이름 </th>
                                    <th> 학번 </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($members as $index=>$member):?>
                                <tr>
                                    <td> <?=$index?> </td>
                                    <td> <?=$member['name']?> </td>
                                    <td> <?=$member['student_id']?> </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </section>

                    <section>
                        <h4> 예치금 환급 계좌 </h4> <hr>
                        <?=$team['refund']?>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>
