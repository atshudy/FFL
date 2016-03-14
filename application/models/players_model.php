<?php
class Players_model extends CI_model
{
	
	/**
	 * Function that call an API to get all the current nfl players. 
	 * This function parses the XML information and saves only the currently active player to the players table    
	 * 
	 * This is only called when the league admin clicks the 'Load Players' button in the load players view  
	 * This uses and developers key and the information is returned as XML. 
	 * 
	 * @return number
	 */
	public function load_players() 
	{	
	 	$url = 'http://www.fantasyfootballnerd.com/service/players/xml/fr423dtjvi8q/';	
		$curl = curl_init($url);
		
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$curl_responseXML = curl_exec($curl);
		
		if ($curl_responseXML === false) {	
		    $info = curl_getinfo($curl);
		    curl_close($curl);
		    die('error occured during curl exec. Additioanl info: ' . var_export($info));
		}
	
		
		$xml = simplexml_load_string($curl_responseXML);
		curl_close($curl);
		$rows = 0;
		foreach( $xml->Player as $player )
		{	
			$active = (string) $player["active"];
			if ($active == '0')
				continue;
					
			$playerId = (string)$player["playerId"];			
			$fname = (string)$player["fname"];			
			$lname = (string)$player["lname"];			
			$displayName = (string)$player["displayName"];			
			$college = (string)$player["college"];			
			$dob = (string)$player["dob"];			
			$weight = (string)$player["weight"];			
			$height = (string)$player["height"];			
			$position = (string)$player["position"];			
			$team = (string)$player["team"];	
			$jersey = (string)$player["jersey"];
			$rosterItem = $displayName." ".$position." ".$team;
			
			$data = array($college, $dob, $weight, $height, $position, $team, $displayName, $fname, $lname, $jersey, $active, $playerId, $rosterItem);
			$sql = "INSERT INTO players (college, dob, weight, height, position, team, displayName, fname, lname, jersey, active, playerId, rosterItem) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$results = $this->db->query($sql, $data);
			$rows += $this->db->affected_rows();
		}
		return $rows;
	}
	
	/**
	 * function that delete all the nfl player information from the players table
	 */
	public function delete_players()
	{
		$sql = "DELETE FROM players";
		$result = $this->db->query($sql);
		return $this->db->affected_rows();
	}
	
	/**
	 * function that get the information that is used in the available player and startng lineup lists.
	 * 
	 *  returns and array of the displayname, position and nfl team
	 */
	public function get_players()
	{
		$sql = "SELECT displayName, position, team FROM players";
		$query = $this->db->query($sql);
		return($query->result_array());	
	}
}