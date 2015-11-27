<?php
/*
 * Programmer: Ben Matson
 * Date Created: November 27, 2015
 * Purpose: Interacts with the Waitlists table in the database
*/

class Waitlists_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}


// CREATE methods
	public function pushUser($values){
		$query = $this->db->query("insert into WaitLists (listID, userID, start)
								values (".$values['lID'].",
										".$values['uID'].",
										NOW());");
		$result = $this->getStatus($values['lID'],$values['uID']);

		return $result;

	}


// READ methods
	// Retrieve the user's position on the list
	public function getStatus($lID, $uID){
		$lID = $this->db->escape($lID);
		$uID = $this->db->escape($uID);
		$query = $this->db->query("select userID, start from WaitLists where listID=".$lID." and finish is null order by start ASC");
		$waitlist = $query->result_array();

		// cycle through the list and increase the counter to determine what position
		$count = 0;
		foreach($waitlist as $entry){
			if($entry['userID'] != $uID){
				$count += 1;
			}else{
				break;
			}
		}

		return $count;
	}


// UPDATE methods


// DELETE methods
}