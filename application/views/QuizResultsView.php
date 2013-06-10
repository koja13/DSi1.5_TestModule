

	<!------------------------------------- jQuery biblioteke  ------------------------------------->
	<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery-1.7.2.js');?>"></script>	
	<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery-ui.min.js');?>"></script>
<!--
	<script type="text/javascript" src="<?php //echo base_url('/assets/js/findAndReplaceDOMText.js');?>"></script>-->
	<script type="text/javascript" src="<?php echo base_url('/assets/js/jsFunctionsTestModule.js');?>"></script>
  <!--  
	<script src="<?php //echo base_url('assets/countdownTimer/countdown/jquery.countdown.js')?>"></script>
	<script src="<?php //echo base_url('assets/countdownTimer/js/script.js')?>"></script>

-->


<div id='navigationDiv'>
<nav> <?php echo anchor('user/logout', 'Logout', array('class'=>'focus') ); ?> </nav>
</div>

<!------------------------- mainDiv, centralni div u koji se ucitava tekst ------------------------->
<div id='mainQuizDiv'>

<?php

for ($i = 1; $i <=30; $i++)
{

	echo $questions[$i];
}

?>
    <br /><br /><br />
</div>