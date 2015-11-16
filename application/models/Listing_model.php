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

	// locate an individual listing by its ID
	public function getListing($lID){
		$result = -1;
		if(!empty($sellerID)){
			$query = $this->db->query("select * from Listings where listID=".$this->db->escape($lID));
			if(!empty($query)){
				$result = $query->result_array();
			}
		}

		return $result[0];
	}

	// Based upon the filters given, search for listings matching this criteria
	public function getFilteredListings($filters){
		$query = $this->db->query("select u.fname, u.lname, u.userID, s.sellerID, s.breeds, s.eggrate, s.feed, s.lat, s.lng, l.price, l.inventory  from Users u join Sellers s on u.sellerID = s.sellerID join Listings l on s.sellerID = l.sellerID");
		$listResult = $query->result_array();
		$result = [];

		// check to make sure there are filters to apply
		if(!empty($filters['breeds'])){
			// filter out the chicken breeds the user wants
			foreach($listResult as $key=>$listing){
				$foundBreed = FALSE;		// determines if a breed was found in an entry
				foreach(explode(",", $filters['breeds']) as $breed){
					if(stristr($listing['breeds'], $breed) != FALSE){
						// A breed was found, keep the entry
						$foundBreed = TRUE;
					}
				}

				// Remove any entries that didn't make it
				if($foundBreed == TRUE){
					array_push($result, $listing);
				}
			}
		}else{
			$result = $listResult;
		}

		// filter out the chicken feed the user wants
		return $result;
	}

// UPDATE methods


// DELETE methods

}