<?php
/*
 * Programmer: Ben Matson
 * Date Creatd: November 27, 2015
 * Purpose: Handles requests to create, read, update, and delete Waitlists
*/



class Waitlists extends CI_Controller{
	public function __construct(){
		parent::__construct();

		// load models here
		$this->load->model("User_model");
		$this->load->model("Listing_model");
		$this->load->model("Waitlists_model");
		$this->load->model("Notification_model");

		// load any other helper classes
		$this->load->helper("url_helper");
		$this->load->library("session");
	}


// CREATE methods
	public function create(){
		// extract the data from the form
		$list['lID'] = $this->input->post("list_ID");
		$list['uID'] = $_SESSION["userId"];
		$note['subject'] = $this->input->post("contact_subject");
		$note['numEgg'] = $this->input->post("numEggs");
		$note['message'] = $this->input->post("contact_message");
		$note['uID'] = $_SESSION["userId"];
		$note['tuID'] = $this->input->post("to_user");

		// This is where we would check if the current listing has any more available eggs
		$sID = $this->User_model->getUserSellerID($note['tuID']);
		$listing = $this->Listing_model->getSellerListing($sID);
		if($listing['inventory'] >= $note['numEgg']){
			// add the buyer/seller to the waiting list
			$pos = $this->Waitlists_model->pushUser($list);
			$_SESSION['flash'] = "You are ".$pos." on the list";

			// Now send a notification to the seller about it
			$this->Notification_model->createNotification($note, 2);

			// Redirect to the index page with the message
			redirect("users/index");
		}else{
			// The user is requesting more eggs than the listed price; display an error
			$_SESSION['flash'] = "There aren't enough eggs! Please retry again";
			redirect("users/index");
		}
	}


// READ methods


// UPDATE methods


// DELETE methods

}

