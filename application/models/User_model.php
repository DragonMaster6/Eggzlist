<?php

class User_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function getUsers($slug = false){
		if($slug === false){
			$query = $this->db->get('Users');
			return $query->result_array();
		}

		$query = $this->db->get_where('users', array('slug' => $slug));
		return $query->row_array();
	}
}