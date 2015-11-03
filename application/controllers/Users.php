<?php

class Users extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Seller_model');
		$this->load->model('Listing_model');
		$this->load->helper('url_helper');
	}

	public function index($page='home'){
		$this->load->helper('form');

		$this->load->view('templates/header');
		$this->load->view('users/index');
		$this->load->view('templates/footer');
	}

	public function create($page='create'){
		$this->load->view('templates/header');
		$this->load->view('users/create');
		$this->load->view('templates/footer');
	}

}