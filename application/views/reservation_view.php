<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="container">
    <h1> <?=$reservation->space?> <small> <?=$reservation->time_request?> </small></h1>
    <hr>
    <!-- Content -->
    <form class="form-horizontal">
        <!-- reserver -->
        <div class="form-group">
            <label for="reserver" class="col-sm-2 control-label"> 예약자 </label>
            <div class="col-sm-10">
                <p class="form-control-static"><?=$reservation->reserver_id?></p>
            </div>
        </div>

        <!-- Room Number Radio -->
        <div class="form-group">
            <label for="space" class="col-sm-2 control-label"> 공간 </label>
            <div class="col-sm-10">
                <p class="form-control-static">
                    <?=$reservation->space?>
                </p>
            </div>
        </div>

        <!-- Time -->
        <div class="form-group">
            <label for="time_from" class="col-sm-2 control-label"> 사용 시작 시간 </label>
            <div class="col-sm-10">
                <p class="form-control-static"><?=$reservation->time_from?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="time_to" class="col-sm-2 control-label"> 사용 끝 시간 </label>
            <div class="col-sm-10">
                <p class="form-control-static"><?=$reservation->time_to?></p>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"> 승인 </button>
                <button type="submit" class="btn btn-default"> 반려 </button>
            </div>
        </div>

    </form>


</div>
