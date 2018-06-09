<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/mirae-hall"> 미래홀 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/mirae-hall/state"> 예약 현황 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container" ng-app="form" ng-controller="FormController">
    <form novalidate name="form" class="form-horizontal" action="/reservation/reserve/mirae-hall" method="post">
        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
        <input type="hidden" name="space" value="mirae_hall">

        <section class="form-section">
            <h4> 단체와 행사 </h4>
            <hr>

            <div class="form-group has-feedback" ng-class="{'has-error':form.organization_name.$touched && form.organization_name.$invalid}">
                <label for="organization_name" class="col-sm-2 control-label"> 단체 이름 </label>
                <div class="col-sm-4">
                    <input ng-model="organization_name" type="text" name="organization_name" class="form-control" required>
                    <span ng-show="form.organization_name.$touched && form.organization_name.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.organization_name.$touched && form.organization_name.$error.required"> 단체 이름을 입력해주세요.</span>
            </div>
            <div class="form-group has-feedback" ng-class="{'has-error':form.event_name.$touched && form.event_name.$invalid}">
                <label for="event_name" class="col-sm-2 control-label"> 행사 이름 </label>
                <div class="col-sm-4">
                    <input ng-model="event_name" type="text" name="event_name" class="form-control" required>
                    <span ng-show="form.event_name.$touched && form.event_name.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.event_name.$touched && form.event_name.$error.required"> 행사 이름을 입력해주세요.</span>
            </div>
            <div class="form-group has-feedback" ng-class="{'has-error':form['entry[in]'].$touched && form['entry[in]'].$invalid || form['entry[out]'].$touched && form['entry[out]'].$invalid}">
                <label class="col-sm-2 control-label"> 예상 참여 인원 </label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-xs-12" style="margin-bottom:8px;">
                            <div class="row">
                                <label for="entry[in]" class="col-xs-3 col-sm-2 control-label second-label"> 학내 구성원 </label>
                                <div class="col-xs-9 col-sm-3">
                                    <input ng-model="entry_in" id="entry[in]" name="entry[in]" type="number" class="form-control" min="1" required>
                                    <span ng-show="form['entry[in]'].$touched && form['entry[in]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <span ng-show="form['entry[in]'].$touched && form['entry[in]'].$error.required" class="help-block col-xs-offset-3 col-xs-9 col-sm-offset-0 col-sm-7"> 참여할 학내 구성원 수를 입력해주세요. </span>
                                <span ng-show="form['entry[in]'].$error.number" class="help-block col-xs-offset-3 col-xs-9 col-sm-offset-0 col-sm-7"> 참여할 학내 구성원 수는 숫자여야합니다. </span>
                                <span ng-show="form['entry[in]'].$error.min" class="help-block col-xs-offset-3 col-xs-9 col-sm-offset-0 col-sm-7"> 적어도 한 명의 학내 구성원이 참가해야합니다. </span>
                            </div>
                        </div>

                        <div class="col-xs-12" style="margin-bottom:15px;">
                            <div class="row">
                                <label for="entry[out]" class="col-xs-3 col-sm-2 control-label second-label"> 외부인 </label>
                                <div class="col-xs-9 col-sm-3">
                                    <input ng-model="entry_out" id="entry[out]" name="entry[out]" type="number" class="form-control" min="0" required>
                                    <span ng-show="form['entry[out]'].$touched && form['entry[out]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <span ng-show="form['entry[out]'].$touched && form['entry[out]'].$error.required" class="help-block col-xs-offset-3 col-xs-9 col-sm-offset-0 col-sm-7"> 참여할 외부인 수를 입력해주세요. </span>
                                <span ng-show="form['entry[out]'].$error.number" class="help-block col-xs-offset-3 col-xs-9 col-sm-offset-0 col-sm-7"> 참여할 외부인 수는 숫자여야합니다. </span>
                                <span ng-show="form['entry[out]'].$error.min" class="help-block col-xs-offset-3 col-xs-9 col-sm-offset-0 col-sm-7"> 참여할 외부인 수는 양수여야합니다. </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group has-feedback" ng-class="{'has-error':form.purpose.$touched && form.purpose.$invalid}">
                <label for="purpose" class="col-sm-2 control-label"> 행사 목적 </label>
                <div class="col-sm-10">
                    <input ng-model="purpose" id="purpose" name="purpose" type="text" class="form-control" required>
                    <span ng-show="form.purpose.$touched && form.purpose.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.purpose.$touched && form.purpose.$error.required">행사 목적을 입력해주세요.</span>

            </div>
            <div class="form-group has-feedback" ng-class="{'has-error':form.content.$touched && form.content.$invalid}">
                <label for="content" class="col-sm-2 control-label"> 행사 내용 </label>
                <div class="col-sm-10">
                    <textarea ng-model="content" id="content" name="content" placeholder="행사의 자세한 내용을 알려주세요. 이 내용은 학생문화공간위원회에 전달됩니다." type="text" class="form-control" rows="5" style="resize:vertical" required></textarea>
                    <span ng-show="form.content.$touched && form.content.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.content.$touched && form.content.$error.required">행사 내용을 입력해주세요.</span>
            </div>
        </section>

        <section class="form-section">
            <h4> 시간 </h4>
            <hr>
            <div class="row">
                <p class="col-sm-offset-2 col-sm-10">
                    <span class="glyphicon glyphicon-exclamation-sign"></span> 리허설 시간은 선택 사항입니다. <br>
                    <span class="glyphicon glyphicon-exclamation-sign"></span> 행사 시간에 <span class="soft-red">뒷정리 시간</span>을 포함시켜주세요. 뒷정리가 미흡할 경우 공연집중기간 후순위 배정의 패널티가 있습니다. <br>
                    <span class="glyphicon glyphicon-exclamation-sign"></span> 장비를 사용할 경우 <span class="soft-red">{{dateAfter(10) | date:'M월 dd일'}}</span>에서 <span class="soft-red">{{dateAfter(45) | date:'M월 d'}}일</span>까지의 행사만 예약 가능합니다. <br>
                    <span class="glyphicon glyphicon-exclamation-sign"></span> 장비를 사용하지 않을 경우 <span class="soft-red">{{dateAfter(2) | date:'M월 d'}}일</span>에서 <span class="soft-red">{{dateAfter(45) | date:'M월 d'}}일</span>까지의 행사만 예약 가능합니다.
                </p>
            </div>

            <div class="form-group has-feedback" ng-class="{'has-error':form['time[rehearsal_before_from]'].$touched && form['time[rehearsal_before_from]'].$invalid || form['time[rehearsal_before_to]'].$touched && form['time[rehearsal_before_to]'].$invalid}">
                <label class="col-sm-2 control-label"> 전날 리허설 시간 </label>
                <div class="col-sm-4">
                    <input ng-model="time_rehearsal_before_from" type="datetime-local" name="time[rehearsal_before_from]" min="{{dateAfter(1) | date:'yyyy-MM-ddTHH:mm'}}" max = "{{dateAfter(45) | date:'yyyy-MM-ddTHH:mm'}}" placeholder="{{dateAfter(1) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_from">
                    <span ng-show="form['time[rehearsal_before_from]'].$touched && form['time[rehearsal_before_from]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>

                <div class="col-sm-4">
                    <input ng-model="time_rehearsal_before_to" type="datetime-local" name="time[rehearsal_before_to]" min="{{dateAfter(1) | date:'yyyy-MM-ddTHH:mm'}}" max = "{{dateAfter(45) | date:'yyyy-MM-ddTHH:mm'}}" placeholder="{{dateAfter(44) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_to">
                    <span ng-show="form['time[rehearsal_before_to]'].$touched && form['time[rehearsal_before_to]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form['time[rehearsal_before_from]'].$error.datetimelocal || form['time[rehearsal_before_to]'].$error.datetimelocal"> {{dateAfter(1) | date:'yyyy-MM-ddTHH:mm'}}의 형식으로 입력해주세요. </span>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form['time[rehearsal_before_from]'].$error.min || form['time[rehearsal_before_from]'].$error.max || form['time[rehearsal_before_to]'].$error.min || form['time[rehearsal_before_to]'].$error.max"> 현재 울림홀 행사의 전날 리허설은 {{dateAfter(1) | date:'MM월 dd'}}일에서 {{dateAfter(44) | date:'MM월 dd'}}일까지 가능합니다. </span>
            </div>

            <div class="form-group has-feedback" ng-class="{'has-error':form['time[rehearsal_from]'].$touched && form['time[rehearsal_from]'].$invalid || form['time[rehearsal_to]'].$touched && form['time[rehearsal_to]'].$invalid}">
                <label class="col-sm-2 control-label"> 리허설 시간 </label>
                <div class="col-sm-4">
                    <input ng-model="time_rehearsal_from" type="datetime-local" name="time[rehearsal_from]" min="{{dateAfter(2) | date:'yyyy-MM-ddTHH:mm'}}" placeholder="{{dateAfter(2) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_from">
                    <span ng-show="form['time[rehearsal_from]'].$touched && form['time[rehearsal_from]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="col-sm-4">
                    <input ng-model="time_rehearsal_to" type="datetime-local" name="time[rehearsal_to]" min="{{dateAfter(2) | date:'yyyy-MM-ddTHH:mm'}}" placeholder="{{dateAfter(45) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_to">
                    <span ng-show="form['time[rehearsal_to]'].$touched && form['time[rehearsal_to]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form['time[rehearsal_from]'].$error.datetimelocal || form['time[rehearsal_to]'].$error.datetimelocal"> {{dateAfter(2) | date:'yyyy-MM-ddTHH:mm'}}의 형식으로 입력해주세요. </span>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form['time[rehearsal_from]'].$error.min || form['time[rehearsal_from]'].$error.max || form['time[rehearsal_to]'].$error.min || form['time[rehearsal_to]'].$error.max"> 현재 울림홀 행사의 리허설은 {{dateAfter(2) | date:'MM월 dd'}}일에서 {{dateAfter(45) | date:'MM월 dd'}}일까지 가능합니다. </span>
            </div>

            <div class="form-group has-feedback" ng-class="{'has-error':form['time[from]'].$touched && form['time[from]'].$invalid || form['time[to]'].$touched && form['time[to]'].$invalid}">
                <label class="col-sm-2 control-label"> 행사 시간 </label>
                <div class="col-sm-4">
                    <input ng-model="time_from" type="datetime-local" name="time[from]" min="{{dateAfter(2) | date:'yyyy-MM-ddTHH:mm'}}" placeholder="{{dateAfter(2) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_from" required>
                    <span ng-show="form['time[from]'].$touched && form['time[from]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="col-sm-4">
                    <input ng-model="time_to" type="datetime-local" name="time[to]" min="{{dateAfter(2) | date:'yyyy-MM-ddTHH:mm'}}" placeholder="{{dateAfter(45) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_to" required>
                    <span ng-show="form['time[to]'].$touched && form['time[to]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="(form['time[from]'].$touched && form['time[from]'].$error.required) || (form['time[to]'].$touched && form['time[to]'].$error.required)"> 행사 시간을 입력해주세요.</span>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form['time[from]'].$error.datetimelocal || form['time[to]'].$error.datetimelocal"> {{dateAfter(2) | date:'yyyy-MM-ddTHH:mm'}}의 형식으로 입력해주세요. </span>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form['time[from]'].$error.min || form['time[from]'].$error.max || form['time[to]'].$error.min || form['time[to]'].$error.max"> 현재 울림홀 행사는 {{dateAfter(2) | date:'MM월 dd'}}일에서 {{dateAfter(45) | date:'MM월 dd'}}일까지 예약 가능합니다. </span>
            </div>
        </section>

        <section class="form-section">
            <h4> 장비와 대여 </h4>
            <hr>
            <div class="form-group">
                <label class="col-sm-2 control-label"> 장비 </label>
                <div class="col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input ng-model="usage_equipment" type="checkbox" name="usage_equipment" value="yes"> 장비를 사용합니다.
                        </label>
                    </div>
                </div>
                <div class="col-sm-offset-2 col-sm-10 margin-heading">
                    <textarea ng-disabled="!usage_equipment" name="type_equipment" placeholder="사용할 장비 목록을 적어주세요." type="text" class="form-control" rows="5" style="resize:vertical"></textarea>
                </div>
            </div>
            <div class="row">
                <p class="col-sm-offset-2 col-sm-10">
                    <span class="glyphicon glyphicon-exclamation-sign"></span> 장비 사용 시 근로장학생이 <span class="soft-red">반드시</span> 필요합니다. <br>
                </p>
            </div>
            <div class="form-group has-feedback" ng-class="{'has-error':form.labor_time.$touched && form.labor_time.$invalid}">
                <label for="labor_time" class="col-sm-2 control-label"> 근로장학생 </label>
                <div class="col-sm-10">
                    <input ng-model="labor_time" type="text" name="labor_time" class="form-control" ng-disabled="!usage_equipment" placeholder="근로장학생이 필요한 시간을 입력해주세요.">
                    <span ng-show="form.labor_time.$touched && form.labor_time.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.labor_time.$touched && form.labor_time.$error.required"> 행사 이름을 입력해주세요.</span>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"> 문 잠금 </label>
                <div class="col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="lock" value="lock"> 리허설 이후 미래홀을 잠궈 주세요.
                        </label>
                    </div>
                </div>
            </div>
        </section>

        <div class="form-group">
            <div class="col-sm-12">
                <div class="pull-right">
                    <button ng-disabled="form.$untouched || form.$invalid" type="submit" class="btn btn-primary"> 예약하기 </button>
                </div>
            </div>
        </div>

    </form>
</main>
