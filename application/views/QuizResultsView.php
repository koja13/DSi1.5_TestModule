

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
 			
 	<!--  	<div id="q1" class="question">
      
      	<p id="question1" class ="qPar"> Ovo je pitanje broj 1? </p> <br />

      	<p class="answer"><input class="radio" type="radio" disabled='disabled'name="q1" id="q1a1" value="Odgovor 1" checked> <label for="q1a1">Odgovor 1</label><img src="<?php echo base_url("/correct.jpg")?>" alt="correct" height="23" width="23"></p>
      	<p class="answer"><input class="radio" type="radio" disabled='disabled'name="q1" id="q1a2" value="Odgovor 2"> <label for="q1a2">Odgovor 2</label><img src="<?php echo base_url("/wrong.jpg")?>" alt="correct" height="23" width="23"></p>
      	<p class="answer"><input class="radio" type="radio" disabled='disabled'name="q1" id="q1a3" value="Odgovor 3"> <label for="q1a3">Odgovor 3</label></p>

      </div><br />
 			-->	
 <!--  	<form action="">-->
 			
<?php echo "Hvala sto ste ucestvovali!";?>

<?php
/*
for ($i = 1; $i <=30; $i++)
{

	echo $questions[$i];
}
*/
?>
    
</div>