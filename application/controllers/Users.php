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
		$user['fname'] = $this->input->post('fname');
		$user['lname'] = $this->input->post('lname');
		$user['dname'] = $this->input->post('dname');
		$user['email'] = $this->input->post('email');
		$user['phone'] = $this->input->post('phone');
		$user['pass'] = $this->input->post('pass');
		$user['type'] = $this->input->post('user_type');

		// determine if the user just wants to be a buyer or a seller
		if($user['type'] == 'seller'){
			// extract the seller input fields
			$seller['numChick'] = $this->input->post('numChick');
			$seller['feed'] = $this->input->post('feed');
			$seller['eggrate'] = $this->input->post('eggrate');
			$seller['breeds'] = $this->input->post('breeds');
			$seller['street'] = $this->input->post('street');
			$seller['city'] = $this->input->post('city');
			$seller['state'] = $this->input->post('state');
			$seller['pcode'] = $this->input->post('pcode');
			$seller['xroad'] = $this->input->post('xroad');
			/** (NOTE: since we ran out of time we are leaving the lat and lng as Colorado Springs) **/
			$seller['lat'] = 38.833358;
			$seller['lng'] = -104.820851;

			// finally create the seller profile
			$user['sellerID'] = $this->Seller_model->sellerSignup($seller);

		}else{
			// Just a buyers so set the sellerId to null
			$user['sellerID'] = null;
		}


		// Create the user now
		$this->User_model->userSignup($user);

		// Redirect to the main page
		$this->session->set_userdata("flash","Successfully added. Please Login to continue");
		redirect("users/index");
/*		$this->load->view("templates/header");
		$this->load->view("users/index");
		$this->load->view("templates/footer");
*/
	}


// READ methods
	public function index($page='home'){
		$data['flash'] = $this->session->userdata('flash');
		unset($_SESSION['flash']);

		// retrieve any stored user information from the session
		if(!empty($_SESSION['userId'])){
			$data['user'] = $this->session->userdata('userId');
			$data['user_name'] = $this->session->userdata('userName');
			$data['user_seller'] = $this->session->userdata('sellerID');
			$data['notifications'] = $this->Notification_model->notificationCount($_SESSION['userId']);
		}

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
		// Retrieve the user data
		$data['profile'] = $this->User_model->getProfile($_SESSION['userId'], $_SESSION['sellerID']);
		$data['notes'] = $this->Notification_model->getNotes($_SESSION['userId']);
		$data['listing'] = $this->Listing_model->getSellerListing($_SESSION['sellerID']);

		// Render the view
		$this->load->view('templates/header');
		$this->load->view('users/show', $data);
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