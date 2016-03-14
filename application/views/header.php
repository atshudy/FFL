<!DOCTYPE html>
<html> 
    <head>
    	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url().'application/css/bootstrap.min.css'?>">
		<link rel="stylesheet" href="<?php echo base_url().'application/css/bootstrap-theme.min.css'?>">
    	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css"/>
    	<link rel="stylesheet" href="<?php echo base_url().'application/css/main.css'?>">
  		<title>Fantasy Footbal Playoffs</title>	
    </head>
<body>
<div class="container" > <!-- this div tag is close in the footer.php -->
	<div id="header"  class="row">
		<div class="span12">
          <div>
			  <ul class="nav nav-tabs">
				<li><a href="<?php echo base_url().'HomeLeagueController/'?>"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
				<li><a href="<?php echo base_url().'LiveScoringController/'?>"><span class="glyphicon glyphicon-refresh"></span>  Live Scoring</a></li>
				<li><a href="<?php echo base_url().'SetLineUpController/'?>"><span class="glyphicon glyphicon-cog"></span>  Set Lineup</a></li>
				<li><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url().'UnderConstructionController/'?>"> <b class="caret" ></b><span class="glyphicon glyphicon-wrench"></span>  Settings</a>
			          <ul class="dropdown-menu">
			          	<li><a href="<?php echo base_url().'CreateLeagueController/'?>">New League</a></li>
			          	<li><a href="<?php echo base_url().'CreateAccountController/'?>">New Account</a></li>
			          	<li><a href="<?php echo base_url().'EditAccountController/'?>">Edit Account</a></li>
			          	<li><a href="<?php echo base_url().'EditAccountController/delete_account'?>">Delete Account</a></li>
			            <li><a href="<?php echo base_url().'LoadPlayersController/'?>">Load Players</a></li>
			            <li><a href="<?php echo base_url().'LeagueScoringSettingsController/'?>">Scoring Settings</a></li>
			          </ul>
			     </li>
				<li><a href="<?php echo base_url().'LogoutController/'?>"><span class="glyphicon glyphicon-off"></span>  logoff</a></li>
				<li><a href="<?php echo base_url().'application/doc/about.html'?>"><span class="glyphicon glyphicon-info-sign" target="_blank"></span>  About</a></li>				
				<li class="pull-right"><h5> Hi <?php echo $this->session->userdata('username');?></h5></li>
			</ul>
		  </div>
  	</div>
	</div>
	<div align="right"><h5><?php echo $this->session->userdata('teamname'); ?></h5></div>
	