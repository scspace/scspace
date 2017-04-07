<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/notice"> 공지사항 </a></li>
        </ul>
        <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 'admin'):?>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/notice/write"> 공지 작성 </a></li>
        </ul>
        <?php endif;?>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container" ng-app="pagination" ng-controller="PaginationCtrl">
    <div ng-init='notices = <?=json_encode($notices, JSON_HEX_APOS|JSON_PRETTY_PRINT)?>'></div>
    <div class="row">
        <div class="col-sm-3 col-xs-5">
            <input ng-model="searchText" type="text" class="form-control" placeholder="검색하기">
        </div>
		<div class="col-sm-offset-7 col-sm-2 col-xs-offset-2 col-xs-5">
			<div class="input-group">
				<div class="input-group-btn">
					<button class="btn btn-default" type="button" name="button" ng-click="offsetDown()"> < </button>
				</div>
				<p class="form-control form-control-static text-center">{{offset}}</p>
				<div class="input-group-btn">
					<button class="btn btn-default" type="button" name="button" ng-click="offset = offset + 1"> > </button>
				</div>
			</div>
		</div>
	</div>
    <div class="spacing">

    </div>
    <table class="table table-hover">
        <thead>
            <tr class="hidden-xs">
                <td> 태그 </td>
                <td> 제목 </td>
                <td> 날짜 </td>
                <td> 열람 </td>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="notice in (notices | filter:searchText | limitTo : 10 : 10*(offset - 1))">
                <td class="col-sm-1 hidden-xs"> {{notice.tag}} </td>
                <td class="col-sm-9 hidden-xs"> <a href="/notice/view/{{notice.id}}"> {{notice.title}} </a> </td>
                <td class="col-sm-2 hidden-xs"> {{notice.time_post}} </td>
                <td class="col-sm-2 hidden-xs"> {{notice.hit}} </td>
                <td class="visible-xs">
                    <a href="/notice/view/{{notice.id}}"> {{notice.title}} </a><br>
                    <small>{{notice.tag}} | {{notice.time_post}}</small>
                </td>
            </tr>

        </tbody>
    </table>

</main>
