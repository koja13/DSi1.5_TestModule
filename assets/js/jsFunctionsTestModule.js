		// GLOBALNE  PROMENLJIVE

		// promenljive subjekat, objekat i predikat
		var subject;
		var object;
		var predicate;

		// bool promenljiva koja sluzi sa proveru da li je rdf fajl izmenjen, tj da li su dodate nove veze, ukoliko jesu potrebno je izbaciti obavestenje o novoj verziji fajla
		var rdfGraphIsChanged = false;
		
		// promenljiva koja cuva ime fajla sa tekstom, inicijalno je prazan string
		var textFileName = "";
		
		// promenljiva koja cuva tip fajla sa tekstom (txt ili html), inicijalno je prazan string
		var textFileType = "";
		
		// promenljiva koja cuva ime rdf modela, inicijalno je prazan string
		var rdfGraphName = "";
		
		// promenljiva koja cuva link ka rdf kontroleru, koristi se kod ajax poziva
		var rdfController = config.site_url + "/RdfController";

		var currentLessionNumber = 1;
		var timeIsUp = false;

		// FUNKCIJE
		$(document).ready(function() {
			
			// kliktanje na start test u navigation divu
			$("#startTest").click(function() {
			    sendUserActionsLessions(currentLessionNumber, "end_dsi", null);
			});
			
			/*$('#startQuiz').submit(function() {
				sendUserActionsLessions("start_quiz", null);
				  return false;
				});*/
			/*
			$("#startQuizButton").click(function() {
			    sendUserActionsLessions("start_quiz", null);
			});
			*/
			$("#lessionNumberSpan2").html(currentLessionNumber);
			
			
			$(document).on('click', '.close', function(){
			        $(this).parent().hide(400);
			    });

		});
		
		function changeLessionNumberPrev()
		{
			currentLessionNumber -= 1;
			$("#lessionNumberSpan2").html(currentLessionNumber);
		}
		
		function changeLessionNumberNext()
		{
			currentLessionNumber += 1;
			$("#lessionNumberSpan2").html(currentLessionNumber);
		}

		getTextFromServer(1, "tekst1.html", "model.rdf");

		// dodavanje next i prev kontrola na svaki tab
		$(function() 
		{

			var $tabs = $('#tabs').tabs();
			
			$(".ui-tabs-panel").each(function(i)
			{
			
				var totalSize = $(".ui-tabs-panel").size() - 1;
				
				if (i != totalSize) 
				{
					next = i + 2;
					$(this).append("<a href='#' class='next-tab mover' rel='" + next + "'>Next Page &#187;</a>");
				}
				  
				if (i != 0)
				{
					prev = i;
					$(this).append("<a href='#' class='prev-tab mover' rel='" + prev + "'>&#171; Prev Page</a>");
				}

			});
		
			$('.next-tab').click(function() 
			{ 
				// pomocu $(this).attr("rel") se dobije broj taba na koji treba da se predje klikom na prev ili next dugme
				// zatim se taj tab selektuje
				$tabs.tabs('select', $(this).attr("rel"));
			
				// postavljanje teksta u tab koji ce biti aktivan klikom na prev ili next kontrolu
				getTextFromServer($(this).attr("rel"), "tekst"+$(this).attr("rel")+".html", "model.rdf");
				
				var relPrev = parseInt($(this).attr("rel"))-1;
				
				
				// brisanje tabova koji nisu trenutno aktivni
				$("#lessionDiv" + relPrev).empty();
				
				
				sendUserActionsLessions(currentLessionNumber, "next", parseInt(currentLessionNumber) + 1);
				changeLessionNumberNext();
				
				//alert(relNext + " to je +1 i " + relPrev + " je -1");
				return false;
			});
	       
			
			$('.prev-tab').click(function() 
					{ 
						// pomocu $(this).attr("rel") se dobije broj taba na koji treba da se predje klikom na prev ili next dugme
						// zatim se taj tab selektuje
						$tabs.tabs('select', $(this).attr("rel"));
					
						// postavljanje teksta u tab koji ce biti aktivan klikom na prev ili next kontrolu
						getTextFromServer($(this).attr("rel"), "tekst"+$(this).attr("rel")+".html", "model.rdf");
						
						
						var relNext = parseInt($(this).attr("rel"))+1;
						
						// brisanje tabova koji nisu trenutno aktivni
						$("#lessionDiv" + relNext).empty();
						
						sendUserActionsLessions(currentLessionNumber,"prev", parseInt(currentLessionNumber) - 1);
						changeLessionNumberPrev();
						
						//alert(relNext + " to je +1 i " + relPrev + " je -1");
						return false;
					});

		});
		
		var userActions = new Array();
		
		function startQuiz()
		{
			$.ajax({
				  type: "POST",
				  url: config.site_url + "/user/startQuiz3",
				  data: {
				  		}
				}).done(function( response ) {
					
					//alert(response);
				});
		}	
		
		function sendUserActions(subject, object)
		{
			$.ajax({
				  type: "POST",
				  url: config.site_url + "/user/getUserActions",
				  data: {	
							  currentLessionNumber: currentLessionNumber,
							  subject: subject,
							  object:object,
							  currentDateTime: getCurrentTime()
					  		//userActions: userActions
				  		}
				}).done(function( response ) {
					
					//alert(response);
				});
		}	
		
		function sendUserActionsLessions(currentLessionNumber, action, next_prev_lession_number)
		{
			$.ajax({
				  type: "POST",
				  url: config.site_url + "/user/getUserActionsLessions",
				  data: {	
							  currentLessionNumber: currentLessionNumber,
							  action: action,
							  next_prev_lession_number: next_prev_lession_number,
							  currentDateTime: getCurrentTime()
					  		//userActions: userActions
				  		}
				}).done(function( response ) {
					
					//alert(response);
				});
		}	
		
		function getCurrentTime()
		{
			var currentTime = new Date();
			var month = currentTime.getMonth() + 1;
			var day = currentTime.getDate();
			var year = currentTime.getFullYear();
			var hours = currentTime.getHours();
			var minuts = currentTime.getMinutes();
			var seconds = currentTime.getSeconds();
			
			var currnetTimeString = year + "-" + month + "-" + day +" " + hours + ":" + minuts + ":" + seconds;
			//alert(month + "/" + day + "/" + year + " " + hours + ":" + minuts + ":" + seconds);
			return currnetTimeString;
		}
	//
	// FUNKCIJA ZA DRAG & DROP
	//
		
	// ========================= makeDraggableDroppable() ========================
	//
	// funkcija koja recima daje drag & drop funkcionalnost
	// pozivaju je funkcije spanEditMode() i spanReadMode(), nakon stavljanja reci u spanove daje im se drag&drop funkcionalnost
	// ova funkcija takodje kreira event handlere za hover, za pocetak prevlacenja i za kraj prevlacenja reci
	//
	function makeDraggableDroppable()
	{
		  // podesavanje promene kursora kad stane iznad reci koja moze da se prenese
		  $(".dragdrop").hover(function() {
			
			$(this).css('cursor','move');
			
			}, function() {
			
			$(this).css('cursor','auto');
			
			});
		  
		  // drag-drop deo 
	      $(".dragdrop").draggable( 
	              {
	                  containment: '#content',
	                  cursor: 'move',
	                  snap: '#content',
					  revert: true,
					  start: HandleDragStart,
					  stop: HandleDragStop
	       		 } );
	
	      $(".dragdrop").droppable( 
	              {
	  	    		drop: handleDropEvent
	  	  		 } );
				 
		

	      // handler za pocetak prevlacenja
	      function HandleDragStart( event, ui )
	      {
	    	  // potrebno je dobiti sve reci sa kojima je u vezi podignuta rec
	    	  
	    	  // rec koju smo podigli
	    	  var s = $(this).html();

	    	  subject = s;
	    	  
	    	  // slanje subjekta serveru ajax funkcijom
	    	  sendSubject();
		  }

	 	  // handler za kraj prevlacenja
	      function HandleDragStop( event, ui )
	      {
	    	  $("span").css("background-color", "transparent");
		  }

	      // handler za spustanje reci
	  	  function handleDropEvent( event, ui )
	  	  {
		  	var s = ui.draggable.html(); // pokupi rec koja je stigla, to ce biti recenicni subjekat
		  	var o = $(this).html(); // pokupi rec na koju je spusteno (to je this), to je recenicni objekat

		  	// alert("Subjekat = " + s + " i Objekat = " + o);
			
		  	// ispisivanje postojecih veza
			writeToBottomDiv(s,o);
			sendUserActions(s, o);
		
	  	  }
	}
	
	
	//
	// FUNKCIJE ZA INTERAKCIJU SA SERVEROM
	//
	
	// ========================= writeToBottomDivRight(s,o) ========================
	//
	// funkcija koja dodaje formu za upis nove veze u donji desni div
	// poziva je event handler za spustanje reci na rec handleDropEvent( event, ui )
	// ulazni parametri su: s - subjekat, podignuta rec
	//						o - objekat, rec na koju je podignuta rec spustena
	// 
	function writeToBottomDivRight(s,o)
	{
		subject=s;
		object=o;

		$("#bottomDivRight").html("<form name='form'> "
									+ s + " <input type='text' id='predicateId' name='predicate' /> " + o + " <br />" +
											"<input type='button' onclick='sendSubjectObjectPredicate(this.parentNode); ' value='Sacuvaj' />" +
								 "</form>");
	}

	// ========================= writeToBottomDivLeft(s,o) ========================
	//
	// funkcija koja salje subjekat i objekat serveru, i rezultat od servera upise u donji div levo
	// poziva je event handler za spustanje reci na rec handleDropEvent( event, ui )
	// ulazni parametri su: s - subjekat, podignuta rec
	//						o - objekat, rec na koju je podignuta rec spustena
	// 
	function writeToBottomDivLeft(s,o)
	{
		subject=s;
		object=o;

		// slanje subjekta i objekta serveru ajax funkcijom, i upisivanja rezultata koje vrati u donji div levo
		sendSubjectObject();
	}

	// ========================= writeToBottomDiv(s,o) ========================
	//
	// funkcija koja salje subjekat i objekat serveru, i rezultat od servera upise u donji div
	// poziva je event handler za spustanje reci na rec handleDropEvent( event, ui ), ukoliko je u pitanju Read mode
	// ulazni parametri su: s - subjekat, podignuta rec
	//						o - objekat, rec na koju je podignuta rec spustena
	// 
	function writeToBottomDiv(s,o)
	{
		subject=s;
		object=o;

		// slanje subjekta i objekta serveru
		sendSubjectObject();
	}

	//
	// AJAX FUNKCIJE
	//
	
	// ========================= sendSubject() ========================
	//
	// Ajax fja za slanje subjekta serveru, kako bi dobili sve objekte za koje je vezan
	// poziva je event handler za pocetak prenosenja reci handleDragStart( event, ui )
	// 
	function sendSubject()
	{
		$.ajax({
			// post zahtev je u pitanju
			  type: "POST",
			  // link ka kome se upucuje zahtev, getObjects predstavlja metod na serveru koji ce da odgovori na zahtev
			  url: rdfController + "/getObjects",
			  // podaci koji se salju, nazivi subjekta, rdf grafa
			  data: {	
				  		s: subject,
						rdfGraph: rdfGraphName
			  		}
			}).done(function( response ) {

				// obrada odgovora na zahtev, postavljanje pozadinske boje svim objektima koje dobijemo kao odgovor
			  $(response).css("background-color", "yellow");
				
			});
	}

	
	// ========================= sendSubjectObject() ========================
	//
	// Ajax fja za slanje subjekta i objekta serveru, kako bi dobili postojece veze izmedju njih
	// pozivaju je funkcije writeToBottomDivLeft(s,o) i writeToBottomDiv(s,o)
	// 
	function sendSubjectObject()
	{
		$.ajax({
			  type: "POST",
			  url: rdfController + "/getPredicate",
			  data: {
				  		s: subject,
						o: object ,
						rdfGraph: rdfGraphName
			  		}
		
			}).done(function( response ) {
				
				
				$("#bottomDiv").show();
				// u donji div se upisu sve veze koje vrati server
				$("#statementDiv").html(response);

			});
	}
	


	// ========================= getTextFromServer(tFileName) ========================
	//
	// Ajax fja za citanje teksta iz fajla na serveru (i spanovanje tog teksta)
	// poziva je funkcija uploadTextFile, takodje se poziva prilikom ucitavanja stranice ukoliko je tekst ucitan na server
	// ulazni parametar je: tFileName - naziv fajla sa tekstom na serveru
	//
	function getTextFromServer(lessionNumber, tFileName, rdfGraphName)
	{
		$.ajax({
			  type: "POST",
			  url: rdfController + "/getText",
			  data: { 	
				  		textFile: tFileName
			  		}
		
			}).done(function( response ) {
				
				$("#lessionDiv" + lessionNumber).html(response);
				 
				// spanovanje teksta
				if(config.use_dsi=="yes")
				{
					spanReadMode(rdfGraphName);
				}
			});
	}

	// ========================= spanReadMode() ========================
	//
	// Ajax funkcija za citanje subjekata i objekata sa servera, pa zatim spanovanje teksta u Read modu
	// poziva je funkcija span()
	// koristi funkciju findAndReplaceDOMText, definisanu u eksternoj js biblioteci
	// funkcija findAndReplaceDOMText pronalazi reci u tekstu i stavlja ih u html span elemente kojima se daje klasa dragdrop, 
	// regular expresion kojim se biraju reci u tekstu dobija se putem ajax zahteva serveru, ajax zahtevom traze se svi subjekti i objekti koje taj rdf fajl sadrzi
	// mainDiv predstavlja id diva koji u kome se traze reci
	//
	function spanReadMode(rdfGraphName)
	{
			$.ajax({
			  type: "POST",
			  url: rdfController + "/getSubjectsObjects",
			  data: { 	
				  		rdfGraph: rdfGraphName
			  		}
		
			}).done(function( response ) {

				var regex = new RegExp(response, 'gi');

				findAndReplaceDOMText(
					regex,
					mainDiv,
					function(fill, matchIndex) {
					var el = document.createElement('span');
					el.setAttribute("class", "dragdrop");
					el.setAttribute("style", "color:grey");
					el.innerHTML = fill;
					return el;
					}
				);
				
				// recima u tekstu se daje drag & drop funkcionalnost
				makeDraggableDroppable();
				
			});
	}

	rdfGraphName = "model.rdf";
	/*
	function getAllLessionsFromServer()
	{
		getTextFromServer(1, "tekst1.html", "model.rdf");
		getTextFromServer(2, "tekst2.html", "model.rdf");
		getTextFromServer(3, "tekst3.html", "model.rdf");
		getTextFromServer(4, "tekst4.html", "model.rdf");
		getTextFromServer(5, "tekst5.html", "model.rdf");
		getTextFromServer(6, "tekst6.html", "model.rdf");
		getTextFromServer(7, "tekst7.html", "model.rdf");
		getTextFromServer(8, "tekst8.html", "model.rdf");
		getTextFromServer(9, "tekst9.html", "model.rdf");
		getTextFromServer(10, "tekst10.html", "model.rdf");
	}
	*/
	//getAllLessionsFromServer();