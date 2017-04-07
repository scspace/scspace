<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="">  신고하기 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/poster"> 규정 보기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container">
    <div class="alert alert-danger" role="alert"> 준비 중입니다. </div>
    <!--
    <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
    <div class="submit-group-title">신고 분류</div>
    <div class="submit-group">
        <div class="form-group">
            <label class="radio-inline">
                <input id="chbox1" type="radio" name="board_type" value="board_inner" required onclick="document.getElementById('chbox1').required = false; changesubmitmode('1','2','0');"> 내부 게시물 신고
            </label>
            <label class="radio-inline">
                <input type="radio" name="board_type" value="board_outer" onclick="document.getElementById('chbox1').required = false; changesubmitmode('0','2','1');"> 외부 게시물 신고
            </label>
            <label class="radio-inline">
                <input type="radio" name="board_type" value="board_outofrange" onclick="document.getElementById('chbox1').required = false; changesubmitmode('0','1','2');"> 규격 외 게시물 승인 요청
            </label>
        </div>
    </div>
    <div class="submit-group-title">게시자 정보</div>
    <div class="submit-group">
        <div class="form-group">
            <label for="board-title" class="control-label"> 게시 주제 </label>
            <div class="submit-input">
                <input name="board_title" type="text" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="board-purpose" class="control-label"> 게시 목적 </label>
            <label class="radio-inline">
                <input id="chbox2" type="radio" name="board_purpose" value="performance_notice" required onclick="document.getElementById('chbox2').required = false;turninputon('etc',1)"> 공연 홍보
            </label>
            <label class="radio-inline">
                <input type="radio" name="board_purpose" value="recruiting_notice" onclick="document.getElementById('chbox2').required = false;turninputon('etc',1)"> 리쿠르팅 홍보
            </label>
            <label class="radio-inline">
                <input type="radio" name="board_purpose" value="event_notice" onclick="document.getElementById('chbox2').required = false;turninputon('etc',1)"> 행사 홍보
            </label>
            <label class="radio-inline">
                <input type="radio" name="board_purpose" value="etc_notice" onclick="document.getElementById('chbox2').required = false;turninputon('etc',1)"> 기타 홍보
            </label>
            <label class="radio-inline">
                <input type="radio" name="board_purpose" value="etc" onclick="document.getElementById('chbox2').required = false;turninputon('etc',0)"> 기타
                <input id="etc" name="board_purpose_etc" type="text" class="etc-control" disabled>
            </label>
        </div>
        <div class="form-group">
            <label for="board_phone" class="control-label"> 연락처 </label>
            <div class="submit-input">
                <input name="board_phone" type="text" placeholder="예시: 010-1234-5678" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="submit-group-title">게시물 정보</div>
    <div class="submit-group">
        <div class="form-group submit-form-2">
                <label class="radio-inline">
                    <input id="chbox3" class="submit-input-2-required" type="radio" name="board_outofrange_type" value="board_outofrange_inner" onclick="document.getElementById('chbox3').required = false"> 내부 게시물 신고
                </label>
                <label class="radio-inline">
                    <input type="radio" class="submit-input-2" name="board_outofrange_type" value="board_outofrange_outer" onclick="document.getElementById('chbox3').required = false"> 외부 게시물 신고
                </label>
        </div>
        <div class="form-group">
            <label class="control-label"> 게시 기간 </label>
            <div class="submit-input">
                <input name="board_start_time" type="date" placeholder="YYYY-MM-DD" class="submit-board-time" onkeyup="autoHypenDate(this.value, this)" onchange="autoHypenDate(this.value, this)" required>
                <span> ~ </span>
                <input name="board_finish_time" type="date" placeholder="YYYY-MM-DD" class="submit-board-time" onkeyup="autoHypenDate(this.value, this)" onchange="autoHypenDate(this.value, this)" required>
            </div>
        </div>
        <div class="form-group submit-form-0">
            <label class="control-label"> 크기/매수 </label>
            <div class="submit-input">
                <span style="font-size:12px;">&nbsp;&nbsp;크기</span>
                <input name="board_inner_size" type="text" class="submit-board-smallbox submit-input-0-required">
                <span style="font-size:12px;"><br/>&nbsp;&nbsp;매수</span>
                <input name="board_inner_number" type="text" class="submit-board-smallbox submit-input-0-required">
            </div>
        </div>
        <div class="form-group submit-form-1">
            <label for="board_outer_size" class="control-label"> 게시물 크기 </label>
            <div class="submit-input">
                <input name="board_outer_size" type="text" placeholder="예시: 10m*3m" class="form-control submit-input-1-required">
            </div>
        </div>
        <div class="form-group submit-form-1 submit-board-checkbox-div">
                <input name="board_outer_money" class="submit-input-1-required submit-board-checkbox" type="checkbox"> 게시물이 영리 목적을 띠나요?<br/>
                <input name="board_outer_money" class="submit-input-1-required submit-board-checkbox" type="checkbox"> 학내 구성원이 아닌가요?
        </div>

        <div class="form-group submit-form-2">
            <label class="control-label"> 크기/매수 </label>
            <div class="submit-input">
                <span style="font-size:12px;">&nbsp;&nbsp;크기</span>
                <input name="board_outofrange_size" type="text" class="submit-board-smallbox submit-input-2-required">
                <span style="font-size:12px;"><br/>&nbsp;&nbsp;매수</span>
                <input name="board_outofrange_number" type="text" class="submit-board-smallbox submit-input-2-required">
            </div>
        </div>

        <div class="form-group submit-form-2">
            <label for="content" class="control-label"> 기타 승인 신청 사유 </label>
                <textarea name="board_outofrange_cause" type="text" class="form-control submit-input-2-required" rows="5"></textarea>
        </div>
        <div class="form-group submit-form-2 submit-board-checkbox-div">
                <input name="board_outer_money" class="submit-input-2-required submit-board-checkbox" type="checkbox"> 게시물이 영리 목적을 띠나요?<br/>
                <input name="board_outer_money" class="submit-input-2-required submit-board-checkbox" type="checkbox"> 학내 구성원이 아닌가요?
        </div>
    </div>
    <div class="submit-group-title">게시물 체크리스트</div>
    <div class="submit-group">
        <div class="form-group submit-form-0 submit-board-checkbox-div">
                <input name="board_outer_money" class="submit-input-0-required submit-board-checkbox" type="checkbox"> 게시물에 철거일과 담당자, 연락처가 정확히 기재되어 있나요?<br/>
                <input name="board_outer_money" class="submit-input-0-required submit-board-checkbox" type="checkbox"> 게시물의 크기(가로, 세로 모두)가 A1을 넘지 않나요?<br/>
                <input name="board_outer_money" class="submit-input-0-required submit-board-checkbox" type="checkbox"> 게시물 부착 규정을 잘 읽어 보셨나요?
        </div>
        <div class="form-group submit-form-1 submit-board-checkbox-div">
                <input name="board_outer_money" class="submit-input-1-required submit-board-checkbox" type="checkbox"> 게시물에 철거일과 담당자, 연락처가 정확히 기재되어 있나요?<br/>
                <input name="board_outer_money" class="submit-input-1-required submit-board-checkbox" type="checkbox"> 게시물의 크기가 5m*12m를 넘지 않나요?<br/>
                <input name="board_outer_money" class="submit-input-1-required submit-board-checkbox" type="checkbox"> 게시물 부착 규정을 잘 읽어 보셨나요?
        </div>
        <div class="form-group submit-form-2 submit-board-checkbox-div">
                <input name="board_outer_money" class="submit-input-2-required submit-board-checkbox" type="checkbox"> 게시물에 철거일과 담당자, 연락처가 정확히 기재되어 있나요?<br/>
                <input name="board_outer_money" class="submit-input-2-required submit-board-checkbox" type="checkbox"> 게시물 부착 규정을 잘 읽어 보셨나요?
        </div>
    </div>

    <div class="submit-button">
            <button id="button" type="submit" value="thasd" class="submit-button-btn"> 예약하기 </button>
    </div>]
    -->
</main>
