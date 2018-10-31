<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Welcome Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 *
 */

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->database();
		$this->load->model('notice_model');
		$notices = $this->notice_model->get(3);

		$this->lang->load('general','korean');
		$this->load->view('head');
		$this->load->view('global-nav');
		// $this->load->view('welcome', array('notices'=>$notices));
		print_r($this->session->all_userdata());
		$this->load->view('footer');
	}
}
