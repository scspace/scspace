<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Mypage Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 *
 */

class Mypage extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->lang->load('general','korean');
		if (!isset($_SESSION['type'])){
			echo "<script type='text/javascript'>alert('마이페이지에 접속하기 위해 먼저 로그인해 주세요.');location.href='/login';</script>";
		}
    }

	public function index(){
        $this->load->database();
        $this->load->view('head');
        $this->load->view('global-nav');
        $this->load->model('reservation_model');
        $reservations = $this->reservation_model->get_my_reservations();

		$this->load->model('team_model');
		$teams = $this->team_model->get_my_teams();

        $this->load->view('mypage',array(
			'reservations' => $reservations,
			'teams' => $teams
		));
        $this->load->view('footer',array('angulars'=>array('controller/mypage')));
	}
}
