<?php

class User_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}


// CREATE methods
	public function userSignup($values){
		// Escape all the values passed to function
		$sID = $this->db->escape($values['sellerID']);
		$fname = $this->db->escape($values['fname']);
		$lname = $this->db->escape($values['lname']);
		$dname = $this->db->escape($values['dname']);
		$pass = $this->db->escape($values['pass']);
		$email = $this->db->escape($values['email']);
		$phone = $this->db->escape($values['phone']);

		// perform the insert
		$query = $this->db->query("insert into Users (sellerID,fname,lname,dname,
									pass,email,phone) values(
									".$sID.",
									".$fname.",
									".$lname.",
									".$dname.",
									".$pass.",
									".$email.",
									".$phone.");");

		// Retrieve the 
		$result = $this->db->query("select LAST_INSERT_ID();");

		return $result->result_array()[0]['LAST_INSERT_ID()'];
	}


// READ methods
	// Retrieve all the users that are in the system
	public function getUsers($slug = false){
		if($slug === false){
			$query = $this->db->get('Users');
			return $query->result_array();
		}
		$query = $this->db->get_where('users', array('slug' => $slug));
		return $query->row_array();
	}
	// Retrieve a single user's name
	public function getUserName($id){
		$query = $this->db->query("select fname from Users where userID=".$this->db->escape($id));
		$result = $query->result_array();
		return $result[0]['fname'];
	}
	// Retrieve a user by their seller ID
	public function getUserBySellerID($sellerID){
		$query = $this->db->query("select * from Users where sellerID=".$this->db->escape($sellerID));
		$result = $query->result_array();
		return $result;
	}
	// Retrieve a user's seller ID through their own id
	public function getUserSellerID($uId){
		$query = $this->db->query("select sellerID from Users where userID=".$this->db->escape($uId));
		$result = $query->result_array();
		return $result[0]['sellerID'];
	}
	// This will Log a user into the website based on the credentials provided
	public function userAuth($user, $pass){
		$user = $this->db->escape($user);
		//$pass = $this->db->escape($pass);
		$result = -1;		// holds true if user is authenticated or false if wrong information supplied
		$query = $this->db->query("select userID, pass from Users where dname=".$user);
		$user_result = $query->result_array();
		//Test to see if the query came back with anything
		if(! empty($user_result[0])){
			// Now test if the password that came back matches with the password supplied
			if($user_result[0]['pass'] == $pass){
				$result = $user_result[0]['userID'];
			}
		}
		return $result;
	}



// UPDATE methods


// DELETE methods


}