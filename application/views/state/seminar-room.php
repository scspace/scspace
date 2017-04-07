<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/seminar-room"> 세미나실 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/seminar-room/reservation"> 예약하기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main ng-app="calendar" ng-controller="calendarCtrl" class="container">
    <p class="pull-left">
        <span style="background-color:#F56C57;color:#333;padding:3px;border-color:#D02424">세미나실 1</span>
        <span style="background-color:#68A225;color:#333;padding:3px;border-color:#4fb78e">세미나실 2</span>
    </p>
    <div ui-calendar="uiConfig.calendar" ng-model='eventSource'>

    </div>

</main>
