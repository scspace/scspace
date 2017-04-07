<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * State Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 * 
 */

class State extends CI_Controller {

	public function index(){
		show_404();
	}

    public function space($space){
		$this->load->database();
		$this->lang->load('general','korean');

		$this->load->model('reservation_model');
		$reservations = $this->reservation_model->get($space)->result();
		$this->lang->load('general','korean');

        $this->load->view('head');
		$this->load->view('global-nav');
        $this->load->view('state', array('space'=>$space,
			'reservations'=>$reservations));

		$angulars = array('moment.min','calendar','fullcalendar.min','gcal','state/'.$space);
        $this->load->view('footer',array('angulars'=>$angulars));
    }
}
