<?php

class Users extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Seller_model');
		$this->load->model('Listing_model');
		//$this->load->model('Notification_model');
		$this->load->helper('url_helper');
		$this->load->library('session');
	}

	public function index($page='home'){
		$this->load->helper('form');

		// retrieve any stored user information from the session
		$data['user'] = $this->session->userdata('userId');
		$data['user_name'] = $this->session->userdata('userName');
		$data['user_seller'] = $this->session->userdata('sellerID');

		// Need to retrieve the notification count for the specified user

		$this->load->view('templates/header');
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');
	}

	public function create($page='create'){
		$this->load->view('templates/header');
		$this->load->view('users/create');
		$this->load->view('templates/footer');
	}

	/*************** Login the user with the specified password and username **************/
	public function login(){
		// this controller method handles authentication and sets session variables accordingly
		$user = $this->input->post("user");
		$pass = $this->input->post("pass");
		// Call up the authentication method
		$attempt = $this->User_model->userAuth($user, $pass);
		if($attempt != -1){
			// User passed, record it in the session now
			$user_data = array(
				'userId' => $attempt,
				'userName' => $this->User_model->getUserName($attempt),
				'sellerID' => $this->User_model->getUserSellerID($attempt)
			);
			$this->session->set_userdata($user_data);	
			$data["access"]=0;
		}else{
			$data["access"]=$attempt;
		}
		echo json_encode($data);
	}

	/*********** Log the user out of the system and clear session data ***************/
	public function logout(){
		// Clears the session variables
		$this->session->set_userdata("userId","");
		$this->session->set_userdata("userName","");
		echo json_encode("");
	}

}