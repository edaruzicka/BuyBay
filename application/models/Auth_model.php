<?php

class Auth_model extends CI_Model
{
	/*
	public $username;
	public $email;
	public $password;
	*/

	public function register($data)
	{
		/*
		$this->username    	= $_POST['username'];
		$this->email  		= $_POST['email'];
		$this->password     = $_POST['password'];
		*/

		$this->db->insert('users', $data);
	}


}
