<?php include_once ('header.php'); ?>
<div class="container" >
 	<div class="row">
		<?php echo validation_errors('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>Error! </strong>', '</div>');?>
		<div>
			<h3>Create an Account</h3>	
		</div>
		  <form class="form form-horizontal" method="post" action="<?php echo base_url().'CreateAccountController/create_account'?>">
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="leagueId">League Id:</label>
	          		<select name="leagueId" autofocus>
	          		<?php 
					   	foreach ($leagueInfo as $league)
						{
							echo "<option value=".$league[leagueId].">".$league[leaguename]."</option>";
						}
					 ?>  
					</select> 
	          	</div>	
	        </div>
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="fname">First Name:</label>
	          		<input type="text" class="form-control" id="fname" placeholder="Enter first Name" name="fname">
	          	</div>	
	        </div>
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="lname">Last Name:</label>
	          		<input type="text" class="form-control" id="lname" placeholder="Enter last Name" name="lname">
	          	</div>	
	        </div>
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="username">User Name:</label>
	          		<input type="text" class="form-control" id="username" placeholder="Enter User Name" name="username">
	          	</div>	
	        </div>
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="password">Password:</label>
	          		<input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
	        	</div>
	        </div>
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="email">Email:</label>
	          		<input type="email" class="form-control" id="email" placeholder="Enter email adress" name="email">
	        	</div>
	        </div>
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="teamname">Team Name:</label>
	          		<input type="text" class="form-control" id="teamname" placeholder="Enter your team name" name="teamname">
	        	</div>
	        </div>
	        <br>
	        <button type="submit" class="btn btn-primary">Create Account</button>
	        <br>
	       </form>
	</div>
</div>
<?php include_once ('footer.php'); ?>
