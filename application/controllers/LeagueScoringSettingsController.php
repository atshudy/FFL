<?php

class LeagueScoringSettingsController extends CI_Controller{
	/**
	 * function that displays the scoring settings.  only the league admin and make changes to the scoring settings. 
	 */
	public function index()
	{	
		if ($this->session->userdata('is_loggged_in') && $this->session->userdata('is_admin'))
		{	
			$this->load->model('setup_scoring_settings_model');
			$data['current_settings'] = $this->setup_scoring_settings_model->get_current_settings();
			$this->load->view("LeagueScoringSettingsView", $data);
		}
		else
		{
			$this->session->set_flashdata('message', '<strong>NOTE</strong> You are not signed in as the admin. Please sign in as the admin to continue.');          
			redirect('LoginController');
		}
	}
	
	/**
	 * function that set the values in the scoring settings form.
	 * validations are done and then a function call to the model to save the infromation to the database.
	 * 
	 * user is displayed a successful message or an error message.
	 */
	public function set_league_scoring_settings()
	{
		$this->form_validation->set_rules("points_per_reception", "points_per_reception (default=1)", "required|integer|max_length[1]");		
		$this->form_validation->set_rules("points_per_receiving_yard", "points per 15 yrds receiveing (default=1)", "required|integer|max_length[1]");
		$this->form_validation->set_rules("points_per_running_yards", "points per 10 yrds rushing  (default=1)", "required|integer|max_length[1]");			
		$this->form_validation->set_rules("points_per_passing_yards", "points per 20 yrds passing (default=1)", "required|integer|max_length[1]"); 
		$this->form_validation->set_rules("points_per_passing_td", "points per passing TD (default=6)", "required|integer|max_length[1]");
		$this->form_validation->set_rules("points_per_fumble", "points per fumble (default=-2)", "required|integer|max_length[2]");
		
		
		$this->form_validation->set_rules("points_per_rushing_and_recieving_td", "Points per rushing/passing TD (default=6)", "required|integer|max_length[1]"); 
		$this->form_validation->set_rules("points_per_extra_point_made", "points per extra point made (default=1)", "required|integer|max_length[1]");
		$this->form_validation->set_rules("points_per_field_goal_0_20", "points per feild goal 0-20 yrds (default=3)", "required|integer|max_length[1]"); 
		$this->form_validation->set_rules("points_per_field_goal_20_30" , "points per feild goal 20-30 yrds (default=3)", "required|integer|max_length[1]");
		$this->form_validation->set_rules("points_per_field_goal_30_40" , "points per feild goal 30-40 yrds (default=3)", "required|integer|max_length[1]");
		$this->form_validation->set_rules("points_per_field_goal_50", "points per feild goal 50+ yrds (default=3)", "required|integer|max_length[1]");
		$this->form_validation->set_rules("points_per_sack", "points per sack (default=2)", "required|integer|max_length[1]");
		$this->form_validation->set_rules("points_per_interception", "points per interception (default=2)", "required|integer|max_length[1]");
		$this->form_validation->set_rules("points_fumble_recovery", "points per fumble recovery (default=2)", "required|integer|max_length[1]");
		$this->form_validation->set_rules("points_per_defensive_td", "points per defensive TD (default=6)", "required|integer|max_length[1]");
		$this->form_validation->set_rules("points_per_safty", "points per safty (default=2)", "required|integer|max_length[1]"); 
		$this->form_validation->set_rules("points_per_return_td", "points per return TD (default=6)", "required|integer|max_length[1]");
		$this->form_validation->set_rules("points_per_return_yards", "points per 20 yrds return (default=1)", "required|integer|max_length[1]");
		
		if ($this->form_validation->run() == true)
		{
			$this->load->model('setup_scoring_settings_model');
			$result = $this->setup_scoring_settings_model->save_scoring_settings();
			if ($result == false)
			{
				$this->session->set_flashdata('warningmessage', '<strong>Warning</strong> Your scoring setting was not updated correctly. Please, try again.');
			}
			else
			{
				$this->session->set_flashdata('successmessage', '<strong>Success!</strong> Your scoring setting was been updated.');
			}			
		}
		redirect('LeagueScoringSettingsController', 'refresh');	
	}
}

?>