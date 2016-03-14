<?php


class Set_lineup_model extends CI_model
{
	/**
	 * function that returns the starting line up
	 * 
	 * @return array:
	 */
	public function get_starting_lineup() 
	{	
		$querydata = array();
		$sql = "SELECT playername FROM startinglineup where selectedflag=0 and teamId = ? and leagueId = ?";
		$teamId = $this->session->userdata('userId');
		$leagueId = $this->session->userdata('leagueId');
		$data = array ($teamId, $leagueId);
		$query_result = $this->db->query($sql, $data);
		if ($query_result == true)
		{
			$querydata = array_values($query_result->result_array());
		}
		return $querydata;
	}
	
	/**
	 * function that returns the available players
	 * @return array:
	 */
	public function get_available_lineup()
	{
		$querydata = array();
		$userId = $this->session->userdata('userId');
		$leagueId = (int)($this->session->userdata('leagueId'));
		$sql = "SELECT playername FROM availablelineup WHERE teamId = ? and leagueId=? and availableflag = ?";
		$data = array($userId, $leagueId, 0);
		$query_result = $this->db->query($sql, $data);
		if ($query_result == true)
		{
			$querydata = array_values($query_result->result_array());
		}
		return $querydata;
	}
	
	/**
	 * we need to modify two tables. availablelineup and startingline. We have a list of players currently selected.
	 * when the user submits there line up we need to perform the following.  
	 *  UPDATE the players availableFlag=0 in AVAILABLELINEUP table and then DELETE the player from STARTINGLINEUP table.
	 *  	if the players do not have scores for any week and they are not currently selected.
	 *  UPDATE the player availableFlag=1. and INSERT the player in the starting STARTINGLINEUP table.
	 *  	if the players is in the selected list.
	 * 
	 * TABLES will be locked on SATURDAY at 6:00AM EST.  they will be unlocked on TUESDAY at 6:00AM EST.
	 * once unlocked the STARTINGLINEUP table will mark all records as selectedFlag=1.  
	 * 
	 */
	public function set_lineup()
	{
		// AVAILABLELINEUP table
		$sql_up_avail = "UPDATE availablelineup SET availableflag=0 WHERE teamId=? and leagueId=? and playername=?";
		$sql_up_select = "UPDATE availablelineup SET availableflag=1  WHERE teamId=? and leagueId=? and playername=?";
		// STARTINGLINEUP table
		
		// example: INSERT INTO startinglineup (playername, startinglineupId, leagueId, teamId) SELECT p.rosterItem, p.playerId, t.leagueId, t.teamId FROM players as p, teams as t WHERE t.teamId=92387 and t.leagueId=1 and p.rosterItem='Derek Anderson QB CAR';
		$sql_Insert = "INSERT INTO startinglineup (playername, playerId, leagueId, teamId) SELECT p.rosterItem, p.playerId, t.leagueId, t.teamId FROM players as p, teams as t WHERE t.teamId=? and t.leagueId=? and p.rosterItem=?";
		$sql_delete = "DELETE FROM startinglineup WHERE teamId=? and leagueId=? and playername=? and selectedflag=0)";
		
		$sql = "SELECT playername FROM availablelineup where availableflag=0 and teamId=? and leagueId=? and playername=?";		
		
		//reset all players
		$sql_reset_avail = "UPDATE availablelineup SET availableflag=0 WHERE teamId=? and leagueId=?";
		$sql_reset_select = "DELETE FROM startinglineup WHERE teamId=? and leagueId=? and selectedflag=0";
		
		// result example: "Isaiah Williams WR TEN\tKevin Brock TE CIN"
		$all_selected_playernames = explode("\t", $_POST['result']);
		
		//remove any empty items
		$selected_playernames_array = array();
		foreach ($all_selected_playernames as $selectedItem)
		{
			if (empty($selectedItem))
			{	
				continue;
			}
			else
			{
				array_push($selected_playernames_array, $selectedItem);
			}
		}
		
		$resetdata = array ($this->session->userdata('userId'), $this->session->userdata('leagueId'));
		
		// DELETE all players from startinglineup and UPDATE all players in availablelineup
		$result = $this->db->query($sql_reset_avail, $resetdata);
		if ($result == true)
		{
			// UPDATE all availableFlag=0 in availablelineup table
			$result = $this->db->query($sql_reset_select, $resetdata);
		}

		// loop through our list of selected players.
		foreach ($selected_playernames_array as $selected_playername)
		{
			// skip over any any empty item in the list of selected players.
			if (empty($selected_playername))
			{
				continue;
			}
			
			$data = array ($this->session->userdata('userId'), $this->session->userdata('leagueId'), $selected_playername);
			
			// SELECT the player from the AVAILABLELINEUP table
			$result = $this->db->query($sql, $data);
			if ($result == true)
			{
				// UPDATE the player availableFlag=1.
				$result = $this->db->query($sql_up_select, $data);
				if ($result == true)
				{
					//INSERT the player in the starting STARTINGLINEUP table.
					$result = $this->db->query($sql_Insert, $data);
				}
			}
		}	
	}
		
	/**
	 *  function that loads the availableline table
	 */
	public function load_available_players()
	{
		$sql = "SELECT count(*) FROM availablelineup WHERE teamId =? and leagueId=?";
		$teamId = $this->session->userdata('userId');
		$leagueId = $this->session->userdata('leagueId');
		$data = array($teamId, $leagueId);
		$query = $this->db->query($sql, $data);		
		$querydata = array_values($query->result_array());
		if ($querydata['0']['count(*)'] == 0)
		{
			$sqlinst = "INSERT INTO availablelineup (playername, playerId, leagueId, teamId) SELECT p.rosterItem, p.playerId, t.leagueId, t.teamId FROM players as p, teams as t WHERE t.teamId=?";
			$insert_results = $this->db->query($sqlinst, array($teamId));
		}
	}
}
?>