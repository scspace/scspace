<main class="container">
	<h1> 피아노실 관리 </h1>
	<hr>
	<table class="table table-hover">
		<thead>
			<tr>
                <th> 공간 </th>
				<th> 예약자 </th>
				<th> 예약 시작 시간 </th>
				<th> 예약 끝 시간 </th>
				<th> 예약 등록 시간 </th>
				<th> 예약 처리 상태 </th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($reservations as $reservation):
				$format = 'n월 j일 G:i';

				$time_from = date_create_from_format('Y-m-d H:i:s',$reservation['time_from'])->format($format);
				$time_to = date_create_from_format('Y-m-d H:i:s',$reservation['time_to'])->format($format);
				$time_request = date_create_from_format('Y-m-d H:i:s',$reservation['time_request'])->format($format);
			?>
			<tr id="row<?=$reservation['id']?>" class="pointer" href="#" data-toggle="modal" data-target="#<?=$reservation['id']?>">
				<td><?=$this->lang->line($reservation['space'])?></td>
				<td><?=$reservation['reserver_id']?></td>
				<td><?=$time_from?></td>
				<td><?=$time_to?></td>
				<td><?=$time_request?></td>
				<td class="state"><?=$this->lang->line($reservation['state'])?></td>
			</tr>
			<?php
			$this->load->view('/modal/'.$space, array('reservation' => $reservation));
		 	endforeach;?>
		</tbody>
    </table>
</main>
