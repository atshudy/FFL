<?php
class CreateLeagueController extends CI_Controller
{
	/**
	 * function called to display the create league view
	 */
	public function index(){
		$this->load->view('CreateLeagueView');
	}

	/**
	 * function that validates the input fields and then redirects the user to create an account view.  
	 * Each league must have a user as the league admin.  when force the user to create the admin account as soon as the league is created.
	 *  
	 */
	public function create_new_league()
	{

		$this->form_validation->set_rules("leaguename", "League Name", "required|callback_duplicateleague");
		$this->form_validation->set_rules("username", "Admin User Name", "required");
				

		if ($this->form_validation->run() == true)
		{
			redirect('CreateAccountController');
		}
		else
		{
			$this->index();
		}

	}
	
	/**
	 * callback function used for an additional rules validation.  function displays a message if the league already exists.
	 * @return boolean
	 */
	public function duplicateleague()
	{
		$this->load->model('create_league');
		$results = $this->create_league->create();
		if ($results == false)
		{
			$this->form_validation->set_message("duplicateleague", "The league already exists. Please select a different league name.");
		}
		return $results;
	}
}

?>