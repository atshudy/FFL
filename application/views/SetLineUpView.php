<?php include_once ('header.php'); ?>
<div align="center">
	<h3>Set Lineup</h3>	
</div>
<div class="container-fluid">
<?php 
			$hidden = array('result'=> '');
			echo form_open('SetLineUpController/submit_line_up', '',$hidden);
?><div class="row">
  	<h3 class="col-xs-3 .col-xs-4">Available Players</h3>
  		<h3 align="center" class="col-xs-3 .col-xs-4">
  			<button id="submitLineUp" class="btn btn-primary btn-xs">Set Line Up</button>
  			<button id="moveAllItems" class="btn btn-primary btn-xs">Reset Line Up</button>
  		</h3>
  		<h3 class="col-xs-3 .col-xs-4">Starting lineups</h3>
  	</div>
  	<div>
  		<label for="search">Search:</label>
	    <input id="search" type="text" autocomplete="off"><br>
	</div>    
  	<div class="row">
	     <div class="col-xs-6 .col-xs-4">
<?php 	
				    echo "<ul id='sortable1' class='connectedSortable' tabindex='-1'>";
				    if (isset($sortable1))
				    {
						foreach($sortable1 as $singlearr) 
						{
							foreach($singlearr as $row)
							{	
								echo "<li class='ui-state-highlight'>\t".trim($row)."</li>";
							}
					    }
				    }
				    echo "</ul>";
?></div>	
  <div class="col-xs-6 .col-xs-4">
<?php 	
						echo "<ul id='sortable2' class='connectedSortable' tabindex='-1'>";
						if (isset($sortable2))
						{
							foreach($sortable2 as $singlearr) 
							{
								foreach($singlearr as $row)
								{	
									echo "<li class='ui-state-highlight'>\t".trim($row)."</li>";
								}
						    }
					    }
					    echo "</ul>";
?></div>
</div>	
<?php form_close(); ?>										
</div>
<?php include_once ('footer.php'); ?>