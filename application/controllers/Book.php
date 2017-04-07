<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Book Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 *
 */

class Book extends CI_Controller {

	/**
	 * 책다방 책 목록을 보여주는 페이지
	 *
	 * @link 	/book
	 */

	public function index(){
		$this->load->database();
		$this->load->model('book_model');
		$books = $this->book_model->get();

		$this->lang->load('general','korean');

        $this->load->view('head', array(
			'title' => '책다방 책 목록',
			'description' => '책다방 책 목록을 조회하세요'
		));
		$this->load->view('global-nav');

		$this->load->view('book',array('books'=>json_encode($books, JSON_HEX_APOS)));

		$angulars = array('controller/bookController');
        $this->load->view('footer',array('angulars'=>$angulars));
	}

}
