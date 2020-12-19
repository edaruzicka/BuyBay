<?php

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
	}

	public function logout()
	{
		unset($_SESSION);
		session_destroy();
		redirect("auth/login", "refresh");
	}


	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

		if ($this->form_validation->run() == TRUE) {

			$username = $_POST['username'];
			$pass_cookie = $_POST['password'];
			$password = md5($_POST['password']);


			// check user in database
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where(array('username' => $username, 'password' => $password));
			$query = $this->db->get();

			$user = $query->row();

			// if user exists
			if ($user->email) {

				// temporary message
				$this->session->set_flashdata("success", "You are logged in.");

				// set session variables
				$_SESSION['user_logged'] = TRUE;
				$_SESSION['username'] = $user->username;
				$_SESSION['user_email'] = $user->email;
				$_SESSION['user_id'] = $user->id;

				if ($_POST['remember_me'] == 1) {
					set_cookie('username', $username, 86500);
					set_cookie('password', $pass_cookie, 86500);
				} else {
					delete_cookie('username');
					delete_cookie('password');
				}

				//redirect to profile page
				redirect("user/profile", "refresh");

			} else {
				$this->session->set_flashdata("error", "Account with this email does not exist.");
				redirect("auth/login", "refresh");
			}


			$data = array
			(
				'username' => $_POST['username'],
				'password' => md5($_POST['password'])
			);

		}

		$this->load->view('templates/header');
		$this->load->view('login');
		$this->load->view('templates/footer');
	}

	public function register()
	{
		if (isset($_POST['register'])) {
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[5]|matches[password]');

			// if form validation true
			if ($this->form_validation->run() == TRUE) {
				//echo 'form validated';

				$data = array
				(
					'username' => $_POST['username'],
					'email' => $_POST['email'],
					'password' => md5($_POST['password'])
				);

				// check if username unique
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where(array('username' => $data['username']));
				$query = $this->db->get();

				if ($query->row()->username == NULL){
					// check if email unique
					$this->db->select('*');
					$this->db->from('users');
					$this->db->where(array('email' => $data['email']));
					$query = $this->db->get();

					if ($query->row()->email == NULL) {
						// add user to the database
						$this->db->insert('users', $data);

						$this->session->set_flashdata("success", "Your account has been created.");
						redirect("auth/register", "refresh");
					} else {
						$this->session->set_flashdata("error", "Email already used.");
						redirect("auth/register", "refresh");
					}
				} else {
					$this->session->set_flashdata("error", "Username already taken.");
					redirect("auth/register", "refresh");
				}
			}
		}

		$this->load->view('templates/header');
		$this->load->view('register');
		$this->load->view('templates/footer');
	}
}
