<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('date');
		$this->load->database();
	}
	public function sendMsg(){
		echo 'sendMsg running';
		if(!empty($_POST)){
			$messages = array(
				'id' => '',
				'userId' => 'NULL',
				'message' => $_POST['message'],
				'when' => $_POST['dateTime'],
				'methodId' => $_POST['method'],
				'contact' => $_POST['contact']
			);

			$this->db->insert('messages', $messages);
		}else{
			$datestring = "%Y-%m-%d %h:%i";
			$gmt = time();
			$est = gmt_to_local($gmt, 'UM6', FALSE); // unix timestamp, timezone, daylight savings
			echo '<br>'.mdate($datestring, $est).'<br>';
			echo unix_to_human($est, TRUE, 'us').'<br>';
			echo 'nothing posted';
		}
	}
}
?>