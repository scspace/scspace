<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/workshop"> 창작공방 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/workshop/reservation"> 예약하기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main ng-app="calendar" ng-controller="calendarCtrl" class="container">
    <p class="pull-left">
        <span style="background-color:#F56C57;color:#333;padding:3px;border-color:#D02424">창작공방</span>
    </p>
    <div ui-calendar="uiConfig.calendar" ng-model='eventSource'>

    </div>

</main>
