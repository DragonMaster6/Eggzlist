<?php

/*
 * Users Controller
 *
 * Programmer: Ben Matson
 * Date created: October 23, 2015
 * 
*/

namespace Controllers;

use Core\View;
use Core\Controller;

class Users extends Controller{

	public function index(){
		$users = new \Models\User();
		$data[users] = $users->getUsers();
		View::renderTemplate('header');
		View::render("users/index", $data);
		View::renderTemplate('footer');
	}
}