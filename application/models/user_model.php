<?php

class User_model extends CI_Model
{
	/**
	 * Function that validates the user exists in the database users table. Then loads information into the sessions userdata.
	 * The information in the usersdata is used to display the team names and the username in the righthand side of the header page. 
	 *
	 * @return boolean
	 */
	function validate()
	{
		$sql = "SELECT username, password, teamname, leagueId, userId FROM users WHERE username = ? AND password = ?";
		$usr = $this->input->post('username');
		$pswd = md5($this->input->post('password'));
		$query = $this->db->query($sql, array($usr, $pswd));
		$querydata = array_values($query->row_array());
		
			
		if (sizeof($querydata) > 0)
		{
			// is the logged in user the league admin
			$sqladmin = "SELECT count(*) FROM league WHERE adminname = ?";
			$query = $this->db->query($sqladmin, array($usr));
			$data = array_values($query->result_array());
			$is_admin = ($data['0']['count(*)'] > 0 ? true : false);
			
			// user has been validate
			$data = array(
					'username'=> $usr,
					'is_loggged_in' => true,
					'teamname' => $querydata[2],
					'leagueId' => (int)$querydata[3],
					'userId' => (int)$querydata[4],
					'is_admin' => $is_admin
			);
			$this->session->set_userdata($data);	
			return true;
		}
		else 
		{
			return false;
		}
	}
	
	/**
	 * Function the is called when the user clicks the 'Get password' link in the login page. 
	 * The function will send an email message with the users reset password. The email is a required field when creating the account. 
	 * The function resets the password to be the same as the username.
	 * @return boolean
	 */
	function send_email()
	{
		$sql = "SELECT email FROM users WHERE username = ?";
		$usr = $this->input->post('username');
		$query = $this->db->query($sql, array($usr));
		$data = array_shift($query->result_array());	
		if ($data == true)
		{
			// resetting the password to be the username
			$sqlup = "UPDATE users set password=? WHERE username = ?";
			$query = $this->db->query($sqlup, array(md5($usr), $usr));
			if ($query)
			{
				$to = $data['email'];
				$subject = "Fantasy Football playoffs is resetting your passord";
				$txt = "You have requesting to reset our password.  your password is ".$usr;
 				mail($to,$subject,$txt);
 				// successful in sending email
 				return true;
			}
			else
			{
				// unable to send email
				return false;	
			}			
		}
		else 
		{
			//unable to get users information
			return false;
		}
	}
	
	/**
	 * function that validates that the username exists in the users table.
	 * @return boolean
	 */
	function validate_username()
	{
		$sql = "SELECT username FROM users WHERE username = ?";
		$usr = $this->input->post('username');
		$query = $this->db->query($sql, array($usr));
		$record = array_values($query->row_array());
		$result = (count($record) > 0 ? true : false);
		return $result;
	}
	
	/**
	 * function the updaets the users information 
	 * 
	 * @return boolean
	 */
	function edit_account()
	{
		$usr = $this->input->post('username');
		$pwd = $this->input->post('password');
		$email = $this->input->post('email');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$team = $this->input->post('teamname');
		$userId = $this->session->userdata('userId');
		//password has not changed
		$sqlup = "UPDATE users set username=?, email=?, fname=?, lname=?, teamname=? WHERE userId=?";
		if (!empty($pwd))
		{
			//password has changed
			$sqlup = "UPDATE users set username=?, password='".md5($pwd)."',email=?, fname=?, lname=?, teamname=? WHERE userId=?";
		}
		$queryusers = $this->db->query($sqlup, array($usr, $email, $fname, $lname, $team, $userId));
		if ($queryusers == true)
		{
			// update the teams table teamId and userId are the same primary values
			$sqlup = "UPDATE teams set teamname=? WHERE teamId=?";
			$queryteams = $this->db->query($sqlup, array($team, $userId));
			if ($queryteams == true)
			{ 
				// update username and teamname
				$data = array(
						'username'=> $usr,
						'teamname' => $team,
				);
				$this->session->set_userdata($data);
			}
			return $queryteams;
		}
		return $queryusers;
	}
	
	/**
	 * function that returns the users inforamtion to populate the edit account form.
	 * @return array:
	 */
	function get_account()
	{
		$sql = "SELECT username, email, fname, lname, teamname FROM users WHERE userId = ?";
		$query = $this->db->query($sql, array($this->session->userdata('userId')));
		$record = array_values($query->row_array());
		return $record;
	}
	
	/**
	 * function that deletes the users account information and assocated information from the following tables.
	 * users table: deltes the users information when account was created.
	 * teams table: deletes team names when account was created.
	 * availablelineup: deletes all the available players.
	 * startinglineup: deletes all the selected players use for ther starting linup.  
	 * 
	 */
	function delete_account()
	{
		$usrId = $this->session->userdata('userId'); 
		$this->db->delete('users', array('userId' => $usrId));
		$this->db->delete('teams', array('teamId' => $usrId));
		$this->db->delete('availablelineup', array('teamId' => $usrId));
		$this->db->delete('startinglineup', array('teamId' => $usrId));
	}
}

?>