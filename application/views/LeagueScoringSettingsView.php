<?php include_once ('header.php'); ?>
<div align="center">
	<h3>League Scoring Settings</h3>	
</div>
<div class="container">
 		<form class="form form-horizontal" method="post" action="<?php echo base_url().'LeagueScoringSettingsController/set_league_scoring_settings'?>">
 		<div class="row">
 			<?php echo validation_errors('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>Error! </strong>', '</div>');?>
  			<?php
    if ($this->session->flashdata('warningmessage')) {
    ?>
    <div class="alert alert-warning">
        <a class="close" data-dismiss="alert">×</a>
        <?php echo $this->session->flashdata('warningmessage'); ?>
    </div>
    <?php
    }else if ($this->session->flashdata('successmessage')){
?>
	<div class="alert alert-success">
        <a class="close" data-dismiss="alert">×</a>
        <?php echo $this->session->flashdata('successmessage'); ?>
    </div>
<?php } ?>
  			<div class="col-xs-3">
  			<h3>Offense</h3>
  			<?php 
  			$settings = array_pop($current_settings); 
  			?>
  					<label for="points_per_reception">Points Per Reception:</label>
					<input type="text" name="points_per_reception" value="<?php echo $settings['pts_per_recpt'];?>">
					
					<label for="points_per_receiving_yard">Points per 15 receiving yards.</label>
					<input type="text" name="points_per_receiving_yard" value="<?php echo $settings['pts_per_recpt_yds'];?>">
					
					<label for="points_per_running_yards">Points per 10 running yards:</label>
					<input type="text" name="points_per_running_yards" value="<?php echo $settings['pts_per_rush_yrds'];?>">
					
					<label for="points_per_passing_yards">Points per 20 passing yards:</label>
					<input type="text" name="points_per_passing_yards" value="<?php echo $settings['pts_per_pass_yrds'];?>">
					
					<label for="points_per_passing_td">Points per passing TD:</label>
					<input type="text" name="points_per_passing_td" value="<?php echo $settings['pts_per_pass_td'];?>">
					
					<label for="points_per_fumble">Points per fumble:</label>
					<input type="text" name="points_per_fumble" value="<?php echo $settings['pts_per_fumble'];?>">
					
					<label for="points_per_rushing_and_recieving_td">Points per rushing and recieving TD:</label>
					<input type="text" name="points_per_rushing_and_recieving_td" value="<?php echo $settings['pts_per_rush_passing_td'];?>">
					
					<label for="points_per_extra_point_made">Points per extra point made:</label>
					<input type="text" name="points_per_extra_point_made" value="<?php echo $settings['pts_per_extra_pt'];?>">
					
					<label for="points_per_field_goal_0_20">Points per field goal made less 20 yards:</label>
					<input type="text" name="points_per_field_goal_0_20" value="<?php echo $settings['pts_per_field_goal_0_20'];?>">
					
					<label for="points_per_field_goal_20_30">Points per field goal made from 20 to 30 yards:</label>
					<input type="text" name="points_per_field_goal_20_30" value="<?php echo $settings['pts_per_field_goal_20_30'];?>">
				
					<label for="points_per_field_goal_30_40">Points per field goal made from 30 to 40 yards:</label>
					<input type="text" name="points_per_field_goal_30_40" value="<?php echo $settings['pts_per_field_goal_30_40'];?>">
					
					<label for="points_per_field_goal_50">Points per field goal made greater than 50 yards:</label>
					<input type="text" name="points_per_field_goal_50" value="<?php echo $settings['pts_per_field_goal_50'];?>">	
  			</div>

			<div class="col-xs-3">
					<h3>Defense</h3>
					<label for="points_per_sack">Points per sack:</label>
					<input type="text" name="points_per_sack" value="<?php echo $settings['pts_per_sack'];?>">
					
					<label for="points_per_interception">Points per interception:</label>
					<input type="text" name="points_per_interception" value="<?php echo $settings['pts_per_intercept'];?>">
							
					<label for="points_fumble_recovery">Points per fumble recovery:</label>
					<input type="text" name="points_fumble_recovery" value="<?php echo $settings['pts_per_fumble_recover'];?>">
							
					<label for="points_per_defensive_td">Points per defensive TD:</label>
					<input type="text" name="points_per_defensive_td" value="<?php echo $settings['pts_per_def_td'];?>">
							
					<label for="points_per_safty">Points per safety:</label>
					<input type="text" name="points_per_safty" value="<?php echo $settings['pts_per_safty'];?>">
							
					<label for="points_per_return_td">Points per return TD:</label>
					<input type="text" name="points_per_return_td" value="<?php echo $settings['pts_per_return_td'];?>">
							
					<label for="points_per_return_yards">Points per 10 return yards:</label>
					<input type="text" name="points_per_return_yards" value="<?php echo $settings['pts_per_return_yrds'];?>">						
			</div>			
	 	</div>
	 	<div style="margin:20px">  
			<input class="btn btn-primary btn-sm" type="submit" value="Save Settings">
		</div>
		</form>
</div>		
<?php include_once ('footer.php'); ?>
