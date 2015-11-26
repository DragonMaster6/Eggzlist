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
	// The user wants to become a seller so create an entry in the database and return the sellerID
	public function sellerSignup($values){
		// Escape all the values passed to function
		$numChick = $this->db->escape($values['numChick']);
		$feed = $this->db->escape($values['feed']);
		$eggrate = $this->db->escape($values['eggrate']);
		$breeds = $this->db->escape($values['breeds']);
		$street = $this->db->escape($values['street']);
		$city = $this->db->escape($values['city']);
		$state = $this->db->escape($values['state']);
		$pcode = $this->db->escape($values['pcode']);
		$xroad = $this->db->escape($values['xroad']);
		$lat = $this->db->escape($values['lat']);
		$lng = $this->db->escape($values['lng']);

		// perform the insert
		$query = $this->db->query("insert into Sellers (numChick,feed,eggrate,breeds,street,
									city,state,pcode,xroad,lat,lng) values(
									".$numChick.",
									".$feed.",
									".$eggrate.",
									".$breeds.",
									".$street.",
									".$city.",
									".$state.",
									".$pcode.",
									".$xroad.",
									".$lat.",
									".$lng.");");

		// Retrieve the 
		$result = $this->db->query("select LAST_INSERT_ID();");

		return $result->result_array()[0]['LAST_INSERT_ID()'];
	}

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