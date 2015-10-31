<?php
/*
 * Programmer: Ben Matson
 * Date create: October 27, 2015
 * Purpose: This controller handles business logic for seller information
*/

class Sellers extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Seller_model');
		$this->load->model('Listing_model');
		$this->load->helper('url');
	}

	public function show($id){
		$data['seller'] = $this->Seller_model->getSellerInfo($id);
		$this->load->view('templates/header');
		$this->load->view('sellers/show', $data);
		$this->load->view('templates/footer');
	}
}