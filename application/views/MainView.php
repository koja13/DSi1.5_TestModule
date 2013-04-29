<div id="content">
<script type="text/javascript" >

 var config = {
     base_url: "<?php echo base_url(); ?>",
     site_url: "<?php echo site_url(); ?>",
     controller: "ReadController",
     opposite_controller: "EditController"
 };

</script>

<nav><?php echo anchor('#', 'Start test') . " | " . anchor('user/logout', 'Logout', array('class'=>'focus') ); ?></nav>

	<!------------------------------------- jQuery biblioteke  ------------------------------------->

	<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery-1.7.2.js');?>"></script>	
	<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery-ui.min.js');?>"></script>

	<script src="<?php echo base_url('assets/countdownTimer/countdown/jquery.countdown.js')?>"></script>
	<script src="<?php echo base_url('assets/countdownTimer/js/script.js')?>"></script>
		
	<script type="text/javascript" src="<?php echo base_url('/assets/js/findAndReplaceDOMText.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('/assets/js/jsFunctions.js');?>"></script>


	<div id="countdown"> </div>
		
<!------------------------- mainDiv, centralni div u koji se ucitava tekst ------------------------->
<div id='mainDiv'></div>

<!------------------------- bottomDiv, donji div u kome se prikazuju veze izmedju reci u tekstu ------------------------->

<div id='bottomDiv'></div>
<?php 
			// ucita se ime modela u globalnu promenljivu
			// prikaz dugmeta za download rdf grafa		
			print ("<script>
						rdfGraphName =\"". "model" . ".rdf\";
					</script>");


			// upisivanje imena fajla sa tekstom u globalnu promenljivu, i ucitavanje tog teksta iz fajla na serveru
			print ("<script>
						textFileName =\"". "tekst" . "." . "html" . "\";
						getTextFromServer(\"". "tekst" . "." . "html" . "\");
					</script>");		
?>
		
		
		
		
</div><!--<div id="content">-->