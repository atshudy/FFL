<?php include_once ('header.php'); ?>
<div class="container">
	<div class="row">
		<div id="hd-scorestrip">
			<div id="hdscorestripContainer">
				<embed height="50" width="1024" flashvars="url=/liveupdate/scorestrip/ss.xml&baseUrl=http://www.nfl.com" wmode="transparent" base="" allowscriptaccess="always" quality="true" bgcolor="#ffffff" name="hdscorestripSWF" id="hdscorestripSWF" style="" src="http://flash.static.nfl.com/static/site/flash/scorestrip/global-alt.swf" type="application/x-shockwave-flash">
			</div>
		</div>
	</div>
</div>
<?php include_once ('UnderConstructionView.php'); ?>		
<script type="text/javascript">
nfl.global.embedScoreStrip(
{
	srcNode: "hdscorestripContainer",
	url: '/liveupdate/scorestrip/ss.xml'
});
</script>
<?php include_once ('footer.php'); ?>