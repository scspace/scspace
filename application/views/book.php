<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a> 책다방 책 목록 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main ng-app="book" ng-controller="BookController" class="container" ng-init='books = <?=$books?>'>
    <div class="row">
        <div class="col-sm-2 field-first">
            <select ng-model="orderProperty" class="form-control input-first select-override">
                <option value="category"> 카테고리순 </option>
                <option value="title" selected> 제목순 </option>
                <option value="author"> 지은이순 </option>
                <option value="publisher"> 출판사순 </option>
            </select>
        </div>
        <div class="col-sm-4 field-last">
            <input ng-model="searchText" type="text" class="form-control input-last" placeholder="검색하기">
        </div>
        <div class="col-sm-offset-4 col-sm-2">
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
    </div><!-- /.row -->


    <div class="spacing"> </div>
    <table class="table table-hover">
        <thead>
            <tr class="hidden-xs">
                <td class="col-sm-1"> 분류 </td>
                <td class="col-sm-5"> 제목 </td>
                <td class="col-sm-2"> 지은이 </td>
                <td class="col-sm-2"> 출판사 </td>
                <td class="col-sm-2"> ISBN </td>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="book in books | filter:searchText | orderBy:orderProperty| limitTo : 10 : 10*(offset - 1)">
                <td class="col-sm-1 hidden-xs">{{book.category}}</td>
                <td class="col-sm-5 hidden-xs">{{book.title}}</td>
                <td class="col-sm-2 hidden-xs">{{book.author}}</td>
                <td class="col-sm-2 hidden-xs">{{book.publisher}}</td>
                <td class="col-sm-2 hidden-xs">{{book.ISBN}}</td>
                <td class="visible-xs">
                    <small> {{book.category}} · {{book.publisher}} · {{book.ISBN}} </small> <br>
                    {{book.title}} <br>
                    <small> {{book.author}} </small>
                </td>
            </tr>
        </tbody>
    </table>
    <div ng-show="(books|filter:searchText).length === 0" class="text-center">
        <mark>검색결과</mark>가 없습니다.
    </div>
    <div class="spacing"></div>
</main>
