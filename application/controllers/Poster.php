<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Poster Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 * 
 */

class Poster extends CI_Controller {
    public function index(){
		$this->load->view('head');
		$this->load->view('global-nav');
		$this->load->view('intro/poster');
		$this->load->view('footer');
	}
    public function register(){
        $this->load->view('head');
        $this->load->view('global-nav');
        $this->load->view('poster_register');
        $this->load->view('footer');
    }
}
