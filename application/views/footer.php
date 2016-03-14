

	<br>
	<div id="footer" class="row">
		<div class="span12">
			<!-- <img width="10%" height="10%" src="<?php echo base_url().'application/img/PLAYOFFS.jpg';?>" class="img-thumbnail" alt="Fantasy Football Playoffs">  -->	
			<h5 align="center">
			Copyright &copy;  <?php echo date("Y"); ?>
			<?php 
			date_default_timezone_set("America/New_York");
			$today = date("F j, Y g:i:s a");
			echo "Page Loaded on $today";
			?>		
			</h5>
		</div>
	</div>
</div>  <!-- this is the closing tag for the div thats in the header.php -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script src="<?php echo base_url().'application/js/bootstrap.min.js'?>"></script>
<script src="<?php echo base_url().'application/js/jquery.ui.touch-punch.min.js'?>"></script>
<script src="<?php echo base_url().'application/js/ffl_Utils.js'?>"></script>
</body>
</html>