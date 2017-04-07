<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/dance-studio"> 무예실 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/dance-studio/reservation"> 예약하기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main ng-app="calendar" ng-controller="calendarCtrl" class="container">
    <p class="pull-left">
        <span style="background-color:rgb(76,175,80);color:#000;padding:3px"> 승인됨 </span> &nbsp;
        <span style="background-color:rgba(76,175,80,0.18);rgba(0,0,0,0.39);padding:3px"> 대기 중 </span>
    </p>
    <div ui-calendar="uiConfig.calendar" ng-model='eventSource'>

    </div>

</main>
