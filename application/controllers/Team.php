<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Team Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 *
 */

class Team extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->lang->load('general','korean');
		if (!isset($_SESSION['type'])){
			echo "<script type='text/javascript'>alert('팀을 등록하기 위해 먼저 로그인해 주세요.');location.href='/login_error';</script>";
		}
		$this->load->database();
    }

	public function index(){
		show_404();
	}

	public function register($space){
		$this->load->model('setting_model');
		$deposit = $this->setting_model->get_deposit_account();

		$this->load->view('head');
		$this->load->view('global-nav');

		$this->load->view('/form/team/'.$space, array(
			'deposit' => $deposit
		));

		$angulars = array('controller/formController','service/FormValidator');
		$this->load->view('footer', array('angulars' => $angulars));
	}

    public function register_process(){
        $this->load->database();
		$this->load->model('team_model');
		$team_id = $this->team_model->register();
		header('Location: /group-practice-room/team/'.$team_id);
    }

	public function team($team_id){
		$this->load->view('head');
		$this->load->view('global-nav');

		$this->load->database();
		$this->load->model('team_model');
		$members = $this->team_model->get_members_of_team($team_id);
		$team = $this->team_model->get_team_info($team_id);
		$this->load->view('success/team',array(
			'members' => $members,
			'team' => $team
		));
		$this->load->view('footer');
	}
}
