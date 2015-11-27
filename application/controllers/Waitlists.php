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
		$this->load->model("Waitlists_model");

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

		// add the buyer/seller to the waiting list
		$pos = $this->Waitlists_model->pushUser($list);
		$_SESSION['flash'] = "You are ".$pos." on the list";

		// Now send a notification to the seller about it

		// Redirect to the index page with the message
		redirect("users/index");
	}


// READ methods


// UPDATE methods


// DELETE methods

}

