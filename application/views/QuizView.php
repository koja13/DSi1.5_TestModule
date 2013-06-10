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
	userFinishedQuiz = false;
	
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
			  }, "fast");
			
		
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
		  }, "fast");
		  
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
			
			userFinishedQuiz = true;
			resultsSent = true;
			
			
		}
	}


	//element.find(">:first-child")
	
/*	$(".answer").click(function(element) {
  		//alert("jksndcjs");
  		alert(this.find(":first-child"));
	});*/
	
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
						$("#countdownDivQuiz").empty();
						
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

    
</div>