<nav class="navbar navbar-inverse navbar-static-top personal-nav hidden-xs">
    <div class="container">
        <a href="/"><img src="/static/logo_title.svg" alt="학생문화공간위원회 로고" style="height:40px;margin:10px 0"/></a>
        <ul class="nav navbar-nav navbar-right" style="margin-top:11px;">
            <?php if ($this->session->userdata('name') != NULL): ?>
            <li><a href="/mypage"> 마이페이지 </a></li>

            <?php if ($this->session->userdata('type') == 'admin'): ?>
            <li><a href="/manage"> 관리 </a></li>
            <?php endif; ?>

            <li> <a href="/login/logout"> 로그아웃 </a></li>
            <?php else: ?>
            <li><a href="/login"> 로그인 </a></li>
            <?php endif; ?>

            <!--<li><a href="#"> <span class="glyphicon glyphicon-globe"></span> </a></li>-->
        </ul>
    </div>
</nav>
<nav class="navbar navbar-inverse navbar-static-top global-nav hidden-xs">
    <div class="container">
        <ul class="list-unstyled">
            <li class="space"><a href="/bookdabang"> 책다방 </a></li>
            <li class="space"><a href="/workshop"> 창작공방 </a></li>
            <li class="space"><a href="/individual-practice-room"> 개인연습실 </a></li>
            <li class="space"><a href="/piano-room"> 피아노실 </a></li>
            <li class="space"><a href="/dance-studio"> 무예실 </a></li>
            <li class="space"><a href="/multipurpose-room"> 다용도실 </a></li>
            <li class="space"><a href="/seminar-room"> 세미나실 </a></li>
            <li class="space"><a href="/group-practice-room"> 합주실 </a></li>
            <li class="space"><a href="/ullim-hall"> 울림홀 </a></li>
            <li class="space"><a href="/mirae-hall"> 미래홀 </a></li>
            <li class="space"><a href="/open-space"> 오픈스페이스 </a></li>
        </ul>
    </div>
</nav>

<nav class="navbar navbar-inverse mobile-nav visible-xs">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" id="trigger-overlay" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><img src="/static/logo.svg" alt="학생문화공간위원회 로고" /></a>
    </div>
</div>
</nav>
