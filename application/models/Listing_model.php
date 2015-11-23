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
			$query = $this->db->query("select * from Users u join Sellers s on u.sellerID = s.sellerID join Listings l on s.sellerID = l.sellerID where s.city=".$this->db->escape($area)." and finish is null;");
			$result = $query->result_array();
			return $result;
		}
	}

	// locate a public or private listing from a seller
	public function getSellerListing($sellerID, $private=0){
		$result = -1;
		if(!empty($sellerID)){
			$query = $this->db->query("select * from Listings where sellerID=".$this->db->escape($sellerID)." and private=".$this->db->escape($private)."and finish is null");
			if(!empty($query)){
				$result = $query->result_array();
			}
		}

		return $result[0];
	}

	// locate an individual listing by its ID
	public function getListing($lID){
		$result = -1;
		if(!empty($lID)){
			$query = $this->db->query("select u.fname, u.lname, u.userID, u.email, s.sellerID, s.breeds, s.eggrate, s.feed, s.city, s.lat, s.lng, l.price, l.inventory, l.listID, l.start, l.title, l.description, l.pickup from Users u join Sellers s on u.sellerID = s.sellerID join Listings l on s.sellerID = l.sellerID where finish is null and listID=".$this->db->escape($lID));
			if(!empty($query)){
				$result = $query->result_array();
			}
		}

		return $result[0];
	}

	// Based upon the filters given, search for listings matching this criteria
	public function getFilteredListings($filters){
		$query = $this->db->query("select u.fname, u.lname, u.userID, s.sellerID, s.breeds, s.eggrate, s.feed, s.city, s.lat, s.lng, l.price, l.inventory  from Users u join Sellers s on u.sellerID = s.sellerID join Listings l on s.sellerID = l.sellerID where finish is null");
		$listResult = $query->result_array();

		$result = $this->filter($listResult, $filters['breeds'], "breeds");
		$result = $this->filter($result, $filters['feed'], "feed");
		$result = $this->rangeFilter($result, $filters['inventory'], "inventory");
		$result = $this->rangeFilter($result, $filters['price'], "price");
		return $result;
	}

// UPDATE methods


// DELETE methods


// MISC methods
	private function filter($list, $filter, $type){
		$result = [];

		// check to make sure there is a filter to apply to
		if(!empty($filter)){
			// filter out the requested entries in the listing
			foreach($list as $key=>$listing){
				$found = FALSE;		// determines if an entry met the requirements

				// if there is more than one requirement, break it down and test each one
				foreach(explode(",", $filter) as $req){
					if(stristr($listing[$type], $req) != FALSE){
						// an entry matched the requirement, keep it
						$found = TRUE;
						break;
					}
				}

				// Add an entry to the result if the req was found
				// This is so that the entry doesn't appear more than once if multiple
				// requirements were met
				if($found == TRUE){
					array_push($result, $listing);
				}

			}
		}else{
			$result = $list;
		}

		return $result;
	}

	private function rangeFilter($list, $filter, $type){
		$result = [];

		// check to make sure there is a filter to apply to
		if(!empty($filter)){
			// filter out the requested entries in the listing
			foreach($list as $key=>$listing){
				$range = explode(",", $filter);		// break down the range so that it can be checked
				if($listing[$type] >= $range[0] and $listing[$type] <= $range[1]){
					// the entry met the criteria
					array_push($result, $listing);
				}
			}
		}else{
			$result = $list;
		}

		return $result;
	}
}// End of the Model Class