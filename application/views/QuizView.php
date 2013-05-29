

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
 			
 			
 			
 <!--  	<form action="">-->
 			


      <div id="q1" class="question">
      
      	<p id="question1" class ="qPar"> Ovo je pitanje broj 1? </p> <br />

      	<p class="answer"><input class="radio" type="radio" name="q1" id="q1a1" value="Odgovor 1"> <label for="q1a1">Odgovor 1</label></p>
      	<p class="answer"><input class="radio" type="radio" name="q1" id="q1a2" value="Odgovor 2"> <label for="q1a2">Odgovor 2</label></p>
      	<p class="answer"><input class="radio" type="radio" name="q1" id="q1a3" value="Odgovor 3"> <label for="q1a3">Odgovor 3</label></p>

      </div><br />

      
      <div id="q2" class="question">
	    
	    <p id="question2" class ="qPar">Ovo je pitanje broj 2? </p> <br />
      
      	<p class="answer"><input class="radio" type="radio" name="q2" id="q2a1" value="Odgovor 1"> <label for="q2a1">Odgovor 1</label></p>
      	<p class="answer"><input class="radio" type="radio" name="q2" id="q2a2" value="Odgovor 2"> <label for="q2a2">Odgovor 2</label></p>
      	<p class="answer"><input class="radio" type="radio" name="q2" id="q2a3" value="Odgovor 3"> <label for="q2a3">Odgovor 3</label></p>
      </div><br />
      
      <div id="q3" class="question" >

      	<p id="question3" class ="qPar">Ovo je pitanje broj 3? </p> <br />
      
      	<p class="answer"><input class="radio" type="radio" name="q3" id="q3a1" value="Odgovor 1"> <label for="q3a1">Odgovor 1</label></p>
      	<p class="answer"><input class="radio" type="radio" name="q3" id="q3a2" value="Odgovor 2"> <label for="q3a2">Odgovor 2</label></p>
      	<p class="answer"><input class="radio" type="radio" name="q3" id="q3a3" value="Odgovor 3"> <label for="q3a3">Odgovor 3</label></p>
      </div>
      
      <div id="submit">
      	<input type="submit" class="button" value="Next >>" />
      </div>
      
    <!--  </form>-->
</div>