<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/group-practice-room"> 합주실 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/group-practice-room/state"> 예약 현황 </a></li>
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
        <input type="hidden" name="space" value="group_practice_room">
        <section>

            <p class="soft-red"> <a href= "/intro/rule">사용 관리 수칙</a>이 개정되었습니다. 꼭 규칙 확인 하신 후 예약해 주세요. </p>

            <h4> 팀 </h4>
            <hr>
            <div ng-init='teams = <?=$teams?>'></div>
            <div class="form-group">
                <label for="team_name" class="col-sm-2 control-label"> 팀 선택 </label>
                <div class="col-sm-4">
                    <select ng-model="selected_team_name" name="team_name" class="form-control" required>
                        <option ng-repeat="(team_name, members) in teams">{{team_name}}</option>
                    </select>
                    <span class="help-block" style="margin-bottom:4px;"> <span class="glyphicon glyphicon-exclamation-sign"></span> 만약 소속된 팀이 없다면 <a href='/group-practice-room/team-register'>팀을 등록</a>하세요.</span>
                </div>
            </div>

            <div class="form-group ">
                <label class="col-sm-2 control-label"> 멤버 선택 </label>
                <div ng-repeat="(team_name, members) in teams" class="col-sm-10">
                    <label ng-show="selected_team_name == team_name" ng-repeat="member in members" class="checkbox-inline">
                        <input type="checkbox" name="member[]" value="{{member.student_id + ' ' + member.name}}" ng-checked = 'selected_team_name == team_name'> {{member.name}}
                    </label>
                </div>
            </div>

            <div class="form-group has-feedback" ng-class="{'has-error':form.content.$touched && form.content.$invalid}">
                <label for="content" class="col-sm-2 control-label"> 연습 내용 </label>
                <div class="col-sm-10">
                    <textarea ng-model="content" id="content" name="content" placeholder="행사의 자세한 내용을 알려주세요. 이 내용은 학생문화공간위원회에 전달됩니다." type="text" class="form-control" rows="5" style="resize:vertical" required></textarea>
                    <span ng-show="form.content.$touched && form.content.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.content.$touched && form.content.$error.required"> 연습 내용을 입력해주세요.</span>
            </div>
        </section>

        <section>
            <h4> 시간 정보 </h4>
            <hr>
            <p class="col-sm-offset-2">
                <span class="glyphicon glyphicon-exclamation-sign"></span> 합주실은 하루에 최대 3시간까지 사용할 수 있습니다.
            </p>
            <div class="form-group has-feedback" ng-class="{'has-error':form.time_from.$touched && form.time_from.$invalid || form.time_to.$touched && form.time_to.$invalid || (isValidTime == 'invalid'),'has-warning':(isValidTime == 'warning')||responseError == 'true' }">
                <label for="time" class="col-sm-2 control-label"> 행사 시간 </label>
                <div class="col-sm-4">
                    <input ng-model="time_from" type="datetime-local" name="time_from" min="{{dateAfter(2) | date:'yyyy-MM-ddTHH:mm'}}" max="{{dateAfter(14, true) | date:'yyyy-MM-ddTHH:mm'}}" placeholder="{{dateAfter(2) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_from" required>
                    <span ng-show="form.time_from.$touched && form.time_from.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>

                <div class="col-sm-4">
                    <input ng-model="time_to" type="datetime-local" name="time_to" min="{{dateAfter(2) | date:'yyyy-MM-ddTHH:mm'}}" max="{{dateAfter(14, true) | date:'yyyy-MM-ddTHH:mm'}}" placeholder="{{dateAfter(14) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_to" required>
                    <span ng-show="form.time_to.$touched && form.time_to.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="(form.time_from.$touched && form.time_from.$error.required) || (form.time_to.$touched && form.time_to.$error.required)"> 행사 시간을 입력해주세요.</span>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.time_from.$error.datetimelocal || form.time_to.$error.datetimelocal"> {{dateAfter(7) | date:'yyyy-MM-ddTHH:mm'}}의 형식으로 입력해주세요. </span>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.time_from.$error.min || form.time_from.$error.max || form.time_to.$error.min || form.time_to.$error.max"> 현재 합주실은 {{dateAfter(2) | date:'MM월 dd'}}일에서 {{dateAfter(14) | date:'MM월 dd'}}일까지 빌릴 수 있습니다. </span>
            </div>
        </section>

        <div class="form-group">
            <div class="col-sm-12">
                <div class="pull-right">
                    <button ng-disabled="form.$untouched || form.$invalid" type="submit" class="btn btn-soft-red"> 예약하기 </button>
                </div>
            </div>
        </div>

    </form>
</main>
