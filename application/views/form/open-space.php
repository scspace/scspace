<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/open-space"> 오픈스페이스 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/open-space/state"> 예약 현황 </a></li>
            <li><a href="/open-space/reservation"> 예약하기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>


<main class="container" ng-app="form" ng-controller="FormController">
    <form novalidate name="form" class="form-horizontal" action="/reservation/reserve/open-space" method="post">
        <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
        <input type="hidden" name="space" value="open_space">

        <section class="form-section">
            <h4> 단체와 행사 </h4>
            <hr>

            <div class="form-group has-feedback" ng-class="{'has-error':form.organization_name.$touched && form.organization_name.$invalid}">
                <label for="organization_name" class="col-sm-2 control-label"> 단체 이름 </label>
                <div class="col-sm-4">
                    <input ng-model="organization_name" type="text" name="organization_name" class="form-control" required>
                    <span ng-show="form.organization_name.$touched && form.organization_name.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.organization_name.$touched && form.organization_name.$error.required"> 단체 이름을 입력해주세요.</span>
            </div>
            <div class="form-group has-feedback" ng-class="{'has-error':form.event_name.$touched && form.event_name.$invalid}">
                <label for="event_name" class="col-sm-2 control-label"> 행사 이름 </label>
                <div class="col-sm-4">
                    <input ng-model="event_name" type="text" name="event_name" class="form-control" required>
                    <span ng-show="form.event_name.$touched && form.event_name.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.event_name.$touched && form.event_name.$error.required"> 행사 이름을 입력해주세요.</span>
            </div>
            <div class="form-group has-feedback" ng-class="{'has-error':form['entry[in]'].$touched && form['entry[in]'].$invalid || form['entry[out]'].$touched && form['entry[out]'].$invalid}">
                <label class="col-sm-2 control-label"> 예상 참여 인원 </label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-xs-12" style="margin-bottom:8px;">
                            <div class="row">
                                <label for="entry[in]" class="col-xs-3 col-sm-2 control-label second-label"> 학내 구성원 </label>
                                <div class="col-xs-9 col-sm-3">
                                    <input ng-model="entry_in" id="entry[in]" name="entry[in]" type="number" class="form-control" min="1" required>
                                    <span ng-show="form['entry[in]'].$touched && form['entry[in]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <span ng-show="form['entry[in]'].$touched && form['entry[in]'].$error.required" class="help-block col-xs-offset-3 col-xs-9 col-sm-offset-0 col-sm-7"> 참여할 학내 구성원 수를 입력해주세요. </span>
                                <span ng-show="form['entry[in]'].$error.number" class="help-block col-xs-offset-3 col-xs-9 col-sm-offset-0 col-sm-7"> 참여할 학내 구성원 수는 숫자여야합니다. </span>
                                <span ng-show="form['entry[in]'].$error.min" class="help-block col-xs-offset-3 col-xs-9 col-sm-offset-0 col-sm-7"> 적어도 한 명의 학내 구성원이 참가해야합니다. </span>
                            </div>
                        </div>

                        <div class="col-xs-12" style="margin-bottom:15px;">
                            <div class="row">
                                <label for="entry[out]" class="col-xs-3 col-sm-2 control-label second-label"> 외부인 </label>
                                <div class="col-xs-9 col-sm-3">
                                    <input ng-model="entry_out" id="entry[out]" name="entry[out]" type="number" class="form-control" min="0" required>
                                    <span ng-show="form['entry[out]'].$touched && form['entry[out]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <span ng-show="form['entry[out]'].$touched && form['entry[out]'].$error.required" class="help-block col-xs-offset-3 col-xs-9 col-sm-offset-0 col-sm-7"> 참여할 외부인 수를 입력해주세요. </span>
                                <span ng-show="form['entry[out]'].$error.number" class="help-block col-xs-offset-3 col-xs-9 col-sm-offset-0 col-sm-7"> 참여할 외부인 수는 숫자여야합니다. </span>
                                <span ng-show="form['entry[out]'].$error.min" class="help-block col-xs-offset-3 col-xs-9 col-sm-offset-0 col-sm-7"> 참여할 외부인 수는 양수여야합니다. </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group has-feedback" ng-class="{'has-error':form.purpose.$touched && form.purpose.$invalid}">
                <label for="purpose" class="col-sm-2 control-label"> 행사 목적 </label>
                <div class="col-sm-10">
                    <input ng-model="purpose" id="purpose" name="purpose" type="text" class="form-control" required>
                    <span ng-show="form.purpose.$touched && form.purpose.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.purpose.$touched && form.purpose.$error.required">행사 목적을 입력해주세요.</span>

            </div>
            <div class="form-group has-feedback" ng-class="{'has-error':form.content.$touched && form.content.$invalid}">
                <label for="content" class="col-sm-2 control-label"> 행사 내용 </label>
                <div class="col-sm-10">
                    <textarea ng-model="content" id="content" name="content" placeholder="행사의 자세한 내용을 알려주세요. 이 내용은 학생문화공간위원회에 전달됩니다." type="text" class="form-control" rows="5" style="resize:vertical" required></textarea>
                    <span ng-show="form.content.$touched && form.content.$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form.content.$touched && form.content.$error.required">행사 내용을 입력해주세요.</span>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"> 성격 </label>
                <div class="col-sm-10">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="type[]" value="종교적"> 종교적
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="type[]" value="영리성"> 영리성
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="type[]" value="정치적"> 정치적
                    </label>
                    <span class="help-block"> 영리적, 정치적, 또는 종교적 행사는 이용이 제한될 수 있습니다.</span>
                </div>
            </div>


        </section>

        <section class="form-section">
            <h4> 장소와 시간 </h4>
            <hr>

            <div class="form-group">
                <label class="col-sm-2 control-label"> 장소 </label>
                <div class="col-sm-10">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="place[]" value="옥상"> 옥상
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="place[]" value="커뮤니티 마당"> 커뮤니티 마당
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="place[]" value="전시 계단"> 전시 계단
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="place[]" value="미디어 스페이스"> 미디어 스페이스
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="place[]" value="2층 로비"> 2층 로비
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="place[]" value="3층 로비"> 3층 로비
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="place[]" value="모임터"> 모임터
                    </label>
                </div>
            </div>


            <div class="row">
                <p class="col-sm-offset-2 col-sm-10">
                    24:00 대신 다음날 00:00으로 입력해주세요.
                </p>
            </div>

            <div class="form-group has-feedback" ng-class="{'has-error':form['time[rehearsal_from]'].$touched && form['time[rehearsal_from]'].$invalid || form['time[rehearsal_to]'].$touched && form['time[rehearsal_to]'].$invalid}">
                <label class="col-sm-2 control-label"> 리허설 시간 </label>
                <div class="col-sm-4">
                    <input ng-model="time_rehearsal_from" type="datetime-local" name="time[rehearsal_from]" placeholder="{{dateAfter(7) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_from">
                    <span ng-show="form['time[rehearsal_from]'].$touched && form['time[rehearsal_from]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>

                <div class="col-sm-4">
                    <input ng-model="time_rehearsal_to" type="datetime-local" name="time[rehearsal_to]" placeholder="{{dateAfter(44) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_to">
                    <span ng-show="form['time[rehearsal_to]'].$touched && form['time[rehearsal_to]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form['time[rehearsal_from]'].$error.datetimelocal || form['time[rehearsal_to]'].$error.datetimelocal"> {{dateAfter(7) | date:'yyyy-MM-ddTHH:mm'}}의 형식으로 입력해주세요. </span>
            </div>

            <div class="form-group has-feedback" ng-class="{'has-error':form['time[from]'].$touched && form['time[from]'].$invalid || form['time[to]'].$touched && form['time[to]'].$invalid}">
                <label class="col-sm-2 control-label"> 행사 시간 </label>
                <div class="col-sm-4">
                    <input ng-model="time_from" type="datetime-local" name="time[from]" placeholder="{{dateAfter(7) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_from" required>
                    <span ng-show="form['time[from]'].$touched && form['time[from]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>

                <div class="col-sm-4">
                    <input ng-model="time_to" type="datetime-local" name="time[to]" placeholder="{{dateAfter(44) | date:'yyyy-MM-ddTHH:mm'}}" class="form-control time_to" required>
                    <span ng-show="form['time[to]'].$touched && form['time[to]'].$invalid" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                </div>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="(form['time[from]'].$touched && form['time[from]'].$error.required) || (form['time[to]'].$touched && form['time[to]'].$error.required)"> 행사 시간을 입력해주세요.</span>
                <span class="help-block col-sm-offset-2 col-sm-10" ng-show="form['time[from]'].$error.datetimelocal || form['time[to]'].$error.datetimelocal"> {{dateAfter(7) | date:'yyyy-MM-ddTHH:mm'}}의 형식으로 입력해주세요. </span>
            </div>

        </section>

        <section class="form-section">
            <h4> 장비와 대여 </h4>
            <hr>

            <div class="form-group">
                <label class="col-sm-2 control-label"> 장비 </label>
                 <div class="col-sm-10">
                     <div class="checkbox">
                         <label>
                             <input type="checkbox" name="type_equipment[]" value="음향 장비"> 음향 장비를 사용합니다.
                         </label>
                     </div>
                     <div class="checkbox">
                         <label>
                             <input type="checkbox" name="type_equipment[]" value="차단봉"> 차단봉을 사용합니다.
                         </label>
                     </div>
                     <div class="checkbox">
                         <label>
                             <input type="checkbox" name="type_equipment[]" value="안내판"> 안내판 사용합니다.
                         </label>
                     </div>
                 </div>
            </div>
        </section>

        <section class="form-section">
            <h4> 보증금 </h4>
            <hr>

            <div class="row">
                <ul class="col-sm-offset-2 col-sm-10 list-unstyled">
                    <li> - 보증금은 예약이 <span class="soft-red">승인된 후 입금</span>해야 합니다. </li>
                    <li> - 예약이 승인되더라도 보증금이 행사 <span class="soft-red">하루 전 21시까지 입금</span>하지 않을 경우 행사를 진행할 수 없습니다. </li>
                    <li> - 행사 이후 뒷정리의 상태에 따라 보증금의 환급 여부를 결정합니다. </li>
                    <li> - 감사위에 제출할 <span class="soft-red">보증금 입금 증빙 서류</span>가 필요할 경우 scspace.kaist@gmail.com 로 문의 해 주시기 바랍니다 </li>
                </ul>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"> 음식물 </label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="bring_food" ng-model="bring_food" value="none" required> 음식과 주류 반입 안 함
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="bring_food" ng-model="bring_food" value="food/drink"> 음식과 주류 반입
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"> 보증금 </label>
                <div class="col-sm-10">
                    <p ng-switch="bring_food" class="form-control-static">
                        <span ng-switch-when="none"> <span class="soft-red">100,000</span> 원 </span>
                        <span ng-switch-when="food/drink"> <span class="soft-red">500,000</span> 원 </span>
                        <span ng-switch-default class="soft-red"> 보증금은 음식물 반입 여부에 따라 달라집니다. </span>
                    </p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"> 입금 계좌 </label>
                <div class="col-sm-2 col-md-1 field-first">
                    <p class="input-first form-control-static">
                        김대희 <br>
                    </p>

                </div>
                <div class="col-sm-2 col-md-1 field-middle">
                    <p class="input-middle form-control-static">
                        우리
                    </p>
                </div>
                <div class="col-sm-4 col-md-3 field-last">
                    <p class="input-last form-control-static">
                        1006-001-516254
                    </p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"> 환급 계좌 </label>
                <div class="col-sm-2 col-md-1 field-first">
                    <input type="text" name="deposit[holder]" class="input-first form-control" placeholder="예금주" required>
                </div>
                <div class="col-sm-2 col-md-1 field-middle">
                    <select name="deposit[bank]" class="input-middle form-control select-override">

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
                    <input type="text" name="deposit[account]" class="input-last form-control" placeholder="계좌번호" required>
                </div>
            </div>
        </section>

        <div class="form-group">
            <div class="col-sm-12">
                <div class="pull-right">
                    <button ng-disabled="form.$untouched || form.$invalid" type="submit" class="btn btn-primary"> 예약하기 </button>
                </div>
            </div>
        </div>

    </form>
</main>

