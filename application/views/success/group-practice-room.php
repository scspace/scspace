<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$space_name = $this->lang->line($reservation['space']);
if ($reservation['space'] !== 'group_practice_room') show_404();
$content = json_decode($reservation['content'], TRUE);

$time_from = date_create_from_format('Y-m-d H:i:s',$reservation['time_from'])->format('n월 j일 G:i');
$time_to = date_create_from_format('Y-m-d H:i:s',$reservation['time_to'])->format('n월 j일 G:i');
$time_request = date_create_from_format('Y-m-d H:i:s',$reservation['time_request'])->format('n월 j일 G:i');
?>
<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/group-practice-room"> 합주실 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/group-practice-room/state"> 예약 현황 </a></li>
            <li><a href="/group-practice-room/reservation"> 예약하기 </a></li>
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
                합주실 예약 신청이 완료되었습니다.
            <?php endif?>
        </h3>

        <h4> 단체와 행사 </h4> <hr>
        <div class="form-group">
            <label class="col-sm-3 control-label"> 팀 이름 </label>
            <div class="col-sm-9">
                <p class="form-control-static"> <?=$content['team_name']?> </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label"> 연습 내용 </label>
            <div class="col-sm-9">
                <p class="form-control-static">
                    <?=$content['content']?>
                </p>
            </div>
        </div>

        <h4> 시간 </h4> <hr>
        <div class="form-group">
            <label class="col-sm-3 control-label"> 연습 시간 </label>
            <div class="col-sm-9">
                <p class="form-control-static"> <?=$time_from?> ~ <?=$time_to?> </p>
            </div>
        </div>

        <h4> 예약자 </h4> <hr>
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
                    if ($state == 'grant'):
                    ?>
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
                    <a href="/group-practice-room/delete/<?=$reservation['id']?>" type="button" class="btn btn-danger"> 예약 취소 </a>
                  </div>
                </div>
              </div>
            </div>
        <?php endif;?>
    </div>
</main>
