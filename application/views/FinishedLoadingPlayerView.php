<?php include_once ('header.php'); ?>
 <div class="container">
	<div class="row">
		<h3>Load Players</h3>
	<div class="row">	
		<div class="col-md-4 col-md-offset-4">
 	<?php 		
 	if ($this->session->flashdata('message')) {
    ?>
    <div class="alert alert-warning">
        <a class="close" data-dismiss="alert">×</a>
        <?php echo $this->session->flashdata('message'); ?>
    </div>
    <?php
    }
    ?>
 			<h2><?php echo "Finished Loading";?></h2>
    	</div>
    </div>
 </div>	
</div>
<?php include_once ('footer.php'); ?>
