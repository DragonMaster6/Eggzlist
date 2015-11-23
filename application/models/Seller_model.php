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


// CREATE methods


// READ methods

	// Information getting
	public function getSellerInfo($seller){
		if(! empty($seller)){
			$query = $this->db->query("select * from Sellers where sellerID=".$this->db->escape($seller).";");
			$result = $query->result_array();
			return $result[0];
		}
	}
	public function getLocation($sID){
		$query = $this->db->query("select lat, lng from Sellers where sellerID=".$this->db->escape($sID));
		$result = $query->result_array();
		return $result[0];
	}

// UPDATE methods


// DELETE methods
}