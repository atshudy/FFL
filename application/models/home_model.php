<?php
class Home_model extends CI_Model
{
	/**
	 * Function that gets the information for all the teams in the league. 
	 * the inforamtion is the teams name and there total score.
	 * 
	 * This information is displayed in the home page
	 * 
	 * @return array
	 */
	public function get_current_standings()
	{
		//SQL example: SELECT teamname, week1score, week2score, week3score, week4score from teams where leagueId=2;
		$sql = "SELECT teamname, week1score, week2score, week3score, week4score from teams where leagueId=?";
		$sqldata = array($this->session->userdata('leagueId'));
		$query = $this->db->query($sql, $sqldata);
		$record = $query->result_array();
		$data['teamdata'] = array();
		foreach ($record as $team){
			$teamname = $team['teamname'];
			$totalscore = $team['week1score'] + $team['week2score'] + $team['week3score'] + $team['week4score'];
			array_push($data['teamdata'], array($teamname, $totalscore));
		}
		$data = $this->get_current_startinglineup($data);
		return($data);
	}
	
	/**
	 * function that adds a new array to get_current_standings array value.  This array consists of the list of current starting lineup.
	 * 
	 * This information is displayed in the home page
	 * 
	 * @param $data array
	 * @return array
	 */
	public function get_current_startinglineup($data)
	{
		// SQL example: SELECT p.displayName, p.position, p.team from players as p, startinglineup as s where s.playerId = p.playerId and s.teamId=72265;
		$sql = "SELECT p.displayName, p.position, p.team from players as p, startinglineup as s where s.playerId = p.playerId and s.teamId=?";
		$sqldata = array($this->session->userdata('userId'));
		$query = $this->db->query($sql, $sqldata);
		$record = $query->result_array();
		$data['playerdata'] = array();
		foreach ($record as $playerinfo){
			$playername = $playerinfo['displayName'];
			$position = $playerinfo['position'];
			$nflteam = $playerinfo['team'];
			array_push($data['playerdata'], Array($playername, $position, $nflteam));
		}
		return($data);	
	}
}

?>