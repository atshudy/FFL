<?php

class LoginController extends CI_Controller {

	/**
	 * dispalys the login view
	 */
	public function index() 
	{	
		$this->load->view('LoginView');
	}
	
	
	/**
	 * Clears the session user data and then validates the user exists and then set the session user data.
	 * If the user is successful in logging in they are redicted to the home page else error messages are display with detailed information.
	 */
	public function validate_credentials() 
	{
		$data = array(
				'username'=> '',
				'is_loggged_in' => false,
				'teamname' => '',
				'leagueId' => '',
				'userId' => '',
				'is_admin' => false
		);
		$this->session->unset_userdata($data);
		$this->form_validation->set_rules("username", "UserName", "required|callback_usernotfound");
		$this->form_validation->set_rules("password", "Password", "required");
		

		if ($this->form_validation->run() == true)
		{
			$this->load->model('user_model');
			$result = $this->user_model->validate();
			if ($result == false)
			{
				$this->session->set_flashdata('message', "<strong>Warning </strong>The password for the username is incorrect. Please try again... check spelling or click 'Get password' to reset your password.");
			}
			else 
			{
				redirect('HomeLeagueController');
			}
			$this->index();
		}
		else
		{
			$this->index();
		}
	}
	
	/**
	 * The function used for the rules validation call back method
	 * @return unknown
	 */
	public function usernotfound()
	{
		$this->load->model('user_model');
		$does_user_exist = $this->user_model->validate_username();
		if ($does_user_exist == false)
		{
			$this->form_validation->set_message("usernotfound", "The username does not exist. Please retry.. check spelling or create an new account.");
		}
		return $does_user_exist;
	}
	
	
	/**
	 * function that is called by the jquery ajax request when the user clicks the 'Get password' link. 
	 */
	public function send_password()
	{
		$this->load->model('user_model');
		$result = $this->user_model->send_email();
	}
} 

?>