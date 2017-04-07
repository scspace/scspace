<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/manage"> 관리 › 책다방 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventAdder" style="margin: 8px 15px;">
                    새 행사
                </button>
            </li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main ng-app="calendar" ng-controller="calendarCtrl" class="container">
    <div ui-calendar="uiConfig.calendar" ng-model='eventSource'></div>

    <div class="modal fade" id="eventAdder" tabindex="-1" role="dialog" aria-labelledby="이벤트 등록자">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> 새 행사 </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="form" novalidate>
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
                        <input type="hidden" name="space" value="bookdabang" />

                        <div class="form-group has-feedback" ng-class="{'has-error':form.title.$touched && form.title.$error}">
                            <label for="title" class="col-sm-2 control-label"> 행사 이름 </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" required>
                            </div>
                        </div>
                        <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.title.$touched && form.title.$error"> 행사 이름을 입력해주세요. </span>

                        <div class="form-group has-feedback" ng-class="{'has-error':form.time_to.$touched && form.time_to.$error || form.time_from.$touched && form.time_from.$error}">
                            <label class="col-sm-2 control-label"> 행사 시간 </label>
                            <div class="col-sm-5 col-xs-12 field-first">
                                <input name="time_from" type="datetime-local" class="input-first form-control" placeholder="시작 시간" required>
                            </div>
                            <div class="col-sm-5 col-xs-12 field-last">
                                <input name="time_to" type="datetime-local" class="input-last form-control" placeholder="끝 시간" required>
                            </div>
                        </div>
                        <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.time_from.$touched && form.time_from.$error.required || form.time_to.$touched && form.time_to.$error.required"> 행사 시간을 입력해주세요.</span>
                        <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.time_from.$error.datetimelocal || form.time_to.$error.datetimelocal"> 2015-12-25T21:00 의 형식으로 입력해주세요. </span>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> 닫기 </button>
                    <button type="button" class="btn btn-primary" ng-click="addEvent()"> 등록 </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="eventUpdater" tabindex="-1" role="dialog" aria-labelledby="이벤트 등록자">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="eventTitle"> </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="form" novalidate>
                        <input type="hidden" name="id"/>

                        <div class="form-group has-feedback" ng-class="{'has-error':form.title.$touched && form.title.$error}">
                            <label for="title" class="col-sm-2 control-label"> 행사 이름 </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" required>
                            </div>
                        </div>
                        <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.title.$touched && form.title.$error"> 행사 이름을 입력해주세요. </span>

                        <div class="form-group has-feedback" ng-class="{'has-error':form.time_to.$touched && form.time_to.$error || form.time_from.$touched && form.time_from.$error}">
                            <label class="col-sm-2 control-label"> 행사 시간 </label>
                            <div class="col-sm-5 col-xs-12 field-first">
                                <input name="time_from" type="datetime-local" class="input-first form-control" placeholder="시작 시간" required>
                            </div>
                            <div class="col-sm-5 col-xs-12 field-last">
                                <input name="time_to" type="datetime-local" class="input-last form-control" placeholder="끝 시간" required>
                            </div>
                        </div>
                        <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.time_from.$touched && form.time_from.$error.required || form.time_to.$touched && form.time_to.$error.required"> 행사 시간을 입력해주세요.</span>
                        <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.time_from.$error.datetimelocal || form.time_to.$error.datetimelocal"> 2015-12-25T21:00 의 형식으로 입력해주세요. </span>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> 닫기 </button>
                    <button type="button" class="btn btn-primary" ng-click="removeEvent()"> 삭제 </button>
                    <button type="button" class="btn btn-primary" ng-click="updateEvent()"> 업데이트 </button>
                </div>
            </div>
        </div>
    </div>
</main>
