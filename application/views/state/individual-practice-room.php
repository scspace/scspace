<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/individual-practice-room"> 개인연습실 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/individual-practice-room/reservation"> 예약하기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main id="calendar" ng-app="calendar" ng-controller="calendarCtrl" class="container">
    <p class="pull-left">
        <span style="background-color:#FA573C;color:#000;padding:3px;border-color:#D02424">개인연습실 1</span>
        <span style="background-color:#49d796;color:#000;padding:3px;border-color:#4fb78e">개인연습실 2</span>
        <span style="background-color:#FAD165;color:#000;padding:3px;border-color:#BF9608">개인연습실 3</span>
    </p>
    <div ui-calendar="uiConfig.calendar" ng-model='eventSource'>
    </div>
</main>
