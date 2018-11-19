<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<footer>
	<div class="container">
		<div class="col-xs-6 col-sm-4 col-md-2">
			<ul class="list-unstyled domain">
				<li> 학생문화공간위원회 </li>
				<li><a href="/intro/committee"> 소개 </a></li>
				<li><a href="/intro/business"> 사업 </a></li>
				<li><a href="/intro/rule"> 회칙 </a></li>
			</ul>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-2">
			<ul class="list-unstyled domain">
				<li> 장영신학생회관 </li>
				<li><a href="/intro/center"> 소개 </a></li>
				<li><a href="/intro/history"> 역사 </a></li>
				<li><a href="/intro/statistics"> 통계 </a></li>
				<!--<li><a href="/intro/event"> 행사 안내 </a></li>-->
			</ul>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-2">
			<ul class="list-unstyled domain">
				<li> 게시물 관리 </li>
				<li><a href="/poster"> 규정 </a></li>
				<li><a href="https://goo.gl/forms/243GYkJ9LQOzhUqd2"> 신고하기 </a></li>
			</ul>
		</div>
		<div class="clearfix visible-sm"></div>

		<div class="col-xs-6 col-sm-4 col-md-2">
			<ul class="list-unstyled domain">
				<li> 알립니다 </li>
				<li><a href="/notice"> 공지사항 </a></li>
				<li><a href="/lost"> 분실물 </a></li>
			</ul>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-2">
			<ul class="list-unstyled domain">
				<li> 묻고 답하기 </li>
				<li><a href="/ask"> 문의 목록 </a></li>
				<li><a href="/ask/write"> 문의하기 </a></li>
				<li><a href="/repair"> 사설 수리 <li>
			</ul>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-2">
			<ul class="list-unstyled domain">
				<li> 연결 사이트 </li>
				<li><a href="https://facebook.com/scspace.kaist" target="_blank"> 페이스북 페이지 </a></li>
				<li><a href="https://facebook.com/bookdabang" target="_blank"> 책다방 페이스북 페이지 </a></li>
				<li><a href="http://kaist.ac.kr" target="_blank"> KAIST </a></li>
				<!--<li><a href="https://student.kaist.ac.kr" target="_blank"> 학부 총학생회 </a></li>-->
			</ul>
		</div>
	</div>
	<div class="container contact">
		<address>
			<ul class="list-unstyled list-inline domain">
				<li> KAIST 학생문화공간위원회 </li><br>
				<li> 대전광역시 유성구 대학로 291 한국과학기술원 N13-1 장영신학생회관 309호 </li><br>
				<li> 평일 19~21시 상근 <span class="hidden-xs"> · </span> <br class="visible-xs"> 042-350-0386 <!-- 영문판에선 +82 --><span class="hidden-xs"> · </span> <br class="visible-xs"><a href="mailto:scspace.kaist@gmail.com">scspace.kaist@gmail.com</a> </li>
			</ul>
		</address>
	</div>
	<div class="container">
		<p><a href="/humans.html"> 만든 사람들 </a></p>
	</div>
</footer>

<div class="overlay overlay-hugeinc">
	<button type="button" class="overlay-close">Close</button>
	<nav>
		<ul>
			<?php if ($this->session->userdata('type') === 'admin'): ?>
			<li><a href="/manage"> 관리 </a></li>
			<?php endif; ?>

			<?php if ($this->session->userdata('name') !== NULL): ?>
			<li> <a href="/mypage"> 마이페이지 </a></li>
			<li> <a href="/login/logout"> 로그아웃 </a></li>

			<?php else: ?>

			<li><a href="/login"> 로그인 </a></li>

			<?php endif; ?>
			<li><a href="/bookdabang"> 책다방 </a></li>
            <li><a href="/workshop"> 창작공방 </a></li>
            <li><a href="/individual-practice-room"> 개인연습실 </a></li>
            <li><a href="/piano-room"> 피아노실 </a></li>
            <li><a href="/dance-studio"> 무예실 </a></li>
            <li><a href="/multipurpose-room"> 다용도실 </a></li>
            <li><a href="/seminar-room"> 세미나실 </a></li>
            <li><a href="/group-practice-room"> 합주실 </a></li>
            <li><a href="/ullim-hall"> 울림홀 </a></li>
            <li><a href="/mirae-hall"> 미래홀 </a></li>
            <li><a href="/open-space"> 오픈스페이스 </a></li>
		</ul>
	</nav>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- AngularJS -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>

<script src="/static/js/common.js"></script>
<script src="/static/js/overlay.js"></script>
<script src="/static/js/timeago.js"></script>
<?php
if(isset($angulars)):
foreach($angulars as $angular):?>
<script src="/static/js/<?=$angular?>.js"></script>
<?php
endforeach;
endif?>

<?php
if(isset($js)):
foreach($js as $one):?>
<script src="<?=$one?>" charset="utf-8"></script>
<?php
endforeach;
endif?>
</body>
</html>
