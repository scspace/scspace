<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/bookdabang"> 책다방 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/bookdabang/reservation"> 예약하기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main ng-app="calendar" ng-controller="calendarCtrl" class="container">

    <div ui-calendar="uiConfig.calendar" ng-model='eventSource'>

    </div>

</main>
