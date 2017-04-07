<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/manage"> 관리 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>
<main class="container">

    <form class="form-horizontal">
        <h4> 계좌 갱신이 다음과 같이 완료되었습니다. </h4>
        <hr>
        <div class="form-group">
            <label class="col-sm-2 control-label"> 신규 보증금 계좌 </label>
            <div class="col-sm-2 col-md-1 field-first">
                <p class="input-first form-control-static">
                    <?=$account['holder']?> <br>
                </p>

            </div>
            <div class="col-sm-2 col-md-1 field-middle">
                <p class="input-middle form-control-static">
                    <?=$account['bank']?>
                </p>
            </div>
            <div class="col-sm-4 col-md-3 field-last">
                <p class="input-last form-control-static">
                    <?=$account['account']?>
                </p>
            </div>
        </div>
        <a class="btn btn-soft-red pull-right" href="/manage"> 관리 화면으로 돌아가기 </a>
    </form>
</main>
