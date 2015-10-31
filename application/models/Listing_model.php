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

	// returns a list of listing that a seller has
	public function searchListings($area){
		if(! empty($area)){
			$query = $this->db->query("select * from Users u join Sellers s on u.sellerID = s.sellerID join Listings l on s.sellerID = l.sellerID where s.city=".$this->db->escape($area).";");
			$result = $query->result_array();
			return $result;
		}
	}
}