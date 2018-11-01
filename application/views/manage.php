<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function spaceToName($space){
	if (in_array($space, array('piano_room_1','piano_room_2'))) return 'piano-room';
	if (in_array($space, array('individual_practice_room_1','individual_practice_room_2','individual_practice_room_3'))) return 'individual-practice-room';
	if (in_array($space, array('seminar_room_1','seminar_room_2'))) return 'seminar-room';
	return str_replace('_','-',$space);
}

?>
<main class="container" ng-app="manage" ng-controller="ManageController">
	<h2>  최신 예약신청 목록  <small><a href="/manage/reservation"> <?=$no?>개 대기 중 </a></small></h2>
	<hr>
	<input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
	<table class="table table-hover">
		<thead class="hidden-xs">
			<tr>
	            <th> 공간 </th>
				<th> 예약자 </th>
				<th> 예약 di </th>
				<th> 시간 </th>
				<th> 예약한 시간 </th>
				<th> 상태 </th>
			</tr>
		</thead>
		<tbody>
			<?php
			date_default_timezone_set('Asia/Seoul');
			foreach ($reservations as $reservation):
				$time_from = date_create_from_format('Y-m-d H:i:s',$reservation['time_from'])->format('m월 d일 H:i');
				$time_to = date_create_from_format('Y-m-d H:i:s',$reservation['time_to'])->format('m월 d일 H:i');
				$time_request = date_create_from_format('Y-m-d H:i:s',$reservation['time_request'])->format('m월 d일 H:i');
				$state = $reservation['state'];
				switch($state){
					case 'grant':
						$color = 'green';
						break;
					case 'reject':
						$color = 'red';
						break;
					case 'wait':
						$color = 'yellow';
						break;
					default:
						$color = 'red';

				}
				?>
			<tr id="row<?=$reservation['id']?>" class="pointer" data-toggle="modal" data-target="#<?=$reservation['id']?>">
				<td class="hidden-xs"><?=$this->lang->line($reservation['space'])?></td>
				<td class="hidden-xs"><?=$reservation['name']?></td>
				<td class="hidden-xs"><?=$reservation['id']?></td>
				<td class="hidden-xs"><?=$time_from?> ~ <?=$time_to?></td>
				<td class="hidden-xs"><?=$time_request?></td>
				<td class="state hidden-xs"><span class="<?=$color?> circle"></span><?=$this->lang->line($reservation['state'])?></td>
				<td class="visible-xs">
					<?=$this->lang->line($reservation['space'])?> <br>
					<?=$time_from?>	~ <?=$time_to?> <br>
					<?=$reservation['name']?> · <?=$time_request?> <br>
					<span class="state">
						<span class="<?=$color?> circle"></span>
						<?=$this->lang->line($reservation['state'])?>
					</span>
				</td>
			</tr>
			<?php
			$this->load->view('modal/'.spaceToName($reservation['space']), array('reservation'=>$reservation));
			endforeach;?>
		</tbody>
	</table>

	<h2> 최신 문의 목록 </h2>
	<hr>
	<table class="table table-hover">
		<thead>
			<tr>
	            <th> 태그 </th>
				<th> 제목 </th>
				<th> 글쓴이 </th>
				<th> 글쓴 때 </th>
				<th> 처리상태 </th>
			</tr>
		</thead>
		<tbody>
			<?php

			foreach ($asks as $ask){
				$tags = json_decode($ask->tag);
				echo '<tr onclick="location.href=\'/ask/view/'.$ask->id.'\'">';
	            echo '<td>'.$this->lang->line($tags->place).' '.$this->lang->line($tags->type).'</td>';
				echo '<td>'.$ask->title.'</td>';
				echo '<td>'.$ask->writer_id.'</td>';
				echo '<td>'.$ask->time_post.'</td>';
				echo '<td>'.$ask->state.'</td>';
				echo '</tr>';
			}

			?>
		</tbody>
	</table>

	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-6">
				<ul class="list-unstyled">
					<li> <h4>관리 1팀</h4>  </li>
					<hr>
					<li> <strong> 공연홀 관리 </strong> </li>
					<li> <a href="/manage/reservation/ullim-hall"> 울림홀 관리 </a> </li>
					<li> <a href="/manage/reservation/mirae-hall"> 미래홀 관리 </a> </li>
					<hr>
					<li> <strong> 음악실 관리 </strong></li>
					<li> <a href="/manage/reservation/group-practice-room"> 합주실 관리 </a> </li>
					<li> <a href="/manage/reservation/individual-practice-room"> !개인연습실 관리 </a> </li>
					<li> <a href="/manage/reservation/piano-room"> !피아노실 관리 </a> </li>
					<hr>
					<li> <a href="/manage/team"> 합주실 팀 목록 </a> </li>
					<li> <a href="/manage/deposit-account"> 보증금 계좌 수정 </a> </li>
					<li> 근로학생 목록 수정 </li>
				</ul>
	    	</div>
			<div class="col-xs-6">
				<ul class="list-unstyled">
					<li> <h4>관리 2팀</h4> </li>
					<hr>
					<li> <a href="/manage/reservation/open-space"> 오픈스페이스 관리 </a> </li>
					<li> <a href="/manage/reservation/seminar-room"> 세미나실 관리 </a> </li>
					<li> <a href="/manage/reservation/dance-studio"> 무예실 관리 </a> </li>
					<li> <a href="/manage/reservation/multipurpose-room"> 다용도실 관리 </a> </li>
				</ul>
	    	</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="col-xs-6">
				<ul class="list-unstyled">
					<li> <h4> 책다방팀 </h4> </li>
					<hr>
					<li> <a href="/manage/reservation/bookdabang"> 책다방 관리 </a> </li>
					<li> 책다방 책 목록 수정 </li>
					<li> 추천도서 수정 </li>
				</ul>
	    	</div>
			<div class="col-xs-6">
				<ul class="list-unstyled">
					<li><h4>기타업무</h4>  </li>
					<hr>
					<li> <a href="/notice/write"> 공지사항 작성하기 </a> </li>
					<li> 공간사용규칙 수정 </li>
					<li> 위원 정보 업데이트 </li>
					<li> 문의사항 </li>
					<li> <a href="/manage/lost"> 분실물 </a> </li>
					<li> 게시물 신고대장 </li>
				</ul>
	    	</div>
		</div>
	</div>
	<!--<?=ENVIRONMENT?>-->
</main>
