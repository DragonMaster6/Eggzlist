<?php

/*
 * Programmer: Ben Matson
 * Date Created: October 28, 2015
 * Purpose: handle all Listings functions for the views. Retrieve, search, etc
*/

class Listings extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Seller_model');
		$this->load->model('Listing_model');
	}

	public function search(){
		$area = $this->input->post('area');
		//echo "Here is the area[".$area;
/*		$sellers = $this->Seller_model->searchSellersByArea($area);

		$data["listings"] = array();
		foreach($sellers as $seller){
			array_push($data["users"], $this->User_model->getUserBySellerID($seller["sellerID"]));
			array_push($data["sellers"], $seller);
			$listings = $this->Listing_model->searchListings($seller["sellerID"]);
			if(! empty($listings)){
				foreach($listings as $listing){
					array_push($data["listings"], $listing);
				}
			}
		}
*/
		$data["listings"] = $this->Listing_model->searchListings($area);

		echo json_encode($data);
	}
}