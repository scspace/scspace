<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Ask Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 *
 */

class Ask extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->helper(array('form', 'url'));
	}

	/**
	 *
	 * 문의 사항 목록
	 *
	 * @link	POST /ask
	 */

	public function index(){
		$this->lang->load('general','korean');
		$this->load->database();
		$this->load->model('ask_model');
		$asks = $this->ask_model->get();

		$this->lang->load('general','korean');

        $this->load->view('head', array(
			'title' => '문의사항 | 학생문화공간위원회',
			'description' => '최신 문의사항을 조회하세요'
		));
		$this->load->view('global-nav');

		$pagination = $this->pagination();
		$this->load->view('ask',array('asks'=>$asks,'pagination'=>$pagination));

        $this->load->view('footer');
	}


	/**
	 *
	 * 문의 사항 목록에서 1, 2, 3 페이지를 보여줌
	 *
	 * @link	POST /ask/list/{number}
	 */

	public function list($page = 0){
		$this->load->database();
		$this->load->model('ask_model');
		$asks = $this->ask_model->get($page);

		$this->lang->load('general','korean');

        $this->load->view('head', array(
			'title' => '문의사항 | 학생문화공간위원회',
			'description' => '최신 문의사항을 조회하세요'
		));
		$this->load->view('global-nav');

		$pagination = $this->pagination();
		$this->load->view('ask',array('asks'=>$asks,'pagination'=>$pagination));

		$this->load->view('footer');
	}


	/**
	 *
	 * 문의 사항의 페이지네이션 (목록을 나눠놓은 아래쪽의 숫자들) 을 제공
	 *
	 */

	private function pagination(){
		$this->load->library('pagination');

		$config['base_url'] = '/ask/list/';
		$config['total_rows'] = $this->ask_model->count();
		$config['per_page'] = 10;

		$config['full_tag_open'] = '<div class="page">';
		$config['full_tag_close'] = '</div>';
		$config['first_link'] = ' « ';
		$config['last_link'] = ' » ';
		$config['next_link'] = FALSE;
		$config['prev_link'] = FALSE;
		$config['num_tag_open'] = ' ';
		$config['num_tag_close'] = ' ';

		$config['cur_tag_open'] = '<span class="current">';
		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}


	/**
	 *
	 * 개별 문의사항을 보여줌
	 *
	 * @link	POST /ask/view/{number}
	 */

	public function view($id){
		$this->load->library('markdown');
		$this->load->database();
		$this->load->model('ask_model');
		$ask = $this->ask_model->view($id);
		$comments = $this->ask_model->get_comments($id);

		$this->lang->load('general','korean');

		$this->load->view('head');
		$this->load->view('global-nav');
		$this->load->view('ask_view',array('id'=>$id,'ask'=>$ask,'comments'=>$comments));
		$this->load->view('footer');
	}


	/**
	 *
	 * 문의사항을 작성화면을 보여줌
	 * 로그인이 돼 있지 않은 경우 로그인 페이지로 리다이렉트
	 *
	 * @link	POST /ask/write
	 * @todo	로그인 후 다시 문의하기 페이지로 보내주기
	 */

	public function write(){
		$this->lang->load('general','korean');
		if (!isset($_SESSION['type'])){
			$this->load->helper('url');
			echo '<script type="text/javascript">alert("먼저 로그인해 주세요.");location.href="/login_error";</script>';
		}

		$this->load->view('head');
		$this->load->view('global-nav');
		$this->load->view('ask_write', array('error' => ' ' ));
		$this->load->view('footer');
	}


	/**
	 *
	 * 문의사항 작성
	 *
	 * @link	POST /ask/write_process
	 */

	public function write_process(){
		$this->load->database();
		$this->load->model('ask_model');

		$image_data = NULL;
		if($_FILES['image']['name']!=''){
			$config['upload_path']          = 'uploads/image/ask';
	        $config['allowed_types']        = 'gif|jpg|jpeg|png';
	        $config['max_size']             = 10000;
	        $config['max_width']            = 10240;
	        $config['max_height']           = 10240;
			$config['encrypt_name']         = TRUE;

	        $this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')){
				show_error('something wrong');
			} else{
				$image_data = $this->upload->data();
			}
		}
		$this->ask_model->write($image_data);
		$this->load->helper('url');
		redirect('/ask');
	}


	/**
	 *
	 * 문의사항 댓글 작성
	 *
	 * @link	POST /ask/write_comment/{number}
	 */

	public function write_comment($id){
		$this->load->database();
		$this->load->model('ask_model');
		$this->ask_model->write_comment($id);

		header('Location: /ask/view/'.$id);
	}


	/**
	 *
	 * 문의사항에 관리자로 댓글 작성
	 *
	 * @link	POST /ask/write_comment_admin/{number}
	 */

	public function write_comment_admin($id){
		$this->load->database();
		$this->load->model('ask_model');
		$this->ask_model->write_comment_admin($id);

		header('Location: /ask/view/'.$id);
	}


	/**
	 *
	 * 문의사항 삭제
	 *
	 * @link	POST /ask/delete/{number}
	 */

	public function delete($id){
		if (!isset($_SESSION['type']) || $_SESSION['type'] != 'admin'){
			show_404();
		}
		$this->load->database();
		$this->load->model('ask_model');
		$this->ask_model->delete($id);

		header('Location: /ask');
	}


	/**
	 *
	 * 문의사항 댓글 삭제
	 *
	 * @link	POST /ask/comment/delete/{number}
	 */

	public function comment($action, $id){
		if($action == 'delete'){
			if (!isset($_SESSION['type']) || $_SESSION['type'] != 'admin'){
				show_404();
			}
			$this->load->database();
			$this->load->model('ask_model');
			$ask_id = $this->ask_model->delete_comment($id);
		}
		header('Location: /ask/view/'.$ask_id);
	}
}
