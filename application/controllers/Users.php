<?php

class Users extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Seller_model');
		$this->load->model('Listing_model');
		$this->load->model('Notification_model');

		//$this->load->model('Notification_model');
		$this->load->helper('form');
		$this->load->helper('url_helper');
		$this->load->library('session');
	}



// CREATE methods
	public function create($page='create'){
		// Extract the form the was sent through the post

	}


// READ methods
	public function index($page='home'){
		$data['flash'] = $this->session->userdata('flash');
		unset($_SESSION['flash']);

		// retrieve any stored user information from the session
		$data['user'] = $this->session->userdata('userId');
		$data['user_name'] = $this->session->userdata('userName');
		$data['user_seller'] = $this->session->userdata('sellerID');
		$data['notifications'] = $this->Notification_model->notificationCount($_SESSION['userId']);

		if(isset($_SESSION['sellerID']) and !empty($_SESSION['sellerID'])){
			$seller = $this->Seller_model->getSellerInfo($_SESSION['sellerID']);
			$data['sell_lat'] = $seller['lat'];
			$data['sell_lng'] = $seller['lng'];
		}

		// Need to retrieve the notification count for the specified user

		$this->load->view('templates/header');
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function about(){
		$this->load->view('templates/header');
		$this->load->view('users/about');
		$this->load->view('templates/footer');
	}

	/************** Display the User's profile page ********************************/
	public function show(){

		// Render the view
		$this->load->view('templates/header');
		$this->load->view('users/show');
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
				'sellerID' => $this->User_model->getUserSellerID($attempt),
				'flash' => ""
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
		$this->session->set_userdata("sellerID", "");
		echo json_encode("");
	}


	/*********** Create a new user page **************/
	public function signup(){
		
		// Render the page
		$this->load->view("templates/header");
		$this->load->view("users/signup");
		$this->load->view("templates/footer");
	}



	// UPDATE methods



	// DELETE methods

}