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
		$data["listings"] = $this->Listing_model->getListingsByArea($area);
		echo json_encode($data);
	}

	// Update functions

	// Deletion functions
}