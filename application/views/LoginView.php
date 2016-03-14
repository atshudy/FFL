<?php include_once ('header.php'); ?>
<div class="container" >
 <div class="row">
 	 <?php echo validation_errors('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>Error! </strong>', '</div>');?>
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
	<div class="alert-messages"></div>
	<h2>Login</h2>
	  <form class="form form-horizontal" method="post" action="<?php echo base_url().'LoginController/validate_credentials/'?>">
        <input id="sendtouser "type=hidden>
        <div class="form-group">
        	<div class="col-xs-3">
          		<label for="username">User Name:</label>
          		<input type="text" class="form-control" id="username" placeholder="Enter User Name" name="username">
          	</div>	
        </div>
        <div class="form-group">
        	<div class="col-xs-3">
          		<label for="pwd">Password:</label>
          		<input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        	</div>
        </div>
        <div>
	       <p><button type="submit" class="btn btn-primary">Login</button></p>
	    </div>
	    <div>
	        <input id="base_url" type="hidden" value="<?php echo base_url()?>">
	        <p><a id="sendemail">Get password ?</a></p>
        	<p><a href="<?php echo base_url().'CreateAccountController/index/'?>">Create New Account</a></p>
        </div>	
       </form>
 </div>
 </div>	   
<?php include_once ('footer.php'); ?>
