<?php

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($_SESSION['user_logged'] == FALSE) {

			$this->session->set_flashdata("error", "Please login first to view profile.");
			redirect("auth/login");
		}
	}

	public function profile()
	{
		if ($_SESSION['user_logged'] == FALSE) {
			$this->session->set_flashdata("error", "Please login first to view profile.");
			redirect("auth/login");
		}

		$sql = "SELECT *, l.id as lid, u.id as uid,  u.username FROM listings l JOIN users u on (l.user_id = u.id) WHERE u.username = '".$_SESSION['username']."'";
		$query = $this->db->query($sql);
		$data['listings'] = $query->result_array();

		$sql = "SELECT *, l.id as lid FROM bids b JOIN listings l ON b.listing_id = l.id WHERE b.user_id = '".$_SESSION['user_id']."'";
		$query = $this->db->query($sql);
		$data['bids'] = $query->result_array();

		$sql = "SELECT * FROM listings WHERE bought_by = '".$_SESSION['user_id']."'";
		$query = $this->db->query($sql);
		$data['bought_items'] = $query->result_array();

		$this->load->view('templates/header');
		$this->load->view('profile', $data);
		$this->load->view('templates/footer');
	}

	public function update_email()
	{
		if ($_SESSION['user_logged'] == FALSE) {
			$this->session->set_flashdata("error", "Please login first to view profile.");
			redirect("auth/login");
		}

		if (isset($_POST['update_email'])) {
			$this->form_validation->set_rules('old_email', 'Old email', 'required');
			$this->form_validation->set_rules('new_email', 'New email', 'required');

			if ($this->form_validation->run() == TRUE) {
				$old_email = $_POST['old_email'];
				$new_email = $_POST['new_email'];

				if ($old_email == $_SESSION['user_email']) {
					$sql = "UPDATE users SET email = '" . $new_email . "' WHERE username = '" . $_SESSION['username'] . "'";
					$this->db->query($sql);
					$_SESSION['email'] = $new_email;
					$this->session->set_flashdata("success", "Email updated successfully.");
					redirect("user/profile", "refresh");
				} else {
					$this->session->set_flashdata("error", "Incorrect old email entered.");
					redirect("user/update_email", "refresh");
				}
			}
		}

		$this->load->view('templates/header');
		$this->load->view('update_email');
		$this->load->view('templates/footer');
	}
}
