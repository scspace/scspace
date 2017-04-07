<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Lost Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 * 
 */

class Lost extends CI_Controller {

	public function index(){
        $this->load->database();
		$this->load->model('lost_model');
        $articles = $this->lost_model->get()->result_array();

        $this->load->view('head');
		$this->load->view('global-nav');
        $this->load->view('lost',array('articles' => $articles));
        $this->load->view('footer');
	}

}
