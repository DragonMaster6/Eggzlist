<?php
/*
 * Programmer: Ben Matson
 * Date Created: November 27, 2015
 * Purpose: Handles the business logic to direct views a retrieve data
*/

class Notifications extends CI_Controller{
	public function __construct(){
		parent::__construct();

		// load model
		$this->load->model("Notification_model");

		// load helpers
		$this->load->helper("url_helper");
		$this->load->library("session");
	}


// CREATE methods


// READ methods


// UPDATE methods


// DELETE methods
	// user wants to delete a specified notification
	public function delete(){
		$noteID = $this->input->post("id");

		// finally delete the note
		$this->Notification_model->deleteNote($noteID);

		// There is not need to render a page
	}

}