<?php
class FinishedLoadingPlayerController extends CI_Controller
{
	/**
	 * dispalys the finished loading player view
	 */
	public function index()
	{
		$this->load->view('FinishedLoadingPlayerView');
	}
	
}
?>