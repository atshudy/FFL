<?php
class LogoutController extends CI_Controller{
	
	/**
	 * function that is called when the user selects the logout menu items. 
	 * clears the sessions userdata and redirects to the login pages
	 */
	public function index()
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
		redirect('LoginController');
	}
}

?>