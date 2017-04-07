<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Api Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 *
 */

class Api extends CI_Controller {

	/**
	 * 책다방 책 전체 목록을 json 형식으로 제공
	 *
	 * @link GET /api/book
	 *
	 */

	public function book(){
		$this->load->database();
		$this->load->model('book_model');
		$books = $this->book_model->get();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($books, JSON_HEX_APOS));
	}


	/**
	 *
	 * 예약 현황 캘린더 페이지에서 주고받는 다양한 데이터를 처리
	 *
	 */

	public function calendar($action){
		$this->load->database();
		switch($action) {

			/**
			 *
			 * 유저가 피아노실, 개인연습실에 예약을 할 때 시간 확인 버튼을 누르면
			 * 해당 시간에 예약이 있는지 확인해서 json으로 반환
			 *
			 * @usage	/static/js/form/piano-room.js
			 *			/static/js/form/individual-practice-room.js
			 *
			 * @link	POST /api/calendar/validate
			 */

			case 'validate':
				$this->load->driver('space');

				$data = json_decode(file_get_contents('php://input'), TRUE);
				$space = $this->space->space_to_name($this->input->post('space'));
				$validity = $this->space->$space->validate();

				if ($validity === TRUE){
					$result = array('status' => 'valid');
				} else {
					$result = array('status' => 'invalid', 'message' => $validity);
				}
				break;


			/**
			 *
			 * 예약 현황 페이지에서 예약 목록을 가져옴
			 *
			 * @usage	/static/js/state/*.js
			 *
			 * @link	POST /api/calendar/get
			 */

			case 'get':
				$this->load->model('calendar_model');
				$request = json_decode(file_get_contents('php://input'), TRUE);
				$result = $this->calendar_model->get($request['space']);
				break;


			/**
			 *
			 * 관리 화면에서 예약을 임의로 만듬
			 *
			 * @usage	/static/js/manage/*.js
			 *
			 * @link	POST /api/calendar/make
			 */

			case 'make':
				$this->load->model('calendar_model');
				$this->calendar_model->make($_POST['space'],$_POST['title'], $_SESSION['student_id'],$_POST['time_from'],$_POST['time_to'],$_POST['type'],'grant');
				$result = '';
				break;


			/**
			 *
			 * 관리 화면에서 예약을 업데이트
			 *
			 * @usage
			 *
			 * @link	POST /api/calendar/update
			 */

			case 'update':
				$this->load->model('calendar_model');
				$this->calendar_model->update();
				$result = '';
				break;


			/**
			 *
			 * 관리 화면에서 예약을 삭제
			 *
			 * @usage
			 *
			 * @link	POST /api/calendar/delete
			 */

			case 'delete':
				$this->load->model('calendar_model');
				$this->calendar_model->delete();
				$result = '';
				break;
		}
		$this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result, JSON_HEX_APOS));
	}
}
