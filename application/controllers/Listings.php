<?php
/*
 * Programmer: Ben Matson
 * Date Created: November 3, 2015
 * Purpose: Handles requests for listing Creation, Readability, Update, and Deletion
*/

class Listings extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("Listing_model");
		$this->load->model("Seller_model");

		// load any other helper classes
		$this->load->helper("url_helper");
		$this->load->library("session");
	}

// Creation functions
	public function create(){

	}

// Readability functions

	// display the main page for listing creation
	public function index(){
		$sID = $this->session->userdata("sellerID");

		// Load in a Listing if the user already has one
		$listing = $this->Listing_model->getSellerListing($sID);

		if($listing != -1){
			
		}

		// Render the page
		$this->load->view("templates/header");
		$this->load->view("listings/index");
		$this->load->view("templates/footer");
	}

	public function search(){
		$area = $this->input->post('area');

		// Set a session variable for the last searched city/keyword
		$this->session->set_userdata("search",$area);

		$data["listings"] = $this->Listing_model->getListingsByArea($area);
		echo json_encode($data);
	}

	// take the filter options and pass them to the model to retrieve listings based on user wants
	public function filter(){
		// retrieve the inputs passed from the request
		$filterVal['breeds'] = $this->input->post('breeds');
		$filterVal['feed'] = $this->input->post('feed');
		$filterVal['inventory'] = $this->input->post('invent');
		$filterVal['price'] = $this->input->post('price');

		$data['listings'] = $this->Listing_model->getFilteredListings($filterVal);
		echo json_encode($data);
	}

	// Display the sellers current listings
	public function show(){
		$data['flash'] = $this->session->userdata('flash');
		unset($_SESSION['flash']);

		$this->load->model("Waitlists_model");

		$data['flash'] = $this->Waitlists_model->getStatus(4, 1);

		$sID = $_SESSION['sellerID'];
		$data['listing'] = $this->Listing_model->getSellerListing($sID);
		$data['location'] = $this->Seller_model->getLocation($sID);

		$this->load->view("templates/header");

		// NOTE: I can see a potential bug here since the above variables is pulling from the Seller
		//		 if the user isn't a seller, the page will break since there will be no information to gather
		if (is_null($sID))
		{
			$this->load->view("listing/showbuy", $data);
		}
		else {
			$this->load->view("listings/show", $data);				
		}
		
		$this->load->view("templates/footer");

	}

	// Display the edit listing page for the seller to edit
	public function edit(){
		$data['flash'] = $_SESSION['flash'];
		unset($_SESSION['flash']);

		$data['listing'] = $this->Listing_model->setSellerListing($_SESSION['sellerID']);
		$data['location'] = $this->Seller_model->getLocation($_SESSION['sellerID']);

		// Render the edit page which is similar to the show page but with inputs
		$this->load->view("templates/header");
		$this->load->view("listings/edit", $data);
		$this->load->view("templates/footer");
	}


	// Display a listing for the user to see
	public function showbuy($lID){
		//$sID = $_SESSION['sellerID'];
		$data['listing'] = $this->Listing_model->getListing($lID);
		$data['location'] = $this->Seller_model->getLocation($data['listing']['sellerID']);

		// retrieve the inputs passed from the request
		$this->load->view("templates/header");
		$this->load->view("listings/showbuy", $data);
		$this->load->view("templates/footer");

	}


// Update functions

	// The seller has clicked the update button so change the database entries
	public function update(){
		// Retrieve the input values from the form
		$params["lID"] = $this->input->post('listID_in');
		$params["inventory"] = $this->input->post('inventory_in');
		$params["price"] = $this->input->post('price_in');
		$params["title"] = $this->input->post('title');
		$params["description"] = $this->input->post('descript_in');
		$params["pickup"] = $this->input->post('pickup_in');

		// Perform data vailidation here

		// Perform the update
		$result = $this->Listing_model->updateListing($params);

		// check to make sure there an error did not occur
		if(!$result){
			// set an error message and redirect to the edit page to try again
			$_SESSION['flash'] = "Something went wrong with the update, please try again";
			redirect("listings/edit");
		}else{
			// the update was successfull
			$_SESSION['flash'] = "Your listing has been successfully updated";
			redirect("listings/show");
		}
	}

// Deletion functions
}