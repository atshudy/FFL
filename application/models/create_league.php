<?php
class Create_league extends CI_Model
{
	/**
	 * function that creates the league
	 * @return unknown
	 */
	public function create()
	{
		// will add a record to the following table
		// 'league'
		$leagueName = $this->input->post('leaguename');
		$leagueId = $this->input->post('leagueId');
		$username = $this->input->post('username');
		
		$sqlIns = "INSERT INTO league (leagueId, adminname, leaguename, numberOfTeams) VALUES (?,?,?,?)";
		$data = array ($leagueId, $username, $leagueName, 0);
		$result = $this->db->query($sqlIns, $data);
		return $result;
	}
	
	/**
	 * function that gets the league name and league id from the league table
	 * @return array
	 */
	public function get_list_of_all_leagues()
	{
		// will add a record to the following table
		// 'league'
		$leagueName = $this->input->post('LeagueName');
		$leagueId = $this->input->post('LeagueId');
		$username = $this->input->post('username');
	
		$sqlIns = "SELECT leagueId, leaguename FROM league";
		$query = $this->db->query($sqlIns);
		$data['leagueInfo'] = $query->result_array();
		return $data;
	}
	
}