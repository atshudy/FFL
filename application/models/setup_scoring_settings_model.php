<?php
class Setup_scoring_settings_model extends CI_Model
{
	/**
	 * function that saves the scoring settings information to the database.  
	 * if nothing is already saved for the league a default scoring set is saved. 
	 * 
	 * @return boolean
	 */
	public function save_scoring_settings()
	{	
		$pts_per_recpt = $this->input->post('points_per_reception');
		$pts_per_recpt_yds = $this->input->post('points_per_receiving_yard');
		$pts_per_pass_yrds = $this->input->post('points_per_passing_yards');
		$pts_per_pass_td = $this->input->post('points_per_passing_td');
		$pts_per_rush_yrds = $this->input->post('points_per_running_yards');
		$pts_per_rush_passing_td = $this->input->post('points_per_rushing_and_recieving_td');
		$pts_per_fumble = $this->input->post('points_per_fumble');
		$pts_per_sack= $this->input->post('points_per_sack');
		$pts_per_intercept	= $this->input->post('points_per_interception');
		$pts_per_fumble_recover = $this->input->post('points_fumble_recovery');
		$pts_per_def_td = $this->input->post('points_per_defensive_td');
		$pts_per_safty = $this->input->post('points_per_safty');
		$pts_per_return_td = $this->input->post('points_per_return_td'); 
		$pts_per_return_yrds = $this->input->post('points_per_return_yards');
		$pts_per_extra_pt = $this->input->post('points_per_extra_point_made');
		$pts_per_field_goal_0_20 = $this->input->post('points_per_field_goal_0_20');
		$pts_per_field_goal_20_30  = $this->input->post('points_per_field_goal_20_30');
		$pts_per_field_goal_30_40 = $this->input->post('points_per_field_goal_30_40');
		$pts_per_field_goal_50 = $this->input->post('points_per_field_goal_50');
		$leagueId = $this->session->userdata('leagueId');
		
		$sqlsel = "SELECT count(*) FROM scoringsettings where leagueId=?";
		$sql = "INSERT INTO scoringsettings (
			pts_per_recpt,
			pts_per_recpt_yds,
			pts_per_pass_yrds, 
			pts_per_pass_td, 
			pts_per_rush_yrds, 
			pts_per_rush_passing_td, 
			pts_per_fumble, 
			pts_per_sack, 
			pts_per_intercept, 
			pts_per_fumble_recover,
			pts_per_def_td, 
			pts_per_safty, 
			pts_per_return_td, 
			pts_per_return_yrds, 
			pts_per_extra_pt, 
			pts_per_field_goal_0_20, 
			pts_per_field_goal_20_30, 
			pts_per_field_goal_30_40, 
			pts_per_field_goal_50, 
			leagueId) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$sqlup = "UPDATE scoringsettings SET 
			pts_per_recpt =?,
			pts_per_recpt_yds=?,
			pts_per_pass_yrds=?,
			pts_per_pass_td=?,
			pts_per_rush_yrds=?,
			pts_per_rush_passing_td=?,
			pts_per_fumble=?,
			pts_per_sack=?,
			pts_per_intercept=?,
			pts_per_fumble_recover=?,
			pts_per_def_td=?,
			pts_per_safty=?,
			pts_per_return_td=?,
			pts_per_return_yrds=?,
			pts_per_extra_pt=?,
			pts_per_field_goal_0_20=?,
			pts_per_field_goal_20_30=?,
			pts_per_field_goal_30_40=?,
			pts_per_field_goal_50=?
			WHERE leagueId=?";
		$data = array(
				$pts_per_recpt, 
				$pts_per_recpt_yds, 
				$pts_per_pass_yrds, 
				$pts_per_pass_td, 
				$pts_per_rush_yrds, 
				$pts_per_rush_passing_td, 
				$pts_per_fumble, 
				$pts_per_sack, 
				$pts_per_intercept,
				$pts_per_fumble_recover,
				$pts_per_def_td, 
				$pts_per_safty, 
				$pts_per_return_td, 
				$pts_per_return_yrds, 
				$pts_per_extra_pt, 
				$pts_per_field_goal_0_20, 
				$pts_per_field_goal_20_30, 
				$pts_per_field_goal_30_40, 
				$pts_per_field_goal_50, 
				$leagueId);
		
		$query = $this->db->query($sqlsel, array($leagueId));
		$querydata = array_values($query->result_array());
		if ($querydata['0']['count(*)'] > 0)
		{
			// update
			$result = $this->db->query($sqlup, $data);
		}
		else
		{
			// insert
			$result = $this->db->query($sql, $data);
		} 
		return($result);
	}
	
	/**
	 * function the gets the current scoring setting information for the league from the databases or a default set is returned. 
	 * 
	 * @return array
	 */
	public function get_current_settings ()
	{
		$sql = "SELECT pts_per_recpt,
			pts_per_recpt_yds,
			pts_per_pass_yrds,
			pts_per_pass_td,
			pts_per_rush_yrds,
			pts_per_rush_passing_td,
			pts_per_fumble,
			pts_per_sack,
			pts_per_intercept,
			pts_per_fumble_recover,	
			pts_per_def_td,
			pts_per_safty,
			pts_per_return_td,
			pts_per_return_yrds,
			pts_per_extra_pt,
			pts_per_field_goal_0_20,
			pts_per_field_goal_20_30,
			pts_per_field_goal_30_40,
			pts_per_field_goal_50
			FROM scoringsettings where leagueId=?";
		
		$query = $this->db->query($sql, array($this->session->userdata('leagueId')));
		$querydata = array_values($query->result_array());
		if (count($querydata) > 0)
		{
			return $querydata;
		}
		else
		{
			// use default
			$defaultdata = array(
				"pts_per_recpt"=>1,
				"pts_per_recpt_yds"=>1,
				"pts_per_pass_yrds"=>1,
				"pts_per_pass_td"=>6,
				"pts_per_rush_yrds"=>1,
				"pts_per_rush_passing_td"=>6,
				"pts_per_fumble"=>-2,
				"pts_per_sack"=>2,
				"pts_per_intercept"=>2,
				"pts_per_fumble_recover"=>2,
				"pts_per_def_td"=>6,
				"pts_per_safty"=>2,
				"pts_per_return_td"=>6,
				"pts_per_return_yrds"=>1,
				"pts_per_extra_pt"=>1,
				"pts_per_field_goal_0_20"=>3,
				"pts_per_field_goal_20_30"=>3,
				"pts_per_field_goal_30_40"=>3,
				"pts_per_field_goal_50"=>3);
			return array($defaultdata);
		}		
	} 
}

?>