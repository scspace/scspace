<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Login Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 *
 */
class AES_128 {
	protected $AES_128_COMMON_KEY;	// request 암복호화 공통 키

	function __construct() {
		$this->AES_128_COMMON_KEY = "";
	}

	// 암복호화 공통 키 설정
	function setKey($aesKey) {
		$this->AES_128_COMMON_KEY = $aesKey;
	}

	function getEncryptData($strData) {
		// 암호화
		$encStr = $this->AES128encrypt($strData, $this->AES_128_COMMON_KEY);

		return $encStr;
	}

	function getDecryptData($encData) {
		// 복호화
		$decStr = $this->AES128decrypt($encData, $this->AES_128_COMMON_KEY);

		return $decStr;
	}

	// AES 128 Encrypt
	function AES128encrypt($requestData, $key) {
		// openssl 확장 필요
		$key = substr($key, 80, 16);
		
		return base64_encode(openssl_encrypt($requestData, 'AES-128-CBC', $key, true, $key));
	}

	// AES 128 Decrypt
	function AES128decrypt($responseData, $key) {
		// openssl 확장 필요
		$key = substr($key, 80, 16);

		return openssl_decrypt(base64_decode($responseData), 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $key);
	}
}

class Login extends CI_Controller {

	public function index(){

		$this->load->helper('url');
		$this->load->library('user_agent');

		$_SESSION['referer'] = $this->agent->referrer();
		// print_r($this->session->all_userdata());
		$this->session->mark_as_flash('referer');
		 print_r($_SESSION['referer']);
		if ($this->session->userdata('name') !== null){
			redirect($_SESSION['referer']);
		} else {

			
			$state = time();
			$_SESSION['state'] = $state;
			$location = 'https://iam2.kaist.ac.kr/api/sso/commonLogin?client_id=SCS';
			$location .= "&state=". $state;
			$location .= "&redirect_url=" . urlencode('https://scspace.kaist.ac.kr/login/process');
			header('Location:'.$location);
		}
	}

	public function process(){
		$secretID = 'MjA1NzRhN2FhMzg4ZTYzZjA0YjIzNmQ0OWYwN2RkYzllY2M2Y2Y4MDE3MGNkZWI3ZWIxNjRkMWZmODE0NDE0NA==';
			$this->load->helper('cookie');
	
			$success = $_POST['success'];
			$state = $_POST['state'];

			if(isset($_SESSION['state'])){
				$savedState = $_SESSION['state'];
				if ($savedState != $state){
					echo 'state가 일치하지 않습니다.';
					return;
				}
				unset($_SESSION['state']);
			}
	
			$stringForKey = $secretID.$state;
			$aes128 = new AES_128;
			// 암호화 키 설정
			$aes128->setKey($stringForKey);
	
			// kaistUid String
			$kaistUid = $_POST['k_uid'];
	
			// kaistUid String 복호화
			$kaistUid = $aes128->getDecryptData($kaistUid);
	
			// Json 객체 String
			$resultStr = $_POST['result'];
	
			// Json 객체 String 복호화
			$resultStr = $aes128->getDecryptData($resultStr);
	
			$result = json_decode($resultStr, true);
		
			// 사용자 정보
			$userInfofo = $result['dataMap']['USER_INFO'];	
	
	
			$name = $userInfofo['ku_kname'];
			$student_id = $userInfofo['ku_std_no'];
			$email = $userInfofo['mail'];
			$phone = $userInfofo['mobile'];
	
			$this->load->model('user_model');
			$type = $this->user_model->update($student_id, $name, $phone, $email);
	
			$session = array(
				'name' => $name,
				'student_id' => $student_id,
				'email' => $email,
				'phone' => $phone,
				'type' => $type
			);
	
			$this->session->set_userdata($session);
			$this->load->helper('url');
			redirect($_SESSION['referer']);
	}

	public function logout(){
		$this->load->helper('url');
		session_destroy();
		redirect($_SERVER['HTTP_REFERER']);

	}

}
