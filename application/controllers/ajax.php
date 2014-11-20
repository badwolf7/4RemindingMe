<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('date');
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('string');
		$this->load->helper('security');
	}

	// Login
	public function login(){
		$login = array(
			'username' => $_POST['username'],
			'password' => $_POST['password']
		);

		$sessionData = array(
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'logged_in' => TRUE
		);
		$this->session->set_userdata($sessionData);
		$session_id = $this->session->userdata('session_id');
		if($session_id != ''){
			$response['status'] = 'success';
			$response['message'] = 'Your session is valid';
			echo json_encode($response);
		}else{
			$response['status'] = 'error';
			echo "session failed";
		}
	}

	// Register
	public function register(){
		// password retreival and hash
		$password = $_POST['password'];
		$hashedPass = do_hash(do_hash($password, 'md5')); // md5 then sha-1

		// generate random 16 character string
		$uuid = random_string('sha1');

		$newUser = array(
			'userId' => $uuid,
			'firstname' => $_POST['fname'],
			'lastname' => $_POST['lname'],
			'username' => $_POST['username'],
			'hashedPass' => $hashedPass
		);

		$this->db->where('username', $_POST['username']);
		$query = $this->db->get('users');
		$matchResult = $query->result_array();
		if($query->num_rows() > 0){
			echo 'username exists';
			echo $matchResult[0]['firstname'];
			$response['status'] = 'error';
		}else{
			// insert new user into the db
			$this->db->insert('users', $newUser);

			$sessionData = array(
				'username' => $newUser['username'],
				'password' => $password,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sessionData);
			$session_id = $this->session->userdata('session_id');
			if($session_id != ''){
				// Message was sent
				$response['status'] = 'success';
				$response['message'] = 'Created User';
				echo json_encode($response);
			}else{
				$response['status'] = 'error';
				echo "session failed";
			}	
		}
	}

	// Logout
	public function logout(){
		$sessionData = array(
			'email' => '',
			'password' => '',
			'logged_in' => FALSE
		);
		$this->session->set_userdata($sessionData);

		$response['status'] = 'success';
		$response['message'] = "You're logged out";
		echo json_encode($response);
	}

	// Send Message - text and email
	public function sendMsg(){
		$datestring = '%Y-%m-%d %h:%i:%a';
		if($_POST['method'] == 1){
			// Remove non-numeric characters from phone number
			$_POST['contact'] = preg_replace('/\D/', '', $_POST['contact']);
		}
		$time = time();

		if(!empty($_POST)){
			// put data in array for loading into db
			$messages = array(
				'id' => '',
				'timestamp' => $_POST['now'],
				'userId' => $_POST['username'],
				'message' => $_POST['message'],
				'when' => $_POST['dateTime'],
				'methodId' => $_POST['method'],
				'contact' => $_POST['contact'],
				'ipAddress' => $_SERVER['REMOTE_ADDR']
			);
			// insert data into messages table
			$this->db->insert('messages', $messages);
			
			// send text
			$config = Array(
				'protocol'=>'smtp',
				'smtp_host'=>'ssl://smtp.gmail.com',
				'smtp_port'=>'465',
				'smtp_user'=>'4remindingme@gmail.com',
				'smtp_pass'=>'asl1411tardis',
				'mailtype'=>'text',
				'charset'=>'utf-8',
				'wordwrap'=>TRUE
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('4remindingme@gmail.com', '4RemindingMe');
			if($_POST['method'] == '1'){
				// If 1 (text) - send text
				$this->email->to($_POST['contact'].$_POST['carrier']);
			}else{
				// If 2 (text) - send email
				$this->email->to($_POST['contact']);
			}
			$this->email->message($_POST['message']);
			if(!$this->email->send()){
				// Message did not send
				$response['status'] = 'error';
				show_error($this->email->print_debugger());
			}else{
				// Message was sent
				$response['status'] = 'success';
				$response['message'] = 'Your email has been sent';
				echo json_encode($response);
			}
		}else{
			echo '<h2>Sorry</h2><h3>Dead End</h3><p>Sorry, nothing was posted</p>';
		}
	}
}
?>