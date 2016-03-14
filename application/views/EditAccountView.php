<?php include_once ('header.php'); ?>
<div class="container" >
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
		<div>
			<h3>Edit Account</h3>	
		</div>
		  <form class="form form-horizontal" method="post" action="<?php echo base_url().'EditAccountController/edit_account'?>">
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="fname">First Name:</label>
	          		<input type="text" class="form-control" id="fname" value="<?php echo $userInfo['2']; ?>" name="fname">
	          	</div>	
	        </div>
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="lname">Last Name:</label>
	          		<input type="text" class="form-control" id="lname" value="<?php echo $userInfo['3']; ?>" name="lname">
	          	</div>	
	        </div>
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="username">User Name:</label>
	          		<input type="text" class="form-control" id="username" value="<?php echo $userInfo['0']; ?>" name="username">
	          	</div>	
	        </div>
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="password">Password:</label>
	          		<input type="password" class="form-control" id="password" value="" name="password">
	        	</div>
	        </div>
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="email">Email:</label>
	          		<input type="email" class="form-control" id="email" value="<?php echo $userInfo['1']; ?>" name="email">
	        	</div>
	        </div>
	        <div class="form-group">
	        	<div class="col-xs-3">
	          		<label for="teamname">Team Name:</label>
	          		<input type="text" class="form-control" id="teamname" value="<?php echo $userInfo['4']; ?>" name="teamname">
	        	</div>
	        </div>
	        <br>
	        <button type="submit" class="btn btn-primary">Update Account</button>
	        <br>
	       </form>
	</div>
</div>
<?php include_once ('footer.php'); ?>