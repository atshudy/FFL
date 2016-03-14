<?php include_once ('header.php'); ?>
<div align="center">
	<?php $team = $this->session->userdata('teamname'); ?>
	<h3>Home</h3>	
</div>
<div class="container" >
  	<div class="row">
	         <div class="col-xs-6">
  				<h3>Current Standings:</h3>
  				<table class="table table-hover" id="standings">
				  <thead>
				    <tr>
				      <th>Team Name</th>
				      <th>Total Points</th>
				    </tr>
				  </thead>
				  <tbody>
				    <?php 
				    foreach ($currentstand["teamdata"] as $row){
				    	echo "<tr><td>".$row[0]."</td>";
				    	echo "<td>".$row[1]."</td></tr>";
				    }
				    ?>
				  </tbody>
				</table>			
  			</div>
  			<div class="col-xs-6"><h2></h2>
				 <h3>Starting LineUp</h3>
				 <table class="table table-hover" id="startinglineup">
   					<thead>
					    <tr>
					      <th>Player Name</th>
					      <th>Position</th>
					      <th>NFL Team</th>
					    </tr>
					  </thead>
					  <tbody>
					    <?php 
					    foreach ($currentstand["playerdata"] as $row){
					    	echo "<tr><td>".$row[0]."</td>";
					    	echo "<td>".$row[1]."</td>";
					    	echo "<td>".$row[2]."</td></tr>";
					    }
					    ?>
					  </tbody>
					</table>
		     </div>
	  </div>
</div>
<?php include_once ('footer.php'); ?>