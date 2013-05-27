

	<!------------------------------------- jQuery biblioteke  ------------------------------------->
	<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery-1.7.2.js');?>"></script>	
	<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery-ui.min.js');?>"></script>
<!--
	<script type="text/javascript" src="<?php //echo base_url('/assets/js/findAndReplaceDOMText.js');?>"></script>
	<script type="text/javascript" src="<?php //echo base_url('/assets/js/jsFunctionsTestModule.js');?>"></script>
  
	<script src="<?php //echo base_url('assets/countdownTimer/countdown/jquery.countdown.js')?>"></script>
	<script src="<?php //echo base_url('assets/countdownTimer/js/script.js')?>"></script>
-->



<div id='navigationDiv'>
<nav> <?php echo anchor('user/logout', 'Logout', array('class'=>'focus') ); ?> </nav>
</div>

<!------------------------- mainDiv, centralni div u koji se ucitava tekst ------------------------->
<div id='mainQuizDiv'>
 			
 			
 			
 <!--  	<form action="">-->
 			


      <div id="q1" class="question">
      <p id="question1" class = "qPar"> Pitanje 1? </p> <br />
      
      	<input class="radio" type="radio" name="q1" value="">  Odgovor 1<br />
      	<input class="radio" type="radio" name="q1" value="">  Odgovor 2<br />
      	<input class="radio" type="radio" name="q1" value="">  Odgovor 3<br />

      </div><br />

      
      <div id="q2" class="question">
	      <p id="question2" class = "qPar" >Pitanje 2? </p> <br />
      
      	<input class="radio" type="radio" name="q2" value="">  Odgovor 1<br />
      	<input class="radio" type="radio" name="q2" value="">  Odgovor 2<br />
      	<input class="radio" type="radio" name="q2" value="">  Odgovor 3<br />
      </div><br />
      
      <div id="q3" class="question" >
	      <p id="question3" class = "qPar">Pitanje 3? </p> <br />
      
      	<input class="radio" type="radio" name="q3" value="">  Odgovor 1<br />
      	<input class="radio" type="radio" name="q3" value="">  Odgovor 2<br />
      	<input class="radio" type="radio" name="q3" value="">  Odgovor 3<br />
      </div>
      
      <div id="submit">
      	<input type="submit" class="button" value="Next >>" />
      </div>
      
    <!--  </form>-->
</div>