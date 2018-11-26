<?php

$content = json_decode($reservation['content'], TRUE);
$that = $this;
$format = function($time) use ($that) {
    print_r($time)
    $time = date_create_from_format('U',$that->space->toStamp($time));
    $time->setTimeZone(new DateTimeZone('Asia/Seoul'));
    return $time->format('n월 j일 G:i');
};


$time_from = $format($content['time']['from']);
$time_to = $format($content['time']['to']);
$time_request = $format($reservation['time_request']);
if ($content['time']['rehearsal_from'] != ''){
    $time_rehearsal_from = $format($content['time']['rehearsal_from']);
    $time_rehearsal_to = $format($content['time']['rehearsal_to']);
}


?>

<div class="modal fade" id="<?=$reservation['id']?>" tabindex="-1" role="dialog" aria-labelledby="<?=$reservation['id']?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="<?=$reservation['id']?>"> <?=$this->lang->line($reservation['space'])?> </h4>
            </div>
            <div class="modal-body form-horizontal">
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

                <div class="form-group">
                    <label class="col-sm-3 control-label"> 성격 </label>
                    <div class="col-sm-9">
                        <p class="form-control-static"> <?php
                            if ($content['type'] != ''){
                                foreach($content['type'] as $type) echo $type.'<br>';
                            } else {
                                echo '체크된 내용 없음';
                            }
                        ?> </p>
                    </div>
                </div>


                <h4> 장소와 시간 </h4> <hr>

                <div class="form-group">
                    <label class="col-sm-3 control-label"> 장소 </label>
                    <div class="col-sm-9">
                        <p class="form-control-static">
                            <?php if ($content['place'] != ''){
                                foreach($content['place'] as $place_){echo $place_."<br>";}
                            } else {
                                echo '장비 사용하지 않음';
                            }
                            ?>
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"> 리허설 </label>
                    <div class="col-sm-9">
                        <?php if(isset($time_rehearsal_from)):?>
                        <p class="form-control-static"> <?=$time_rehearsal_from?> ~ <?=$time_rehearsal_to?></p>
                        <?php else:?>
                        <p class="form-control-static"> 리허설이 없습니다. </p>
                        <?php endif;?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"> 행사 시간 </label>
                    <div class="col-sm-9">
                        <p class="form-control-static"> <?=$time_from?> ~ <?=$time_to?> </p>

                    </div>
                </div>

                <h4> 장비 </h4> <hr>
                <div class="form-group">
                    <label class="col-sm-3 control-label"> 사용 장비 </label>
                    <div class="col-sm-9">
                        <p class="form-control-static">
                            <?php if ($content['type_equipment'] != ''){
                                foreach($content['type_equipment'] as $equip){echo $equip."<br>";}
                            } else {
                                echo '장비 사용하지 않음';
                            }
                            ?>
                        </p>
                    </div>
                </div>

                <h4> 음식물과 보증금 </h4> <hr>
                <div class="form-group">
                    <label class="col-sm-3 control-label"> 음식물 </label>
                    <div class="col-sm-9">
                        <p class="form-control-static"> <?=$content['bring_food']?> </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"> 보증금 환급 계좌 </label>
                    <div class="col-sm-9">
                        <p class="form-control-static">
                            <?=$content['deposit']['bank']?> <?=$content['deposit']['account']?> <br>
                            예금주 <?=$content['deposit']['holder']?>
                        </p>
                    </div>
                </div>


                <h4> 예약자 </h4> <hr>
                <div class="form-group">
                    <label class="col-sm-3 control-label"> 예약자 학번 </label>
                    <div class="col-sm-9">
                        <p class="form-control-static"> <?=$reservation['reserver_id']?> </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"> 예약자 이름 </label>
                    <div class="col-sm-9">
                        <p class="form-control-static"> <?=$reservation['name']?> </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"> 예약자 전화번호 </label>
                    <div class="col-sm-9">
                        <p class="form-control-static"> <?=$reservation['phone']?> </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"> 예약자 이메일 </label>
                    <div class="col-sm-9">
                        <p class="form-control-static"> <?=$reservation['email']?> </p>
                    </div>
                </div>

                <h4> 예약 처리 </h4> <hr>
                <div class="form-group">
                    <label class="col-sm-3 control-label"> 예약 처리 </label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="state" value="grant"> 승인
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="state" value="reject"> 거절
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="state" value="wait"> 대기 중
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="reject-reason">거절 사유</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="reject-reason" placeholder="<?=$reservation['reject_reason']?>">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> 닫기 </button>
                <button type="button" class="btn btn-primary" ng-click="update(<?=$reservation['id']?>)"> 처리 </button>
            </div>
        </div>
    </div>
</div>
