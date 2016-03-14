<?php
class CreateAccountController extends CI_Controller
{
	/**
	 * function that gets the list of leagues to populate the selection control for the CreateAccountView.
	 * the data is an array with the league name and leagueId.  The league name is displayed as the selection in the selection contorl.
	 * The value of the selection is the LeagueId.
	 */
	public function index(){
		
		$this->load->model('create_league');
		$data = $this->create_league->get_list_of_all_leagues();
		$this->load->view('CreateAccountView', $data);
	}
	
	/**
	 * function that creates the account. Validates the input values and then calls the create_account_model.
	 * If the validation fails the an error message is displayed else the user is redirected to the login page to login in.
	 */
	public function create_account()
	{
		
		$this->form_validation->set_rules("leagueId", "League Id", "required");
		$this->form_validation->set_rules("fname", "First Name", "required");
		$this->form_validation->set_rules("lname", "Last Name", "required");
		$this->form_validation->set_rules("username", "User Name", "required");
		$this->form_validation->set_rules("email", "Email Address", "required|valid_email");
		$this->form_validation->set_rules("teamname", "A Team Name", "required");
		$this->form_validation->set_rules("password", "Password", "required");
		
		if ($this->form_validation->run() == true) 
		{
			$this->load->model('create_account_model');
			$results = $this->create_account_model->add_account();
			if ($results == true)
			{
				redirect('LoginController');
			}
			else
			{				
				$this->session->set_flashdata('message', '<strong>Warning</strong>Your account was not creating. Please, try again.');
				$this->index();
			}
		}
		else
		{
			$this->index();
		}
		
	}
}


?>