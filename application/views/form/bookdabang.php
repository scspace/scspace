<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/bookdabang"> 책다방 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/bookdabang/state"> 예약 현황 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container" ng-app="form" ng-controller="FormController">
    <form novalidate name="form" class="form-horizontal" action="/reservation/reserve/bookdabang" method="post">
        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
        <input type="hidden" name="space" value="bookdabang">

        <h4> 단체/행사 정보 </h4>
        <hr>

        <div class="form-group has-feedback" ng-class="{'has-error':form.organization_name.$touched && form.organization_name.$invalid}">
            <label for="organization_name" class="col-sm-2 control-label">단체 이름</label>
            <div class="col-sm-4">
                <input ng-model="organization_name" name="organization_name" type="text" class="form-control" required>
                <span ng-show="form.organization_name.$touched && form.organization_name.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
            </div>
            <span ng-show="form.organization_name.$touched && form.organization_name.$invalid" class="help-block col-sm-offset-2 col-sm-10">단체 이름을 입력해주세요.</span>
        </div>
        <div class="form-group has-feedback" ng-class="{'has-error':form.event_name.$touched && form.event_name.$invalid, 'has-warning':name.trim().length > 20}">
            <label for="event_name" class="col-sm-2 control-label"> 행사 이름 </label>
            <div class="col-sm-4">
                <input ng-model="event_name" id="event_name" name="event_name" type="text" class="form-control" required>
                <span ng-show="form.event_name.$touched && form.event_name.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
            </div>
            <span ng-show="form.event_name.$touched && form.event_name.$invalid" class="help-block col-sm-offset-2 col-sm-10">행사 이름을 입력해주세요.</span>
        </div>
        <div class="form-group has-feedback" ng-class="{'has-error':form.entry.$touched && form.entry.$invalid}">
            <label for="entry" class="col-sm-2 control-label"> 예상 참여 인원 </label>
            <div class="col-sm-3">
                <input ng-model="entry" id="entry" name="entry" type="number" class="form-control" min="1" required>
                <span ng-show="form.entry.$touched && form.entry.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
            </div>
            <span ng-show="form.entry.$touched && form.entry.$error.required" class="help-block col-sm-offset-2 col-sm-10"> 예상 참여 인원을 입력해주세요. </span>
            <span ng-show="form.entry.$error.number" class="help-block col-sm-offset-2 col-sm-10"> 예상 참여 인원은 숫자여야합니다. </span>
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

        <div class="form-group has-feedback" ng-class="{'has-error':form.promote.$touched && form.promote.$invalid}">
            <label for="promote" class="col-sm-2 control-label"> 홍보 방법 </label>
            <div class="col-sm-10">
                <input ng-model="promote" id="promote" name="promote" placeholder="예시 : 페이스북 홍보, 포스터 부착" type="text" class="form-control" required>
                <span ng-show="form.promote.$touched && form.promote.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
            </div>
            <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.promote.$touched && form.promote.$error.required">홍보 방법을 입력해주세요.</span>
        </div>


        <h4> 시간 정보 </h4>
        <hr>

        <div class="form-group has-feedback" ng-class="{'has-error':form['time[from]'].$touched && form['time[from]'].$invalid || form['time[to]'].$touched && form['time[to]'].$invalid}">
            <label class="col-sm-2 control-label"> 행사 시간 </label>
            <div class="col-sm-4">
                <input ng-model="time_from" type="datetime-local" name="time[from]" placeholder="{{dateAfter(7) | date:'yyyy-MM-ddTHH:mm'}}" max="{{dateAfter(45) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_from" required>
                <span ng-show="form['time[from]'].$touched && form['time[from]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
            </div>

            <div class="col-sm-4">
                <input ng-model="time_to" type="datetime-local" name="time[to]" placeholder="{{dateAfter(44) | date:'yyyy-MM-ddTHH:mm'}}" max="{{dateAfter(45) | date:'yyyy-MM-ddTHH:mm'}}" min="{{dateAfter(7) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_to" required>
                <span ng-show="form['time[to]'].$touched && form['time[to]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
            </div>
            <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form['time[from]'].$error.min || form['time[from]'].$error.max || form['time[to]'].$error.min || form['time[to]'].$error.max"> 현재 책다방은 {{dateAfter(7) | date:'MM.dd'}}일에서 {{dateAfter(44) | date:'MM.dd'}}일까지 빌릴 수 있습니다. </span>
            <span class="help-block col-sm-offset-2 col-sm-10" ng-show="(form['time[from]'].$touched && form['time[from]'].$error.required) || (form['time[to]'].$touched && form['time[to]'].$error.required)"> 행사 시간을 입력해주세요.</span>
            <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form['time[from]'].$error.datetimelocal || form['time[to]'].$error.datetimelocal"> {{dateAfter(7) | date:'yyyy-MM-ddTHH:mm'}}의 형식으로 입력해주세요. </span>
        </div>

        <h4> 장비 사용 </h4>
        <hr>

        <div class="form-group">
             <div class="col-sm-offset-2 col-sm-10">
                 <div class="checkbox">
                     <label>
                         <input ng-model="usage_equipment" type="checkbox" name="usage_equipment" value="yes"> 장비를 사용합니다.
                     </label>
                 </div>
             </div>
             <div class="col-sm-offset-2 col-sm-10">
                 &nbsp;
                 <label class="checkbox-inline">
                     <input ng-disabled="!usage_equipment" type="checkbox" name="type_equipment[]" value="프로젝터"> 프로젝터
                 </label>
                 <label class="checkbox-inline">
                     <input ng-disabled="!usage_equipment" type="checkbox" name="type_equipment[]" value="앰프"> 앰프
                 </label>
                 <label class="checkbox-inline">
                     <input ng-disabled="!usage_equipment" type="checkbox" name="type_equipment[]" value="믹서"> 믹서
                 </label>
                 <label class="checkbox-inline">
                     <input ng-disabled="!usage_equipment" type="checkbox" name="type_equipment[]" value="마이크"> 마이크
                 </label>
             </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <div class="pull-right">
                    <button ng-disabled="form.$untouched || form.$invalid" type="submit" class="btn btn-primary"> 예약하기 </button>
                </div>
            </div>
        </div>
    </form>
</main>
