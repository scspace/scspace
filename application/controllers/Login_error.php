<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Login_error Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 *
 */

class Login_error extends CI_Controller {

    public function index(){

        $this->load->view('head');
		$this->load->view('global-nav');
        $this->load->view('errors/login_error');
        $this->load->view('footer');

    }

}
