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
	// the seller wants to create a new listing
	public function createListing($values){
		date_default_timezone_get("America/Denver");
		// Escape all values passed to the function
		$sID = $values['sellerID'];
		$title = $this->db->escape($values['title']);
		$description = $this->db->escape($values['description']);
		$pickup = $this->db->escape($values['pickup']);
		$price = $this->db->escape($values['price']);
		$inventory = $this->db->escape($values['inventory']);
		$private = $this->db->escape($values['private']);

		// Perform the insertion now
		$query = $this->db->query("insert into Listings (sellerID,title,description,pickup,
									price,status,start,rating,inventory,private) values(
									".$sID.",
									".$title.",
									".$description.",
									".$pickup.",
									".$price.",
									0, NOW(), 0,
									".$inventory.",
									".$private.");");

		$result = $this->db->insert_id();

		return $result;

	}


// READ methods
	// Functions to access different aspects of the listings table
	public function getListingsByArea($area){
		if(! empty($area)){
			$area = $this->db->escape($area);
			$query = $this->db->query("select u.fname, u.lname, u.userID, u.email, s.sellerID, s.breeds, s.eggrate, s.feed, s.city, s.lat, s.lng, s.xroad, l.price, l.inventory, l.listID, l.start, l.title, l.description, l.pickup from Users u join Sellers s on u.sellerID = s.sellerID join Listings l on s.sellerID = l.sellerID where s.city=".$area." and finish is null and private=0");
			$result = $query->result_array();
			return $result;
		}
	}

	// locate a public or private listing from a seller
	public function getSellerListing($sellerID, $private=0){
		$result = -1;
		if(!empty($sellerID)){
			$query = $this->db->query("select l.title, l.description, l.price, l.inventory, l.listID, l.sellerID, l.price, l.pickup, l.status, l.finish, l.rating, l.private, s.street, s.city, s.pcode, s.state, s.xroad from Listings l join Sellers s on l.sellerID = s.sellerID where l.sellerID=".$this->db->escape($sellerID)." and l.private=".$this->db->escape($private)." and l.finish is null");
			if(!empty($query)){
				$result = $query->result_array();
			}
		}

		if(empty($result)){
			return null;
		}else{
			return $result[0];
		}
	}

	// locate an individual listing by its ID
	public function getListing($lID){
		$result = -1;
		if(!empty($lID)){
			$query = $this->db->query("select u.fname, u.lname, u.userID, u.email, s.sellerID, s.breeds, s.eggrate, s.feed, s.city, s.lat, s.lng, s.xroad, l.price, l.inventory, l.listID, l.start, l.title, l.description, l.pickup from Users u join Sellers s on u.sellerID = s.sellerID join Listings l on s.sellerID = l.sellerID where finish is null and private=0 and listID=".$this->db->escape($lID));
			if(!empty($query)){
				$result = $query->result_array();
			}
		}

		return $result[0];
	}

	// Based upon the filters given, search for listings matching this criteria
	public function getFilteredListings($filters){
		$query = $this->db->query("select u.fname, u.lname, u.userID, s.sellerID, s.breeds, s.eggrate, s.feed, s.city, s.lat, s.lng, s.xroad, l.price, l.inventory, l.listID  from Users u join Sellers s on u.sellerID = s.sellerID join Listings l on s.sellerID = l.sellerID where finish is null and private=0");
		$listResult = $query->result_array();

		$result = $this->filter($listResult, $filters['breeds'], "breeds");
		$result = $this->filter($result, $filters['feed'], "feed");
		$result = $this->rangeFilter($result, $filters['inventory'], "inventory");
		$result = $this->rangeFilter($result, $filters['price'], "price");
		return $result;
	}


// UPDATE methods
	// Given a set of parameters, update an entry in the database
	public function updateListing($values){
		$title = $this->db->escape($values['title']);
		$description = $this->db->escape($values['description']);
		$pickup = $this->db->escape($values['pickup']);
		$inventory = $this->db->escape($values['inventory']);
		$price = $this->db->escape($values['price']);

		$query = $this->db->query("update Listings set title=".$title.
									", description=".$description.
									", pickup=".$pickup.
									", price=".$price.
									", inventory=".$inventory.
									" where listID=".$values['lID']);
		return $query;

	}


// DELETE methods
	// The seller no longer wants a listing displayed
	public function removeListing($lID){
		$query = $this->db->query("delete from Listings where listID=".$lID);
	}


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