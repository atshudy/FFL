<?php

global $lineupresult;

 class SetLineUpController extends CI_Controller {
 	/**
 	 *  checks that the user is logged in. Then makes sure that all available players exist in available list.
 	 *  loads both the starting lineup list and the available lineup list.  
 	 *  A player will either be in the available list or in the starting lineup 
 	 */
 	public function index() {
 		if ($this->session->userdata('is_loggged_in'))
 		{
 			$this->load->model('set_lineup_model');
 			
 			// loads all the players in to the availablelineup table
 			$this->set_lineup_model->load_available_players();
 			
 			$data['sortable1'] = $this->set_lineup_model->get_available_lineup();
 			$data['sortable2'] = $this->set_lineup_model->get_starting_lineup();
 			$this->load->view('SetLineUpView', $data);		
 		}
 		else
 		{
 			$this->session->set_flashdata('message', '<strong>NOTE</strong> You are not signed in. Please sign in in to continue.');
 			redirect('LoginController');
 		}
 		
 		
 	}
 	
 	/**
 	 * function that is call when the user presses the set lineup button. 
 	 * This method retrives the values that are in the hidden field called result and calls the function to save the information the dtabase.  
 	 * 
 	 * details: There is javascript function that handle the on click event and sets a hidden input feilds values to be the values in the starting lineup list.  
 	 *   
 	 */
 	public function submit_line_up(){
 		$this->load->model('set_lineup_model');
 		$data['selectedarr'] = $this->input->post('result');
 		$this->set_lineup_model->set_lineup($data);
 		$this->index();
 	}
 }
?>