<?php

class HomeLeagueController extends CI_Controller {
	
	/**
	 * displays the home page.  verifies the a user is logged in. Then calls the the function get_current_standing.
	 * The information is an array of all the teams in the league and the current logged in users starting linup.
	 */
	public function index() {
		if ($this->session->userdata('is_loggged_in'))
		{
			$this->load->model('home_model');
			$data['currentstand'] = $this->home_model->get_current_standings();
			$this->load->view('HomeLeagueView', $data);
		}
		else
		{
			$this->session->set_flashdata('message', '<strong>NOTE</strong> You are not signed in. Please sign in in to continue.');
			redirect('LoginController');
		}
	}
	
}

?>