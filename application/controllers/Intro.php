<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Intro Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 *
 */

class Intro extends CI_Controller {

    public function space($space){
		$this->lang->load('general','korean');
		$this->load->library('user_agent');

        $this->load->view('head');
		$this->load->view('global-nav');
        $this->load->view('intro/'.$space,array('space'=>$space));
        $this->load->view('footer');

    }

	public function committee(){
		$this->load->view('head');
		$this->load->view('global-nav');
        $this->load->view('intro/committee');
        $this->load->view('footer');
	}
	public function business(){
		$this->load->view('head');
		$this->load->view('global-nav');
        $this->load->view('intro/business');
        $this->load->view('footer');
	}
	public function member(){
		$this->load->view('head');
		$this->load->view('global-nav');
		$this->load->view('intro/member');
		$this->load->view('footer');
	}
	public function story(){
		$this->load->view('head');
		$this->load->view('global-nav');
		$this->load->view('intro/story');
		$this->load->view('footer');
	}
	public function center(){
		$this->load->view('head');
		$this->load->view('global-nav');
		$this->load->view('intro/center');
		$this->load->view('footer');
	}
	public function history(){
		$this->load->view('head');
		$this->load->view('global-nav');
		$this->load->view('intro/history');
		$this->load->view('footer');
	}
	public function statistics(){
		$this->load->database();
		$this->load->model('reservation_model');
		$statistics = $this->reservation_model->get_num_space();

		$this->load->view('head');
		$this->load->view('global-nav');
		$this->load->view('intro/statistics',
			array(
				'statistics' => $statistics,
			)
		);
		$this->load->view('footer',
			array(
				'js' => array(
					'https://d3js.org/d3.v3.min.js',
					'/static/js/statistics.js'
				)
			)
		);
	}
	public function event(){
		$this->load->view('head');
		$this->load->view('global-nav');
		$this->load->view('intro/event');
		$this->load->view('footer');
	}
}
