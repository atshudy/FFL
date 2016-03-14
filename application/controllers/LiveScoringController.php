<?php
Class LiveScoringController extends CI_Controller
{
	/**
	 * displays the live scoring page. verifies a user is logged in if not redirects him to the login controller to login.
	 */
	public function index()
	{
	if ($this->session->userdata('is_loggged_in'))
		{
			$this->load->view('LiveScoringView');
		}
		else
		{
			$this->session->set_flashdata('message', '<strong>NOTE</strong> You are not signed in. Please sign in in to continue.');
			redirect('LoginController');
		}
	}
}
?>