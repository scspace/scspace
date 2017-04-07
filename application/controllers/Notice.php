<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Notice Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 * 
 */

class Notice extends CI_Controller {

	public function index(){
		$this->load->database();
		$this->load->model('notice_model');
		$notices = $this->notice_model->get('all');

		$this->lang->load('general','korean');

        $this->load->view('head');
		$this->load->view('global-nav');

        $this->load->view('notice',array('notices'=>$notices));
		$angulars = array('pagination/pagination');
        $this->load->view('footer',array('angulars'=>$angulars));
	}

	public function view($id){
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('notice_model');
		$notice = $this->notice_model->view($id);
		$this->load->library('markdown');

		$this->load->view('head');
		$this->load->view('global-nav');
		$this->load->view('notice_view',array('notice'=>$notice));
		$this->load->view('footer');
	}

	public function write(){
		if (!isset($_SESSION['type']) || $_SESSION['type'] != 'admin'){
			show_404();
		}
		$this->load->view('head');
		$this->load->view('global-nav');
		$this->load->view('notice_write');
		$this->load->view('footer');
	}

	public function write_process(){
		if (!isset($_SESSION['type']) || $_SESSION['type'] != 'admin'){
			show_404();
		}
		$this->load->database();
		$this->load->model('notice_model');
		$this->notice_model->write();

		header('Location: /notice');
	}

	public function update($id){
		if (preg_match('/^[0-9]+$/',$id) == 0) show_404();
		if (!isset($_SESSION['type']) || $_SESSION['type'] != 'admin'){
			show_404();
		}
		$this->load->database();
		$this->load->model('notice_model');
		$notice = $this->notice_model->view($id);

		$this->load->view('head');
		$this->load->view('global-nav');
		$this->load->view('notice_update', array('notice'=>$notice));
		$this->load->view('footer');
	}

	public function update_process(){
		if (!isset($_SESSION['type']) || $_SESSION['type'] != 'admin'){
			show_404();
		}
		$this->load->database();
		$this->load->model('notice_model');
		$this->notice_model->update();

		header('Location: /notice/view/'.$_POST['id']);
	}

	public function delete($id){
		if (!isset($_SESSION['type']) || $_SESSION['type'] != 'admin'){
			show_404();
		}
		$this->load->database();
		$this->load->model('notice_model');
		$this->notice_model->delete($id);

		header('Location: /notice');
	}
}
