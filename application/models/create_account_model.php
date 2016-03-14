<?php
class Create_account_model extends CI_Model
{
	/**
	 * function that inserts the account information into users and the teams tables. 
	 * random integer is used as the teamId and userId.  This Id is the primary key used for all the user information.
	 * the user information consists of records in the following tables.
	 * users
	 * teams
	 * availablelineup
	 * startinglineup  
	 * 
	 * @return boolean
	 */
	public function add_account()
	{
		// will add a record to the following tables
		// 'users' and 'teams'
		$leagueId = $this->input->post('leagueId');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$email = $this->input->post('email');
		$teamname = $this->input->post('teamname');
		
		$Id = mt_rand(1, 100000);
		$sqlteamsIns = "INSERT INTO teams (teamId, leagueId, week1score, week2score, week3score, week4score,teamname) VALUES (?,?,?,?,?,?,?)";
		$teamsdata = array ($Id, $leagueId,0,0,0,0, $teamname);
		$teamsresult = $this->db->query($sqlteamsIns, $teamsdata);
		if ($teamsresult == true)
		{
 			$sqlusersIns = "INSERT INTO users (userId, username, password, teamname, email, leagueId, fname, lname) VALUES (?,?,?,?,?,?,?,?)";
			$usersdata = array ($Id, $username, $password, $teamname, $email, $leagueId, $fname, $lname);
			$usersresult = $this->db->query($sqlusersIns, $usersdata);
			return $usersresult;
		}
		else 
		{
			return ($teamsresult);
		}
	}
	
}

?>