<?php include_once ('header.php'); ?>
 <div class="container">
	<div class="row">
		<h3>Load Players</h3>
	<div class="row">	
		<div class="btn-group col-md-4 col-md-offset-4" >
  		<!-- <a href="<?php //echo base_url().'LoadPlayersController/add_allplayers'?>" class="btn btn-primary btn-lg">Load Players</a>  -->
  		<form action="<?php echo base_url().'LoadPlayersController/add_allplayers'?>">	
  			<button  type="submit" id="LoadingButton" data-loading-text="Loading.." class="btn btn-primary" autocomplete="off">Load Players</button>
  		</form>	
    	</div>
    </div>
 </div>	
</div>
<?php include_once ('footer.php'); ?>
