<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Reservation Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 *
 */

class Reservation extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->lang->load('general','korean');
		if (!isset($_SESSION['type'])){
			echo "<script type='text/javascript'>alert('예약하기 위해서 먼저 로그인해 주세요.');location.href='/login';</script>";
		}
		$this->load->database();
    }

    public function space($space) {
		$this->lang->load('general','korean');

        $this->load->view('head');
		$this->load->view('global-nav');


		// 합주실은 합주실 팀 멤버와 함께 로드해서 실제 참여 여부를 조사
		if ($space == 'group-practice-room'){

			$this->load->model('team_model');
			$teams = json_encode($this->team_model->get_members());
			$this->load->view("form/".$space,array('space'=>$space, 'teams'=>$teams));


		// 보증금이 있는 공간은 보증금과 함께 로드
		} elseif (in_array($space, array('ullim-hall','mirae-hall','open-space'))) {

			$this->load->model('setting_model');
			$account = $this->setting_model->get_deposit_account();

			$this->load->view("form/".$space,array('space'=>$space, 'account'=>$account));


		// 나머지는 입력 폼만 로드
		} else {
			$this->load->view("form/".$space,array('space'=>$space));
		}

		// 폼 검증을 위한 라이브러리를 로드
		$angulars = array('form/'.$space,'service/FormValidator');
        $this->load->view('footer',array('angulars'=>$angulars));
    }

	public function reserve($space) {
		$space = str_replace('-','_',$space);

		$this->load->driver('space');

		if ( ! $this->space->is_space_name($space) ) show_404();

		// 예약 가능한지 조사해서 가능하면 예약, 불가능하면 불가능한 이유를 보여줌
		$validity = $this->space->$space->validate();
		if ($validity === TRUE){
			$id = $this->space->$space->make();
		} else {
			show_error($validity);
		}

		// 예약 성공 페이지로 리다이렉트
		$this->load->helper('url');
		$this->load->library('space');
		$name = $this->space->space_to_name($space);
		$name = str_replace('_', '-', $name);
		redirect('/'.$name.'/form/'.$id);
	}

	// 예약 결과 페이지
	public function form($space, $id) {

		$this->load->helper('url');
		$this->load->model('reservation_model');
		$reservation = $this->reservation_model->get_id($id);

		$this->load->model('setting_model');
		$deposit = $this->setting_model->get_deposit_account();

		$this->lang->load('general','korean');

		$this->load->view('head');
		$this->load->view('global-nav');

		$this->load->view('success/'.$space, array(
			'reservation'=>$reservation,
			'deposit'=>$deposit
		));

		$this->load->view('footer');
	}

	// 예약 취소
	public function delete($space, $id) {

		// 관련 예약 정보를 조회
		$this->load->model('reservation_model');
		$reservation = $this->reservation_model->get_id($id);

		if ($_SESSION['student_id'] != $reservation['reserver_id']) {
			show_404();
			return;
		}

		$this->reservation_model->delete($id);

		// 내 예약 페이지로 리다이렉트
		// 예약 성공 페이지로 리다이렉트
		$this->load->helper('url');
		redirect('/mypage');

	}
}
