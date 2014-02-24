	
	// ========================= prevQuestionPage() ========================
	//
	// funkcija koja korisniku prikazuje prethodnu grupu pitanja a sakrije trenutnu grupu pitanja
	// poziva je event handler za klik na dugme == prevButton, QuizView ==
	// 
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

		// ukoliko treba da se prikaze prva grupa pitanja onda se prev dugme ne prikazuje
		if(qCount<=3)
		{
			$("#prevButton").hide();
		}
		
		// ukoliko treba da se prikaze bilo koja grupa pitanja koja nije poslednja onda se finish dugme ne prikazuje
		if(qCount<=27)
		{
			$("#finishButton").hide();
			$("#nextButton").show();
			$("#progressInDiv").css({'border-top-right-radius': '0px', 'border-bottom-right-radius': '0px'});
		}
		
		// smanjivanje procenata prilikom vracanja na prethodnu grupu pitanja
		progressPercents -= 100/numberOfQuestionPages;

		// animiranje progres diva na osnovu procenata u kom delu kviza se korisnik trenutno nalazi
		$("#progressInDiv").animate({
			width:progressPercents + "%"
	    }, "fast");
			
		//$("#progressInDiv").width(progressPercents + "%");
		
	}
	
	// ========================= nextQuestionPage() ========================
	//
	// funkcija koja korisniku prikazuje narednu grupu pitanja a sakrije trenutnu grupu pitanja
	// poziva je event handler za klik na dugme == nextButton, QuizView ==
	// 
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
		
		// ukoliko treba da se prikaze bilo koja grupa pitanja a da nije prva grupa onda se prev dugme prikazuje
		if(qCount>3)
		{
			$("#prevButton").show();
		}
		
		// ukoliko treba da se prikaze poslednja grupa pitanja onda se prikazuje finish dugme, a sakriva se next dugme
		if(qCount>27)
		{
			$("#nextButton").hide();
			$("#finishButton").show();
			
			$("#progressInDiv").css({'border-top-right-radius': '7px', 'border-bottom-right-radius': '7px'});
			//$("#progressInDiv").attr("border-bottom-right-radius", "7px" );
		}

		// povecavanje procenata prilikom prelaza na narednu grupu pitanja
		progressPercents += 100/numberOfQuestionPages;

		// animiranje progres diva na osnovu procenata u kom delu kviza se korisnik trenutno nalazi
		$("#progressInDiv").animate({
		    
		    width:progressPercents + "%"
		  }, "fast");
		  
		//$("#progressInDiv").width(progressPercents + "%");
		
		
	}
	
	// =============================== finishQuiz() ==============================
	//
	// funkcija koja cuva korisnikove odgovore na pitanja u niz, a zatim ih prosledjuje serveru
	// poziva je event handler za klik na dugme == finishButton, QuizView ==
	// 
	function finishQuiz()
	{
		// ukoliko rezultati nisu vec poslati (moguc scenario jeste automatsko prosledjivanje rezultata nakon isteka vremena za kviz)
		if(resultsSent!=true)
		{
			for(var i=1;i<=30;i++)
			{
				if($("input[name=q"+i+"]:checked").val()==null)
				{
					// ukoliko nema odgovora na to pitanje, tj ukoliko nista nije cekirano onda se u niz upisuje null
					userAnswers[i] = null;
				}
				else
				{
					// ukoliko ima odgovora na to pitanje
					var answerId =  $("input[name=q"+i+"]:checked").attr('id');
					var userAnswer = answerId.substr(-1,1);
					userAnswers[i] = userAnswer;
				}
			}
		
			// belezenje akcije u bazi podataka
			sendUserActionsLessions(null, "end_quiz", null);
			
			// slanje rezultata serveru
			sendQuizResults();
			
			// setovanje bool promenljivih
			
			// korisnik je zavrsio kviz
			userFinishedQuiz = true;
			
			// rezultati su poslati
			resultsSent = true;

		}
	}

	// =============================== sendQuizResults() ==============================
	//
	// Ajax fja koja salje serveru odogovore na pitanja
	// poziva je fja finishQuiz()
	// 	
	function sendQuizResults()
	{	  
		$.ajax({
			  // u pitanju je post zahtev
			  type: "POST",
			  // link ka kome se upucuje zahtev, getQuizResults predstavlja metod na serveru koji ce da odgovori na zahtev
			  url: config.site_url + "/UserController/getQuizResults",
			  data: {	
			  // salju se odgovori na pitanja i vreme kada je zavrsen kviz
				  		userAnswers: userAnswers,
						currentDateTime: getCurrentTime()
			  		}
			}).done(function( response ) {

				if(response == "Success")
				{
					// ukoliko su odgovori uspesno poslati skriva se i poslednja grupa pitanja, kao i dugmici prev i finish
					$("#nextButton").hide();
					$("#finishButton").hide();

					$("#q" + (parseInt(qCount)+1)).hide();
					$("#q" + (parseInt(qCount)+2)).hide();
					$("#q" + (parseInt(qCount)+3)).hide();
						
					// korisniku se ispisuje da su rezultati sacuvani
					$("#mainQuizDiv").html("Rezultati su sacuvani! Hvala sto ste ucestovali");
						
					// prikazuje se dugme kojim korisnik moze da otvori stranu sa rezultatima kviza
					showButtonQuizResults();
					
					// brise se tajmer, tj div u kome se nalazi se ostavlja prazan
					$("#countdownDivQuiz").empty();
						
				}
			});
	}

	// =============================== showButtonQuizResults() ==============================
	//
	// fja koja prikazuje dugme za pokretanje strane sa rezultatima kviza
	// poziva je fja sendQuizResults()
	// 		
	function showButtonQuizResults()
	{
		$("#mainQuizDiv").html("<input  id='ButtonQuizResults' type='button' onclick='QuizResults();' value='QUIZ RESULTS'/>");
	}
	
	// =============================== QuizResults() ==============================
	//
	// fja koja redirektuje korisnika na stranu za pregled rezultata kviza
	// poziva je event handler za klik na dugme == ButtonQuizResults (dugme se pojavljuje tek nakon zavrsetka kviza, dodaje se dinamicki u fji showButtonQuizResults), QuizView ==
	// 		
	function QuizResults()
	{
		window.location = config.site_url + "/UserController/QuizResultPage";
	}
	