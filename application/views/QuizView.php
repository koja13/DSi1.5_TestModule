<script src="<?php echo base_url('assets/countdownTimer/countdown/jquery.countdown.Quiz.js')?>"></script>
<script src="<?php echo base_url('assets/countdownTimer/js/QuizCountdownScript.js')?>"></script>


<div id='navigationDiv'>

	<div id="countdownDivQuiz">
		<div id="countdown"> </div>	
	</div>
	
	<nav> <?php echo anchor('user/logout', 'Logout', array('class'=>'focus') ); ?> </nav>
	
</div>

<!------------------------- mainDiv, centralni div u koji se ucitava tekst ------------------------->
<div id='mainQuizDiv'>
 			
 		
 			
 <!--  	<form action="">-->
 			
<?php //$this->load->helper('array');?>
<?php //echo $question1['question'];?>
<?php //echo element('question',"$question"+"1");?>
<?php //echo $q['question1']['question'];?>



<?php //echo $question1;?>
<?php //echo $question2;?>
<?php //echo $questions[1];?>
<?php //echo $question2;?>


<div id="progressOutDiv">
	<div id="progressInDiv">
	</div>
</div>

	<?php
	echo "<script> var numberOfQuestions = " . count($questions) . "; </script>";

for ($i = 1; $i <=30; $i++)
{

	echo $questions[$i];
}

?>
<script>
sendUserActionsLessions(null, "start_quiz", null);
</script>
<div id="divPrevNext">

	<span id="prevButtonSpan">
		<button id="prevButton" type="button" class="button" onclick="prevQuestionPage();">PREVIOUS</button>
	</span>
	
	<span id="nextButtonSpan">
		<button id="nextButton" type="button" class="button" onclick="nextQuestionPage();">NEXT</button>
	</span>
	
<?php // $attributes = array('id' => 'finishQuiz');
	//echo form_open("user/QuizResultPage", $attributes); ?>
			
	<span id="finishButtonSpan">
		<input  id="finishButton" type="button" onclick="finishQuiz();" value="FINISH!"/>
	</span>
<?php // echo form_close(); ?>
</div>

<script>



// broj pitanja na strani
	var qCount = 3;

	// broj strana sa pitanjima
	var numberOfQuestionPages = numberOfQuestions/qCount;

	var progressPercents = 100/numberOfQuestionPages;
	$("#progressInDiv").width(progressPercents + "%");
	//progressPercents += 100/numberOfQuestionPages;
	
	var userAnswers = new Array();
	var resultsSent = false;
	
	$("#prevButton").hide();
	$("#finishButton").hide();


	function prevQuestionPage()
	{
		//alert(qCount);
		//alert("q" +(parseInt(qCount)-2));
		$("#q" + (parseInt(qCount)-2)).hide();
		$("#q" + (parseInt(qCount)-1)).hide();
		$("#q" + (parseInt(qCount)-0)).hide();
		
		$("#q" + (parseInt(qCount)-5)).show();
		$("#q" + (parseInt(qCount)-4)).show();
		$("#q" + (parseInt(qCount)-3)).show();
		qCount -= 3;

		if(qCount<=3)
		{
			$("#prevButton").hide();
		}
		
		if(qCount<=27)
		{
			$("#finishButton").hide();
			$("#nextButton").show();
			$("#progressInDiv").css({'border-top-right-radius': '0px', 'border-bottom-right-radius': '0px'});
		}
		
		progressPercents -= 100/numberOfQuestionPages;


		
			  $("#progressInDiv").animate({
			    
			    width:progressPercents + "%"
			  }, "slow");
			
		
		//$("#progressInDiv").width(progressPercents + "%");
		
	}

	function nextQuestionPage()
	{
		//alert(qCount);
		//alert("q" +(parseInt(qCount)-2));
		$("#q" + (parseInt(qCount)-2)).hide();
		$("#q" + (parseInt(qCount)-1)).hide();
		$("#q" + (parseInt(qCount)-0)).hide();
		
		$("#q" + (parseInt(qCount)+1)).show();
		$("#q" + (parseInt(qCount)+2)).show();
		$("#q" + (parseInt(qCount)+3)).show();
		qCount += 3;
		
		if(qCount>3)
		{
			$("#prevButton").show();
		}
		
		if(qCount>27)
		{
			$("#nextButton").hide();
			$("#finishButton").show();
			
			$("#progressInDiv").css({'border-top-right-radius': '7px', 'border-bottom-right-radius': '7px'});
			//$("#progressInDiv").attr("border-bottom-right-radius", "7px" );
		}

		progressPercents += 100/numberOfQuestionPages;


		$("#progressInDiv").animate({
		    
		    width:progressPercents + "%"
		  }, "slow");
		  
		//$("#progressInDiv").width(progressPercents + "%");
		
		
	}
	
	function finishQuiz()
	{
		if(resultsSent!=true)
		{
			for(var i=1;i<=30;i++)
			{
				if($("input[name=q"+i+"]:checked").val()==null)
				{
					userAnswers[i] = null;
				}
				else
				{
					var answerId =  $("input[name=q"+i+"]:checked").attr('id');
					var userAnswer = answerId.substr(-1,1);
					userAnswers[i] = userAnswer;
				}
			}
		
			sendUserActionsLessions(null, "end_quiz", null);
			sendQuizResults();

			resultsSent = true;
			
		}
	}
		
	function sendQuizResults()
	{	  
		$.ajax({
			  type: "POST",
			  url: config.site_url + "/user/getQuizResults",
			  data: {	
				  		userAnswers: userAnswers,
						currentDateTime: getCurrentTime()
			  		}
			}).done(function( response ) {

				if(response == "Success")
				{
						$("#nextButton").hide();
						$("#finishButton").hide();

						$("#q" + (parseInt(qCount)+1)).hide();
						$("#q" + (parseInt(qCount)+2)).hide();
						$("#q" + (parseInt(qCount)+3)).hide();
						
						$("#mainQuizDiv").html("Rezultati su sacuvani! Hvala sto ste ucestovali");
						showButtonQuizResults();
				}
			});
	}


	function showButtonQuizResults()
	{
		$("#mainQuizDiv").html("<input  id='ButtonQuizResults' type='button' onclick='QuizResults();' value='QUIZ RESULTS'/>");
	}
	
	function QuizResults()
	{
		window.location = config.site_url + "/user/QuizResultPage";
	}
</script>

<!-- 
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
      
      
      -->
    <!--  </form>
   
    
	<div id="submit">
      	<input type="submit" class="button" value="Next >>" />
      </div>
    -->
    
</div>