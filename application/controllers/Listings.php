<?php

class Listings extends CI_Controller
{
	public function browse()
	{
		if (isset($_GET['search'])) {
			$sql = "SELECT *, l.id as lid, u.id as uid,  u.username FROM listings l JOIN users u on (l.user_id = u.id) WHERE name LIKE '%" . $_GET['search'] . "%' or category LIKE '" . $_GET['search'] . "'";
		} else {
			$sql = "SELECT *, l.id as lid, u.id as uid,  u.username FROM listings l JOIN users u on (l.user_id = u.id)";
		}

		$query = $this->db->query($sql);
		$data['listings'] = $query->result_array();

		$this->load->view('templates/header');
		$this->load->view('browse', $data);
		$this->load->view('templates/footer');
	}

	public function add_listing()
	{
		if ($_SESSION['user_logged'] == FALSE) {
			$this->session->set_flashdata("error", "Please login first to add listing.");
			redirect("auth/login");
		}

		if (isset($_POST['add_listing'])) {
			$data = array
			(
				'user_id' => $_SESSION['user_id'],
				'name' => $_POST['name'],
				'description' => $_POST['description'],
				'category' => $_POST['category'],
				'price_bid' => $_POST['price_bid'],
				'price_buyout' => $_POST['price_buyout']
			);

			$this->db->insert('listings', $data);

			$this->session->set_flashdata("success", "Your listing has been created.");
			redirect("listings/browse", "refresh");
		}

		$this->load->view('templates/header');
		$this->load->view('add_listing');
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('listings');
		$this->db->where(array('id' => $id));
		$query = $this->db->get();

		$listing['listing'] = $query->row();

		// bid button click
		if (isset($_POST['bid'])) {
			// insert bid into table bids
			$data = array
			(
				'listing_id' => $id,
				'user_id' => $_SESSION['user_id'],
				'bid' => $_POST['price_bid']
			);

			if(($data['bid'] > $listing['listing']->price_bid) AND ($data['bid'] < $listing['listing']->price_buyout)){
				$this->db->insert('bids', $data);

				// update current bid in listings
				$this->db->set('price_bid', $_POST['price_bid'], FALSE);
				$this->db->where('id', $id);
				$this->db->update('listings');

				$this->session->set_flashdata("success", "Your bid has been recorded!");
				redirect("listings/detail/".$id, "refresh");
			} else {
				$this->session->set_flashdata("error", "Your bid must be higher than the current bid and lower than the buyout price.");
				redirect("listings/detail/".$id, "refresh");
			}


		}

		// buyout buttom click
		if (isset($_POST['buyout'])) {
			$this->db->set('status', 'closed');
			$this->db->set('bought_by', $_SESSION['user_id']);
			$this->db->where('id', $id);
			$this->db->update('listings');

			$this->session->set_flashdata("success", "You bought ".$listing['listing']->name."!");
			redirect("listings/detail/".$id, "refresh");
		}

		$this->load->view('templates/header');
		$this->load->view('listing_detail', $listing);
		$this->load->view('templates/footer');
	}

	public function user_detail($username)
	{
		$sql = "SELECT *, u.id as uid, r.id as rid FROM users u JOIN user_reviews r ON u.id = r.user_id WHERE u.username = '" . $username . "'";

		$query = $this->db->query($sql);
		$data['user'] = $query->result_array();
		$data['username'] = $username;

		$this->load->view('templates/header');
		$this->load->view('user_detail', $data);
		$this->load->view('templates/footer');
	}

	public function add_u_review($username)
	{
		if ($_SESSION['user_logged'] == FALSE) {
			$this->session->set_flashdata("error", "Please login first to add review.");
			redirect("auth/login");
		}

		if (isset($_POST['add_u_review'])) {

			$this->db->select('*');
			$this->db->from('users');
			$this->db->where(array('username' => $username));
			$query = $this->db->get();

			$user = $query->row();

			/*
			$sql = "SELECT * FROM users WHERE username ='".$username."'";
			$query = $this->db->query($sql);
			$data = $query->result_array();

			foreach($data as $row){
				$user_id = $row['id'];
			}
			*/

			$data = array
			(
				'user_id' => $user->id, //$user_id,
				'stars' => $_POST['stars'],
				'review' => $_POST['review']
			);

			$this->db->insert('user_reviews', $data);

			$this->session->set_flashdata("success", "Your review has been added.");
			redirect("listings/user_detail/".$username, "refresh");
		}

		$this->load->view('templates/header');
		$this->load->view('add_u_review');
		$this->load->view('templates/footer');
	}
}
