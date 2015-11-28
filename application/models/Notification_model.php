<?php
/*
 * Programmer: Ben Matson
 * Date Created: November 27, 2015
 * Purpose: Methods to get information from the notifications table in the database
*/

class Notification_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}


// CREATE methods
	public function createNotification($values, $type){
		// Type codes:
		// 1 - Inventory Reminder
		// 2 - Transaciton alert
		// 3 - Available eggs from your favorites

		// Escape all the input values
		$subject = $this->db->escape($values['subject']);
		$message = $this->db->escape($values['message']);
		$numEgg = $this->db->escape($values['numEgg']);
		$fromUID = $this->db->escape($values['uID']);
		$toUID = $this->db->escape($values['tuID']);

		$query = $this->db->query("insert into Notifications (toUserID, fromUserID, type, subject, message,
									posted, eggs) values (
									".$toUID.",
									".$fromUID.",
									".$type.",
									".$subject.",
									".$message.",
									NOW(),
									".$numEgg.");");
	}

// READ methods
	// retrieve a user's notifications
	public function getNotes($uID){
		$query = $this->db->query("select * from Notifications where toUserID=".$uID);
		return $query->result_array();
	}
	// Count the number of notifications the user might have
	public function notificationCount($uID){
		$query = $this->db->query("select COUNT(*) as cnt from Notifications where toUserID=".$this->db->escape($uID));
		return $query->result_array()[0]['cnt'];
	}

// UPDATE methods


// DELETE methods
	public function deleteNote($noteID){
		$query = $this->db->query("delete from Notifications where noteID=".$noteID);

		return 1;
	}
}