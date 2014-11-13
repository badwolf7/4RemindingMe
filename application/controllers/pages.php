<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('javascript');
		$this->load->model('carriers_model');
		// $this->load->library('session');
	}
	public function index($page = 'home'){
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['carriers'] = $this->carriers_model->get_carriers();
		$this->load->view('templates/head', $data);
		$this->load->view('templates/header');
		$this->load->view('index', $data);
		$this->load->view('templates/footer');
	}
	public function style($page = 'style'){
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$this->load->view('templates/head', $data);
		$this->load->view('templates/header');
		$this->load->view('style');
		$this->load->view('templates/footer');
	}
}