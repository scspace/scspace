<?php
$format = 'n월 j일 G:i';
$content = json_decode($reservation['content'], TRUE);

$that = $this;
$format = function($time) use ($that) {
    $time = date_create_from_format('U',$that->space->toStamp($time));
    $time->setTimeZone(new DateTimeZone('Asia/Seoul'));
    return $time->format('n월 j일 G:i');
};

$time_from = $format($reservation['time_from']);
$time_to = $format($reservation['time_to']);
$time_request = $format($reservation['time_request']);
?>
<div class="modal fade" id="<?=$reservation['id']?>" tabindex="-1" role="dialog" aria-labelledby="<?=$reservation['id']?>">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="<?=$reservation['id']?>"> 다용도실 </h4>
			</div>
			<div class="modal-body form-horizontal">
				<h4> 단체와 행사 </h4> <hr>
                <div class="form-group">
                    <label class="col-sm-3 control-label"> 단체 이름 </label>
                    <div class="col-sm-9">
                        <p class="form-control-static"> <?=$content['team_name']?> </p>
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
                        <p class="form-control-static"> <?=$content['entry']?> </p>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-3 control-label"> 행사 내용 </label>
                    <div class="col-sm-9">
                        <p class="form-control-static"> <?=$content['content']?> </p>
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
