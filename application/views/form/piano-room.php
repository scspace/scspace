<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/piano-room"> 피아노실 </a></li>
            <li class="soft-red"><a href= "/intro/rule">사용 관리 수칙</a>이 개정되었습니다. 꼭 규칙 확인 하신 후 예약해 주세요 </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/piano-room/state"> 예약 현황 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container" ng-app="form" ng-controller="FormController">
    <form novalidate name="form" class="form-horizontal" action="/reservation/reserve/<?=$space?>" method="post">
        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
        <div ng-init="student_id = <?=$_SESSION['student_id']?>"></div>

        <div class="form-group">
            <label for="space" class="col-sm-2 control-label"> 장소 </label>
            <div class="col-sm-10">
                <label class="radio-inline">
                    <input type="radio" ng-model="space" name="space" value="piano_room_1" required> 피아노실 1
                </label>
                <label class="radio-inline">
                    <input type="radio" ng-model="space" name="space" value="piano_room_2"> 피아노실 2
                </label>
            </div>
        </div>


        <div class="form-group has-feedback" ng-class="{'has-error':form.time_from.$touched && form.time_from.$invalid || form.time_to.$touched && form.time_to.$invalid || (isValidTime == 'invalid'),'has-warning':responseError == 'true','has-success':validity}">
            <label for="time" class="col-sm-2 control-label"> 시간 </label>
            <div class="col-sm-4">
                <input ng-model="time_from" type="datetime-local" name="time_from" min="{{dateAfter(1) | date:'yyyy-MM-ddTHH:mm'}}" max="{{dateAfter(14) | date:'yyyy-MM-ddTHH:mm'}}" placeholder="{{dateAfter(1) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_from" required>
                <span ng-show="form.time_from.$touched && form.time_from.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
            </div>

            <div class="col-sm-4">
                <input ng-model="time_to" type="datetime-local" name="time_to" min="{{dateAfter(1) | date:'yyyy-MM-ddTHH:mm'}}" max="{{dateAfter(14) | date:'yyyy-MM-ddTHH:mm'}}" placeholder="{{dateAfter(14) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_to" required>
                <span ng-show="form.time_to.$touched && form.time_to.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
            </div>

            <div class="spacing visible-xs">
            </div>
            <div class="col-sm-2">
                <button class="btn btn-primary" type="button"
                    ng-click="timeValidate(form.time_from,form.time_to,space,'<?=$_SESSION['student_id']?>')"
                    ng-disabled="!(space != undefined && form.time_from.$valid && form.time_to.$valid)">
                    시간 확인
                </button>
            </div>
            <span class="help-block col-sm-offset-2 col-sm-10" ng-show="(form.time_from.$touched && form.time_from.$error.required) || (form.time_to.$touched && form.time_to.$error.required)"> 시간을 입력해주세요.</span>
            <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.time_from.$error.datetimelocal || form.time_to.$error.datetimelocal"> {{dateAfter(1) | date:'yyyy-MM-ddTHH:mm'}}의 형식으로 입력해주세요. </span>
            <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.time_from.$error.min || form.time_from.$error.max || form.time_to.$error.min || form.time_to.$error.max"> 현재 피아노실은 {{dateAfter(1) | date:'MM.dd'}}일에서 {{dateAfter(14) | date:'MM.dd'}}일까지 빌릴 수 있습니다. </span>
            <span class="help-block col-sm-offset-2 col-sm-10" ng-show="validity"> 유효한 시간입니다. </span>
            <span class="help-block col-sm-offset-2 col-sm-10" ng-show="isValidTime == 'invalid'"> {{message}} </span>
            <span class="help-block col-sm-offset-2 col-sm-10" ng-show="responseError == 'true'"> 서버가 응답하지 않아 같은 시간에 예약이 있는지 확인할 수 없습니다. </span>
        </div>


        <div class="form-group">
            <div class="col-sm-12">
                <div class="pull-right">
                    <button ng-disabled="!validity" type="submit" class="btn btn-primary"> 예약하기 </button>
                </div>
            </div>
        </div>

    </form>
</main>
