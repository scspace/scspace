<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/manage"> 관리 › 보증금 계좌 수정 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container">


    <!-- Form -->
    <form class="form-horizontal" action="/manage/deposit-account-process" method="post">
        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />

        <h4> 계좌 갱신하기 </h4>
        <hr>
        <div class="form-group">
            <label class="col-sm-2 control-label"> 기존 보증금 계좌 </label>
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

        <div class="form-group">
            <label class="col-sm-2 control-label"> 계좌 </label>
            <div class="col-sm-2 col-md-1 field-first">
                <input type="text" name="holder" class="input-first form-control" placeholder="예금주" required>
            </div>
            <div class="col-sm-2 col-md-1 field-middle">
                <select name="bank" class="input-middle form-control select-override">

                    <option value="우리">우리</option>
                    <option value="우체국">우체국</option>
                    <option value="국민">국민</option>
                    <option value="농협">농협</option>
                    <option value="신한">신한</option>
                    <option value="KEB하나">KEB하나</option>

                    <option value="기업">기업</option>
                    <option value="외환">외환</option>
                    <option value="SC제일">SC제일</option>
                    <option value="한국씨티">한국씨티</option>

                    <option value="부산">부산</option>
                    <option value="대구">대구</option>
                    <option value="경남">경남</option>
                    <option value="광주">광주</option>
                    <option value="전북">전북</option>
                    <option value="제주">제주</option>

                    <option value="산업">산업</option>
                    <option value="수출입">수출입</option>
                    <option value="수협">수협</option>
                </select>

            </div>
            <div class="col-sm-4 col-md-3 field-last">
                <input type="text" name="account" class="input-last form-control" placeholder="계좌번호" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"> 갱신하기 </button>
            </div>
        </div>

    </form>
</main>
