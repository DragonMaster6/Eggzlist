<?php
/*
 * Programmer: Ben Matson
 * Date create: October 27, 2015
 * Purpose: This model retreives information on seller listings in the listings table
*/

class Listing_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}


// CREATE methods


// READ methods
	// Functions to access different aspects of the listings table
	// WARNING!: THE FOLLOWING QUERY WILL REVEAL PASSWORDS, HIGHLY CONSIDER SELECTING DESIRED ATTRIBUTES
	public function getListingsByArea($area){
		if(! empty($area)){
			$query = $this->db->query("select * from Users u join Sellers s on u.sellerID = s.sellerID join Listings l on s.sellerID = l.sellerID where s.city=".$this->db->escape($area).";");
			$result = $query->result_array();
			return $result;
		}
	}

	// locate a public or private listing from a seller
	public function getSellerListing($sellerID, $private=0){
		$result = -1;
		if(!empty($sellerID)){
			$query = $this->db->query("select * from Listings where sellerID=".$this->db->escape($sellerID)." and private=".$this->db->escape($private));
			if(!empty($query)){
				$result = $query->result_array();
			}
		}

		return $result[0];
	}

// UPDATE methods


// DELETE methods

}