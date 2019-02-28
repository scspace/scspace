<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/dance-studio"> 무예실 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/dance-studio"> 소개로 돌아가기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container" ng-app="form" ng-controller="FormController">
    <form name="form" class="form-horizontal" action="/team/ds_register_process" method="post">
        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
        <input type="hidden" name="space" value="dance-studio">
        <section>
            <h4> 팀 정보 </h4>
            <hr>
            <div class="form-group">
                <label class="col-sm-2 control-label"> 팀 이름 </label>
                <div class="col-sm-4">
                    <input name="name" type="text" class="form-control" placeholder="이름" required>
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
                                    <p class="form-control-static"> <?=$_SESSION['name']?> </p>
                                    <span ng-show="form.entry_in.$touched && form.entry_in.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12" style="margin-bottom:8px;">
                            <div class="row">
                                <label class="col-xs-3 col-sm-2 control-label second-label"> 학번 </label>
                                <div class="col-xs-9 col-sm-10">
                                    <p class="form-control-static"> <?=$_SESSION['student_id']?> </p>
                                    <span ng-show="form.entry_in.$touched && form.entry_in.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12" style="margin-bottom:8px;">
                            <div class="row">
                                <label class="col-xs-3 col-sm-2 control-label second-label"> 전화번호 </label>
                                <div class="col-xs-9 col-sm-10">
                                    <p class="form-control-static"> <?=$_SESSION['phone']?> </p>
                                    <span ng-show="form.entry_in.$touched && form.entry_in.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12" style="margin-bottom:8px;">
                            <div class="row">
                                <label class="col-xs-3 col-sm-2 control-label second-label"> 이메일 </label>
                                <div class="col-xs-9 col-sm-10">
                                    <p class="form-control-static"> <?=$_SESSION['email']?> </p>
                                    <span ng-show="form.entry_in.$touched && form.entry_in.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="help-text small"> <span class="glyphicon glyphicon-question-sign"></span> 팀 대표자의 개인정보는 KAIST 통합 아이덴티티 서비스를 통해 수집되고 있습니다. 정보가 잘못된 경우 KAIST 통합 아이덴티티 서비스의 정보를 갱신한 후 다시 로그인해 보십시오. 여전히 문제가 발생한다면 학생문화공간위원회에 문의해주시기 바랍니다. </span>
                </div>
            </div>
        </section>

        <section>
            <h4> 팀원 정보 </h4>
            <hr>
            <div class="members">

                <div class="row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <p> 본인을 포함하여 최소 세 명의 팀원이 필요합니다. </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-xs-12 control-label"> 팀 멤버 </label>
                    <div class="col-sm-2 col-xs-9 field-first">
                        <p class="input-first form-control-static"> <?=$_SESSION['name']?></p>
                        <input type="hidden" name="member[name][]" value="<?=$_SESSION['name']?>">
                    </div>
                    <div class="col-sm-3 col-xs-9 field-last">
                        <p class="input-last form-control-static"><?=$_SESSION['student_id']?></p>
                        <input type="hidden" name="member[student_id][]" value="<?=$_SESSION['student_id']?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 hidden-xs control-label"></label>
                    <div class="col-sm-2 col-xs-9 field-first">
                        <input name="member[name][]" type="text" class="input-first form-control" placeholder="이름" required>
                    </div>
                    <div class="col-sm-3 col-xs-9 field-last">
                        <input name="member[student_id][]" type="text" class="input-last form-control" placeholder="학번" required>
                    </div>
                    <div class="col-sm-5 col-xs-3">
                        <button class="add-member btn btn-default" type="button" name="button"> <span class="glyphicon glyphicon-plus"></span> </button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 hidden-xs control-label"></label>
                    <div class="col-sm-2 col-xs-9 field-first">
                        <input name="member[name][]" type="text" class="input-first form-control" placeholder="이름" required>
                    </div>
                    <div class="col-sm-3 col-xs-9 field-last">
                        <input name="member[student_id][]" type="text" class="input-last form-control" placeholder="학번" required>
                    </div>
                </div>
                <div class="form-group hidden member-template">
                    <label class="col-sm-2 control-label"> </label>
                    <div class="col-sm-2 col-xs-9 field-first">
                        <input class="input-first form-control" type="text" placeholder="이름">
                    </div>
                    <div class="col-sm-3 col-xs-9 field-last">
                        <input class="input-last form-control" name="member[student_id][]" type="text" placeholder="학번">
                    </div>
                    <div class="col-sm-5 col-xs-3">
                        <button class="remove-member btn btn-default" type="button" name="button"> <span class="glyphicon glyphicon-minus"></span> </button>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <h4> 보증금 안내 </h4>
            <hr>
            <div class="form-group">


                <div class="col-sm-offset-2 col-sm-10">
                    <p> 무예실 팀 등록 신청 후 아래 보증금 계좌로 예치금 <span class="soft-red">200,000원</span>을 입금해야 팀 등록이 완료됩니다 </p>
                </div>

                <label class="col-sm-2 control-label"> 보증금 계좌 </label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-xs-12" style="margin-bottom:8px;">

                            <div class="row">
                                <label class="col-xs-3 col-sm-2 control-label second-label"> 은행 </label>
				<div class="col-xs-9 col-sm-10">
                                    <p class="form-control-static"> 우리 </p>
                                </div>
                            </div>

                        </div>

                        <div class="col-xs-12" style="margin-bottom:8px;">

                            <div class="row">
                                <label class="col-xs-3 col-sm-2 control-label second-label"> 계좌 </label>
                                <div class="col-xs-9 col-sm-10">
                                    <p class="form-control-static"> 1006-101-508206 </p>
                                </div>
                            </div>

                        </div>

                        <div class="col-xs-12" style="margin-bottom:8px;">

                            <div class="row">
                                <label class="col-xs-3 col-sm-2 control-label second-label"> 예금주 </label>
                                <div class="col-xs-9 col-sm-10">
                                    <p class="form-control-static"> 김태현 </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-2 col-sm-10">
                    <p>
                        학기 말 보증금을 돌려받을 계좌를 입력해주세요.
                        <!-- 예치금은 상근일 기준으로 키 반납이 하루 늦어질 때 마다 2,000원씩 차감되며,
                        예치금이 0원이 될 경우 예치금을 다시 입금해 주셔야 합주실을 계속 이용하실 수 있습니다. -->
                        보증금에서 연체 수수료를 제한 금액이 반환됩니다
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"> 환급 계좌 </label>
                <div class="col-sm-8 col-md-6">
                    <input type="text" name="refund" class="form-control" placeholder="은행, 계좌번호, 예금주를 모두 입력해주세요" required>
                </div>
            </div>
        </section>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default"> 등록하기 </button>
            </div>
        </div>
    </form>
</main>

