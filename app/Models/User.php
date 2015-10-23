<?php

/*
 * Users Model
 *
 * Programmer: Ben Matson
 * Date Created: October 23, 2015
 * Purpose: Retrieves all user information from the Users table in the DB
*/

namespace Models;

use Core\Model;

class User extends Model{

	public function getUsers(){
		return $this->db->select("SELECT * FROM Users");
	}
}