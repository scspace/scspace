<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Manage Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 * 
 */

class Manage extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->lang->load('general','korean');
		if (!isset($_SESSION['type']) || $_SESSION['type'] != 'admin'){
			show_404();
		}
    }

	public function index(){
        $this->load->database();
		$this->load->driver('space');

		$this->load->model('reservation_model');
		$reservations = $this->reservation_model->get(NULL,4,0)->result_array();
		$no = $this->reservation_model->get_no_wait();

		$this->load->model('ask_model');
		$asks = $this->ask_model->get(0,4);

        $this->load->view('head');
		$this->load->view('global-nav');
        $this->load->view('manage',
			array('reservations' => $reservations,
				'asks' => $asks,
				'no' => $no));
		$angulars = array('manage/manage');
        $this->load->view('footer', array('angulars'=>$angulars));
	}

	public function reservation($space = NULL){
		$this->load->database();
		$this->load->model('reservation_model');

		switch ($space){
			case NULL:
				$reservations = $this->reservation_model->get(NULL)->result_array();
				$this->load->driver('space');
				$this->load->view('head');
				$this->load->view('global-nav');
				$this->load->view('manage/reservation', array('reservations'=>$reservations));
				$angulars = array('manage/reservation');
				$this->load->view('footer', array('angulars'=>$angulars));
				break;
			default:
				$this->load->model('user_model');

				$this->load->view('head');
				$this->load->view('global-nav');
				$this->load->view('manage/'.$space);
				$angulars = array('moment.min','calendar','fullcalendar.min','gcal','manage/'.$space);
				$this->load->view('footer', array('angulars'=>$angulars));
				break;
		}
	}

	public function update($subject){
		$this->load->database();

		$this->load->model('reservation_model');

		switch ($subject){

			case 'reservation-state':

				if ($_POST['state'] == 'reject'){
					$this->reservation_model->update($_POST['id'], $_POST['state'], $_POST['reject_reason']);
				} else {
					$this->reservation_model->update($_POST['id'], $_POST['state']);
				}
				break;
			default:
				break;
		}
	}

	public function deposit_account(){
		$this->load->view('head');
		$this->load->view('global-nav');

		$this->load->database();
		$this->load->model('setting_model');
		$account = $this->setting_model->get_deposit_account();
		$this->load->view('manage/deposit',array('account'=>$account));
		$this->load->view('footer');
	}

	public function deposit_account_process(){
		$this->load->database();
		$this->load->model('setting_model');
		$this->setting_model->update_deposit_account();

		$this->load->helper('url');
		redirect('/manage/deposit_update_success');
	}

	public function deposit_update_success(){
		$this->load->view('head');
		$this->load->view('global-nav');

		$this->load->database();
		$this->load->model('setting_model');
		$account = $this->setting_model->get_deposit_account();
		$this->load->view('success/deposit',array('account'=>$account));

		$this->load->view('footer');
	}

	public function team(){
		$this->load->view('head');
		$this->load->view('global-nav');

		$this->load->database();
		$this->load->model('team_model');
		$teams = $this->team_model->get();
		$this->load->view('manage/team',array('teams'=>$teams));

		$this->load->view('footer');
	}

	public function lost(){
		$this->load->database();
		$this->load->model('lost_model');
        $articles = $this->lost_model->get()->result_array();

		$this->load->view('head');
		$this->load->view('global-nav');
		$this->load->view('manage/lost',array('articles' => $articles));
		$this->load->view('footer');
	}

	public function lost_register(){
		$this->load->view('head');
		$this->load->view('global-nav');
		$this->load->view('manage/lost_register',array('error'=>''));
		$this->load->view('footer');
	}

	public function lost_process(){
		$config['upload_path']          = 'uploads/image/lost';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('head');
			$this->load->view('manage/lost', $error);
			$this->load->view('footer');
		} else {
			$this->load->database();
			$this->load->model('lost_model');
			$this->lost_model->register($this->upload->data());

			$this->load->helper('url');
			redirect('/lost');
		}
	}
}
