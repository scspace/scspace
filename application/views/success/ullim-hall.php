<?php
$format = 'n월 j일 G:i';
$content = json_decode($reservation['content'], TRUE);
$space_name = $this->lang->line($reservation['space']);
if($reservation['space'] != 'ullim_hall') show_404();

$time_from = date_create_from_format('Y-m-d\TH:i',$content['time']['from'])->format($format);
$time_to = date_create_from_format('Y-m-d\TH:i',$content['time']['to'])->format($format);
$time_request = date_create_from_format('Y-m-d H:i:s',$reservation['time_request'])->format($format);
if ($content['time']['rehearsal_before_from'] != ''){
    $time_rehearsal_before_from = date_create_from_format('Y-m-d\TH:i',$content['time']['rehearsal_before_from'])->format($format);
    $time_rehearsal_before_to = date_create_from_format('Y-m-d\TH:i',$content['time']['rehearsal_before_to'])->format($format);
}
if($content['time']['rehearsal_from'] != ''){
    $time_rehearsal_from = date_create_from_format('Y-m-d\TH:i',$content['time']['rehearsal_from'])->format($format);
    $time_rehearsal_to = date_create_from_format('Y-m-d\TH:i',$content['time']['rehearsal_to'])->format($format);
}
?>
<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/ullim-hall"> 울림홀 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/ullim-hall/state"> 예약 현황 </a></li>
            <li><a href="/ullim-hall/reservation"> 예약하기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container">
    <div class="form-horizontal form col-sm-8 col-sm-offset-2">
        <h3 class="soft-red text-center">
            <?php if ($reservation['state'] == 'deleted'):?>
                취소된 예약입니다
            <?php else:?>
                울림홀 예약 신청이 완료되었습니다
            <?php endif?>
        </h3>

        <h4> 단체와 행사 </h4> <hr>

        <div class="form-group">
            <label class="col-sm-3 control-label"> 단체 이름 </label>
            <div class="col-sm-9">
                <p class="form-control-static"> <?=$content['organization_name']?> </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"> 행사 이름 </label>
            <div class="col-sm-9">
                <p class="form-control-static"> <?=$content['event_name']?> </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"> 예상 참여 인원 </label>
            <div class="col-sm-9">
                <p class="form-control-static"> 교내: <?=$content['entry']['in']?> 교외: <?=$content['entry']['out']?>  </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label"> 행사 목적 </label>
            <div class="col-sm-9">
                <p class="form-control-static"> <?=$content['purpose']?> </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label"> 행사 내용 </label>
            <div class="col-sm-9">
                <p class="form-control-static"> <?=$content['content']?> </p>
            </div>
        </div>

        <h4> 시간 </h4> <hr>
        <div class="form-group">
            <label class="col-sm-3 control-label"> 전날 리허설 </label>
            <div class="col-sm-9">
                <p class="form-control-static">
                    <?php if(isset($time_rehearsal_before_from)):?>
                    <?=$time_rehearsal_before_from?> ~ <?=$time_rehearsal_before_to?>
                    <?php else:?>
                    전날 리허설이 없습니다.
                    <?php endif;?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"> 당일 리허설 </label>
            <div class="col-sm-9">
                <p class="form-control-static">
                    <?php if(isset($time_rehearsal_from)):?>
                    <?=$time_rehearsal_from?> ~ <?=$time_rehearsal_to?>
                    <?php else:?>
                    당일 리허설이 없습니다.
                    <?php endif;?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"> 행사 </label>
            <div class="col-sm-9">
                <p class="form-control-static"> <?=$time_from?> ~ <?=$time_to?> </p>
            </div>
        </div>

        <h4> 장비 </h4> <hr>

        <div class="form-group">
            <label class="col-sm-3 control-label"> 사용 장비 </label>
            <div class="col-sm-9">
                <p class="form-control-static">
                    <?php if ($content['type_equipment'] == ''):?>
                    장비를 사용하지 않습니다.
                    <?php else:?>
                    <?php foreach($content['type_equipment'] as $equip) echo $equip.'<br>'?>
                    <?php endif;?>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label"> 근로장학생 </label>
            <div class="col-sm-9">
                <?php if($content['labor_time']!=''):?>
                <p class="form-control-static"> <?=$content['labor_time']?> </p>
                <?php else:?>
                <p class="form-control-static"> 작성된 내용 없음. </p>
                <?php endif;?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label"> 책상과 의자 </label>
            <div class="col-sm-9">
                <p class="form-control-static"> 책상 수: <?=$content['no_table']?> 의자 수: <?=$content['no_chair']?> </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label"> 1층 로비 </label>
            <div class="col-sm-9">
                <p class="form-control-static"> <?=($content['1f_lobby'] == 'yes')?'사용':'사용하지 않음'?> </p>
            </div>
        </div>

        <h4> 보증금과 음식물 </h4> <hr>
        <div>
            <ul class="list-unstyled">
                <li> - 보증금은 예약이 <span class="soft-red">승인된 후 입금</span>해야 합니다. </li>
                <li> - 예약이 승인되더라도 보증금이 행사 <span class="soft-red">하루 전 21시까지 입금</span>하지 않을 경우 행사를 진행할 수 없습니다. </li>
                <li> - 행사 이후 뒷정리의 상태에 따라 보증금의 환급 여부를 결정합니다. </li>
            </ul>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label"> 음식물 </label>
            <div class="col-sm-9">
                <p class="form-control-static">
                    <?php switch($content['bring_food']){
                        case 'food/drink':echo '음식과 주류 반입'; break;
                        case 'snack':echo '스낵 반입'; break;
                        case 'none':echo '음식물을 반입 안 함'; break;
                    }?>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label"> 보증금 환급 계좌 </label>
            <div class="col-sm-9">
                <p class="form-control-static">
                    예금주: <?=$content['deposit']['holder']?>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label"> 보증금 </label>
            <div class="col-sm-9">
                <p class="form-control-static">
                    <?php switch($content['bring_food']){
                        case 'food/drink':echo '500,000'; break;
                        case 'snack':echo '150,000'; break;
                        case 'none':echo '50,000'; break;
                    }?>
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label"> 입금 계좌 </label>
            <div class="col-sm-3 col-md-2 field-first">
                <p class="input-first form-control-static">
                    <?=$deposit['holder']?>
                </p>
            </div>
            <div class="col-sm-2 col-md-1 field-middle">
                <p class="input-middle form-control-static">
                    <?=$deposit['bank']?>
                </p>
            </div>
            <div class="col-sm-4 col-md-4 field-last">
                <p class="input-last form-control-static">
                    <?=$deposit['account']?>
                </p>
            </div>
        </div>

        <h4> 예약 </h4> <hr>
        <div class="form-group">
            <label class="col-sm-3 control-label"> 예약자 이름 </label>
            <div class="col-sm-9">
                <p class="form-control-static"> <?=$reservation['name']?> </p>
            </div>
        </div>

        <h4> 예약 처리 </h4> <hr>
        <div class="form-group">
            <label class="col-sm-3 control-label"> 상태 </label>
            <div class="col-sm-9">
                <p class="form-control-static">
                    <?php
                    $state = $reservation['state'];
                    if ($state == 'grant'):?>
                    승인됨
                    <?php elseif ($state == 'reject'):?>
                    거절됨
                    <?php elseif ($state == 'wait'):?>
                    대기 중
                    <?php elseif ($state == 'deleted'):?>
                    취소됨
                    <?php endif;?>
                </p>
            </div>
        </div>
        <?php if ($state == 'reject'): ?>
        <div class="form-group">
            <label class="col-sm-3 control-label" for="reject-reason">거절 사유</label>
            <div class="col-sm-9">
                <p class="form-control-static">
                    <?=$reservation['reject_reason']?>
                </p>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($state != 'deleted'):?>
            <!-- 트리거 버튼 -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                예약 취소
            </button>
            <!-- 모달 -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteModal">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel" style="margin-top:0"> 예약 취소하기 </h4>
                  </div>
                  <div class="modal-body">
                      <p>
                          정말 예약을 취소하시겠습니까? 이 동작은 되돌릴 수 없습니다.
                      </p>
                    <span class="small text-muted">
                        아직 예약 수정 기능을 만들지 않았습니다. 수정을 원하신다면 다시 예약해주시기 바랍니다.
                    </span>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> 창 닫기 </button>
                    <a href="/ullim-hall/delete/<?=$reservation['id']?>" type="button" class="btn btn-danger"> 예약 취소 </a>
                  </div>
                </div>
              </div>
            </div>
        <?php endif;?>
    </div>
</main>
