<?php
/*
 * Programmer: Ben Matson
 * Date create: October 27, 2015
 * Purpose: This model retreives information on the seller based on the user table
*/

class Seller_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	// Information getting
	public function getSellerInfo($seller){
		if(! empty($seller)){
			$query = $this->db->query("select * from Sellers where sellerID=".$this->db->escape($seller).";");
			$result = $query->result_array();
			return $result[0];
		}
	}
}