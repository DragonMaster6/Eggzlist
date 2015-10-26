<?php

class Users extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('url_helper');
	}
	public function index($page='home'){
		$this->load->helper('form');
		$data['contacts'] = $this->User_model->getUsers();

		$this->load->view('templates/header');
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');
	}

	public function create($page='create'){
		$this->load->view('templates/header');
		$this->load->view('users/create');
		$this->load->view('templates/footer');
	}

}