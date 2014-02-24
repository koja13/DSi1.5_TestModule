<script src="<?php echo base_url('assets/countdownTimer/countdown/jquery.countdown.Quiz.js')?>"></script>
<script src="<?php echo base_url('assets/countdownTimer/js/QuizCountdownScript.js')?>"></script>

<script src="<?php echo base_url('assets/js/QuizScript.js')?>"></script>

<!------------------------------- navigationDiv --------------------------------->
<div id='navigationDiv'>

<!-------------------------- countdownDivQuiz, tajmer --------------------------->
	<div id="countdownDivQuiz">
		<div id="countdown"> </div>	
	</div>
	
	<nav> <?php echo anchor('UserController/logout', 'Logout', array('class'=>'focus') ); ?> </nav>
	
</div>

<script>
sendUserActionsLessions(null, "start_quiz", null);
</script>

<!------------------------- mainQuizDiv, centralni div u koji se ucitava tekst ------------------------->
<div id='mainQuizDiv'>
 	
<!-------------------------- progressDiv --------------------------->
<div id="progressOutDiv">
	<div id="progressInDiv">
	</div>
</div>

<?php

	// ucitavanje pitanja na stranu iz promenljive ($questions) dobijene od servera
	echo "<script> var numberOfQuestions = " . count($questions) . "; </script>";

	for ($i = 1; $i <=30; $i++)
	{
		echo $questions[$i];
	}

?>

<div id="divPrevNext">

	<span id="prevButtonSpan">
		<button id="prevButton" type="button" class="button" onclick="prevQuestionPage();">PREVIOUS</button>
	</span>
	
	<span id="nextButtonSpan">
		<button id="nextButton" type="button" class="button" onclick="nextQuestionPage();">NEXT</button>
	</span>
			
	<span id="finishButtonSpan">
		<input  id="finishButton" type="button" onclick="finishQuiz();" value="FINISH!"/>
	</span>
	
</div>

<script>

	//broj pitanja na strani
	var qCount = 3;
	
	// broj strana sa pitanjima
	var numberOfQuestionPages = numberOfQuestions/qCount;

	// procenti za progress div
	var progressPercents = 100/numberOfQuestionPages;
	$("#progressInDiv").width(progressPercents + "%");
	//progressPercents += 100/numberOfQuestionPages;
	
	// niz u kome ce se cuvati odgovori koje korisnik odabere
	var userAnswers = new Array();

	// bool promenljive
	var resultsSent = false;
	userFinishedQuiz = false;

	// skrivanje prev i finish dugmica pri pokretanju kviza
	$("#prevButton").hide();
	$("#finishButton").hide();


</script>

</div>