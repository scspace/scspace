<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function spaceToName($space){
	if (in_array($space, array('piano_room_1','piano_room_2'))) return 'piano-room';
	if (in_array($space, array('individual_practice_room_1','individual_practice_room_2','individual_practice_room_3'))) return 'individual-practice-room';
	if (in_array($space, array('seminar_room_1','seminar_room_2'))) return 'seminar-room';
	return str_replace('_','-',$space);
}

$tr_reservations = array();
for($i = 0;$i < count($reservations); $i++){
	$tr_reservations[$i]['id'] = $reservations[$i]['id'];
	$tr_reservations[$i]['space_name'] = $this->lang->line($reservations[$i]['space']);
    $tr_reservations[$i]['space'] = spaceToName($reservations[$i]['space']);
	$tr_reservations[$i]['reserver_id'] = $reservations[$i]['reserver_id'];
	$tr_reservations[$i]['time_from'] = date_create_from_format('Y-m-d H:i:s',$reservations[$i]['time_from'])->format('m월 d일 H:i');
	$tr_reservations[$i]['time_to'] = date_create_from_format('Y-m-d H:i:s',$reservations[$i]['time_to'])->format('m월 d일 H:i');
	$tr_reservations[$i]['time_request'] = date_create_from_format('Y-m-d H:i:s',$reservations[$i]['time_request'])->format('m월 d일 H:i');

	switch($reservations[$i]['state']){
		case 'grant':
			$tr_reservations[$i]['state_color'] = 'green';
			$tr_reservations[$i]['state'] = $this->lang->line($reservations[$i]['state']);
			break;
		case 'reject':
			$tr_reservations[$i]['state_color'] = 'red';
			$tr_reservations[$i]['state'] = $this->lang->line($reservations[$i]['state']);
			break;
		case 'wait':
			$tr_reservations[$i]['state_color'] = 'yellow';
			$tr_reservations[$i]['state'] = $this->lang->line($reservations[$i]['state']);
			break;
		case 'deleted':
			$tr_reservations[$i]['state_color'] = 'red';
			$tr_reservations[$i]['state'] = $this->lang->line($reservations[$i]['state']);
			break;
	}
}
?>
<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/mypage"> 마이페이지 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>
<main class="container" ng-app="mypage" ng-controller="MypageController">
    <div ng-init='reservations = <?=json_encode($tr_reservations,JSON_HEX_APOS|JSON_PRETTY_PRINT)?>'></div>
	<h4> 내 예약 목록 </h4> <hr>
    <div class="row">
		<div class="col-sm-offset-10 col-sm-2">
			<div class="input-group">
				<div class="input-group-btn">
					<button class="btn btn-default" type="button" name="button" ng-click="offsetDown()"> < </button>
				</div>
				<p class="form-control form-control-static text-center">{{offset}}</p>
				<div class="input-group-btn">
					<button class="btn btn-default" type="button" name="button" ng-click="offsetUp()"> > </button>
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
				<option>창작공방</option>
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
					<select ng-model="filter.space_name" class="form-control">
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
				<option>창작공방</option>
						<option>울림홀</option>
						<option>미래홀</option>
						<option>오픈스페이스</option>
					</select>
				</th>
				<th class="col-sm-5"> 시간 </th>
				<th class="col-sm-2"> 예약한 시간 </th>
				<th class="col-sm-2">
					<select ng-model="filter.state" class="form-control">
						<option value="{{undefined}}"> 전체 상태 </option>
						<option>승인</option>
						<option>거절</option>
						<option>대기 중</option>
					</select>
				</th>
                <th class="col-sm-1"> 신청서 </th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="reservation in (reservations | filter : filter | limitTo : 10 : 10*(offset - 1))">
				<td class="hidden-xs"> {{reservation.space_name}} </td>
				<td class="hidden-xs"> {{reservation.time_from}} ~ {{reservation.time_to}} </td>
				<td class="hidden-xs"> {{reservation.time_request}} </td>
				<td class="hidden-xs"> <span class="{{reservation.state_color}} circle"></span>{{reservation.state}} </td>
				<td class="visible-xs">
					{{reservation.space_name}} <br>
					{{reservation.time_from}} ~ {{reservation.time_to}} <br>
					{{reservation.time_request}} 에 예약함 <br>
					<span class="state">
						<span class="{{reservation.state_color}} circle"></span>
						{{reservation.state}}
					</span>
				</td>
                <td> <a href="/{{reservation.space}}/form/{{reservation.id}}"> <span class="glyphicon glyphicon-link"></span> </a> </td>
			</tr>
		</tbody>
	</table>
	<h4> 내 합주실 팀 </h4> <hr>
	<table class="table table-hover">
		<thead>
			<tr>
				<th> 팀 </th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($teams as $team)?>
			<tr>
				<td> <a href="/group-practice-room/team/<?=$team['team_id']?>"> <?=$team['team_name']?></a> </td>
			</tr>

		</tbody>
	</table>
</main>
