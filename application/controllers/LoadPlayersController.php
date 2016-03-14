<?php

class LoadPlayersController extends CI_Controller
{
	/**
	 * function that diplays the load player view. validates that the admin user is logged in.
	 */
	public function index()
	{
		if ($this->session->userdata('is_loggged_in') && $this->session->userdata('is_admin'))
		{
			$this->load->view('LoadPlayerView');
		}
		else
		{
			$this->session->set_flashdata('message', '<strong>NOTE</strong> You are not signed in as the league admin. Please sign in in as the league admin to continue.');
			redirect('LoginController');
		}
		
	}
	
	
	
	/**
	 * function that deletes all the players information and then re-populates the information.  
	 * Displays a message with the inforamtion that was deletes and then added.
	 * 
	 */
	public function add_allplayers()
	{
		$this->load->model('players_model');
		$numAffectedRows = $this->players_model->delete_players();
		$result = $this->players_model->load_players();
		$this->session->set_flashdata('message', '<strong>deleted '.$numAffectedRows.' record(s), added '.$result.' record(s)</strong> into the players table.');
		
		redirect('FinishedLoadingPlayerController', 'refresh');
	}
	
}


?>