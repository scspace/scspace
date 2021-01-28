<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Login Controller Class
 *
 * @author Yujin Kim <yujin.gaya@gmail.com>
 * @copyright Copyright (c) 학생문화공간위원회
 *
 */

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
			redirect('https://iam.kaist.ac.kr/iamps/requestLogin.do');
		}
	}

	public function process(){
		$this->load->helper('cookie');
		$cookie_value = get_cookie('SATHTOKEN', TRUE);
		$this->config->load('iam-key');
		$key = $this->config->item('iam_key');;

		$xml = '
			<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://server.com">
				<soapenv:Header/>
				<soapenv:Body>
					<ser:verification>
						<cookieValue>'.$cookie_value.'</cookieValue>
						<publicKeyStr>'.$key.'</publicKeyStr>
					</ser:verification>
				</soapenv:Body>
			</soapenv:Envelope>
		';
		$url = 'https://iam.kaist.ac.kr/iamps/services/singlauth';

		$SoapClient = new SoapClient(NULL, array('location'=> $url,'uri'=>''));
		$response = $SoapClient->__doRequest($xml, $url, '', 2);
		$clean_xml = str_ireplace(['ns2:', 'SOAP:'], '', $response);
		$xml = simplexml_load_string($clean_xml);

		$return = $xml->Body->verificationResponse->return;

		$name = (string)$return->ku_kname;
		$student_id = (string)$return->ku_std_no;
		$email = (string)$return->mail;
		$phone = (string)$return->mobile;

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
