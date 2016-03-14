<?php
class EditAccountController extends CI_Controller
{
	/**
	 * function that retrieves the logged in users profile or user information.  
	 * Verifies the user is logged in and displays a message if they noone is logged in.
	 */
	public function index()
	{
		if ($this->session->userdata('is_loggged_in'))
		{
			$this->load->model('user_model');
			$data['userInfo'] = $this->user_model->get_account();
			$this->load->view('EditAccountView', $data);
		}
		else
		{
			$this->session->set_flashdata('message', '<strong>NOTE</strong> You are not signed in. Please sign in in to continue.');
			redirect('LoginController');
		}
	}

	/**
	 * function that validates the input values and then calls edit_account to save the data.
	 */
	public function edit_account()
	{
		$this->form_validation->set_rules("fname", "First Name", "required");
		$this->form_validation->set_rules("lname", "Last Name", "required");
		$this->form_validation->set_rules("username", "User Name", "required");
		$this->form_validation->set_rules("email", "Email Address", "required|valid_email");
		$this->form_validation->set_rules("teamname", "A Team Name", "required");

		if ($this->form_validation->run() == true)
		{
			$this->load->model('user_model');
			$result = $this->user_model->edit_account();
			if ($result == false)
			{
				$this->session->set_flashdata('warningmessage', '<strong>Warning</strong> Your account was not updated correctly. Please, try again.');		
			}
			else
			{
				$this->session->set_flashdata('successmessage', '<strong>Success!</strong> Your account was been updated.');
			}
		}		
		redirect('EditAccountController','refresh');
	}
	
	function delete_account ()
	{
		if ($this->session->userdata('is_loggged_in'))
		{
			$this->load->model('user_model');
			$this->user_model->delete_account();
		}
		else 
		{
			$this->session->set_flashdata('message', '<strong>NOTE</strong> You are not signed in. Please sign in in to continue.');
			redirect('LoginController');
		}
		redirect('LogoutController');
	}
}
?>