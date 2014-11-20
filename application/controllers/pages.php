<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('javascript');
		$this->load->model('carriers_model');
		$this->load->model('messages_model');
		$this->load->library('session');
	}
	public function index($page = 'home'){
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['carriers'] = $this->carriers_model->get_carriers();
		$logged_in = $this->session->userdata('logged_in');
		$data['logged_in'] = $logged_in;

		$this->load->view('index', $data);
	}
	public function style($page = 'style'){
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['logged_in'] = $this->session->userdata('logged_in');

		$this->load->view('style', $data);
	}
	public function dash($page = 'dashboard'){
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['carriers'] = $this->carriers_model->get_carriers();
		$logged_in = $this->session->userdata('logged_in');
		$data['logged_in'] = $logged_in;
		$data['messages'] = $this->messages_model->get_messages();
		$data['user'] = $this->session->userdata('username');

		if($logged_in){
			$this->load->view('dash', $data);
		}else{
			redirect('/', 'refresh');
		}
	}
}