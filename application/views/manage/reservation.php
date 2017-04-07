<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function spaceToName($space){
	if (in_array($space, array('piano_room_1','piano_room_2'))) return 'piano-room';
	if (in_array($space, array('individual_practice_room_1','individual_practice_room_2','individual_practice_room_3'))) return 'individual-practice-room';
	if (in_array($space, array('seminar_room_1','seminar_room_2'))) return 'seminar-room';
	return str_replace('_','-',$space);
}
$kr_reservations = array();
for($i = 0;$i < count($reservations); $i++){
	$kr_reservations[$i]['id'] = $reservations[$i]['id'];
	$kr_reservations[$i]['space'] = $this->lang->line($reservations[$i]['space']);
	$kr_reservations[$i]['reserver_id'] = $reservations[$i]['name'];
	$kr_reservations[$i]['time_from'] = date_create_from_format('Y-m-d H:i:s',$reservations[$i]['time_from'])->format('m월 d일 H:i');
	$kr_reservations[$i]['time_to'] = date_create_from_format('Y-m-d H:i:s',$reservations[$i]['time_to'])->format('m월 d일 H:i');
	$kr_reservations[$i]['time_request'] = date_create_from_format('Y-m-d H:i:s',$reservations[$i]['time_request'])->format('m월 d일 H:i');

	switch($reservations[$i]['state']){
		case 'grant':
			$kr_reservations[$i]['state_color'] = 'green';
			$kr_reservations[$i]['state'] = $this->lang->line($reservations[$i]['state']);
			break;
		case 'reject':
			$kr_reservations[$i]['state_color'] = 'red';
			$kr_reservations[$i]['state'] = $this->lang->line($reservations[$i]['state']);
			break;
		case 'wait':
			$kr_reservations[$i]['state_color'] = 'yellow';
			$kr_reservations[$i]['state'] = $this->lang->line($reservations[$i]['state']);
			break;
	}
}
?>

<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/manage"> 관리 </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/manage"> 관리로 돌아가기 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container" ng-app="manage" ng-controller="ManageController">
	<div ng-init='reservations = <?=json_encode($kr_reservations, JSON_HEX_APOS | JSON_HEX_TAG | JSON_HEX_QUOT)?>'></div>
	<!--<?=json_last_error()?>-->
	<h4> 최신 예약신청 목록 </h4>
	<hr>
	<input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
	<div class="row">
		<div class="col-sm-offset-10 col-sm-2">
			<div class="input-group">
				<div class="input-group-btn">
					<button class="btn btn-default" type="button" name="button" ng-click="offsetDown()"> < </button>
				</div>
				<p class="form-control form-control-static text-center">{{offset}}</p>
				<div class="input-group-btn">
					<button class="btn btn-default" type="button" name="button" ng-click="offset = offset + 1"> > </button>
				</div>
			</div>

		</div>
	</div>
	<table class="table table-hover">
		<div class="visible-xs">
			<select ng-model="filter.space" class="form-control">
				<option value="{{undefined}}"> 전체 공간 </option>
				<option>피아노실 1</option>
				<option>피아노실 2</option>
				<option>개인연습실 1</option>
				<option>개인연습실 2</option>
				<option>개인연습실 3</option>
				<option>책다방</option>
				<option>합주실</option>
				<option>무예실</option>
				<option>다용도실</option>
				<option>세미나실 1</option>
				<option>세미나실 2</option>
				<option>울림홀</option>
				<option>미래홀</option>
				<option>오픈스페이스</option>
			</select>
			<select ng-model="filter.state" class="form-control">
				<option value="{{undefined}}"> 전체 상태 </option>
				<option>승인</option>
				<option>거절</option>
				<option>대기 중</option>
			</select>
		</div>
		<thead class="hidden-xs">
			<tr>
	            <th class="col-sm-2">
					<select ng-model="filter.space" class="form-control">
						<option value="{{undefined}}"> 전체 공간 </option>
						<option>피아노실 1</option>
						<option>피아노실 2</option>
						<option>개인연습실 1</option>
						<option>개인연습실 2</option>
						<option>개인연습실 3</option>
						<option>책다방</option>
						<option>합주실</option>
						<option>무예실</option>
						<option>다용도실</option>
						<option>세미나실 1</option>
						<option>세미나실 2</option>
						<option>울림홀</option>
						<option>미래홀</option>
						<option>오픈스페이스</option>
					</select>
				</th>
				<th class="col-sm-2"> 예약자 </th>
				<th class="col-sm-4"> 시간 </th>
				<th class="col-sm-2"> 예약한 시간 </th>
				<th class="col-sm-2">
					<select ng-model="filter.state" class="form-control">
						<option value="{{undefined}}"> 전체 상태 </option>
						<option>승인</option>
						<option>거절</option>
						<option>대기 중</option>
					</select>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="reservation in filtered_reservations = (reservations | filter : filter | orderBy : -state | limitTo : 10 : 10*(offset - 1))" id="row{{reservation.id}}" class="pointer" data-toggle="modal" data-target="#{{reservation.id}}">
				<td class="hidden-xs"> {{reservation.space}} </td>
				<td class="hidden-xs"> {{reservation.reserver_id}} </td>
				<td class="hidden-xs"> {{reservation.time_from}} ~ {{reservation.time_to}} </td>
				<td class="hidden-xs"> {{reservation.time_request}} </td>
				<td class="state hidden-xs"> <span class="{{reservation.state_color}} circle"></span>{{reservation.state}} </td>
				<td class="visible-xs">
					{{reservation.space}} <br>
					{{reservation.time_from}} ~ {{reservation.time_to}} <br>
					{{reservation.reserver_id}} · {{reservation.time_request}} <br>
					<span class="state">
						<span class="{{reservation.state_color}} circle"></span>
						{{reservation.state}}
					</span>
				</td>
			</tr>

			<?php
			foreach ($reservations as $reservation){
				$this->load->view('modal/'.spaceToName($reservation['space']), array('reservation'=>$reservation));
			}?>
		</tbody>
	</table>
</main>
