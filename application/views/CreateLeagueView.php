<?php include_once ('header.php'); ?>
<div class="container" >
 	<div class="row">
		<?php echo validation_errors('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>Error! </strong>', '</div>');?>
		<div>
			<h3>Create League</h3>	
		</div>
		  <form class="form form-horizontal" method="post" action="<?php echo base_url().'CreateLeagueController/create_new_league'?>">
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="leagueId">League Id:</label>
	          		<?php
	          		$id = mt_rand(1, 100000);
	          		echo "<input type='hidden' name='leagueId' value='$id'>";
	          		echo "<input type='text' class='form-control' id='leagueId' name='leagueId' value='$id'  readonly>";
	          		?>
	          	</div>
	         </div>
	         <div class="form-group"> 		
	        	<div class="col-xs-3">
	          		<label for="leagueName">League name:</label>
	          		<input type="text" class="form-control" id="leaguename" placeholder="Enter League Name" name="leaguename" autofocus>
	          	</div>	
	        </div>
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="username">Admin User Name:</label>
	          		<input type="text" class="form-control" id="username" placeholder="Enter User Name" name="username">
	          	</div>	
	        </div>
	       	<br>
	        	<button type="submit" class="btn btn-primary">Create new league</button>
	        <br>
	      </form>
	</div>
</div>
<?php include_once ('footer.php'); ?>