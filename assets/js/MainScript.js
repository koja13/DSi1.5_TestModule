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
		
		
		
		// ==========================  KOD DODAT ZA TEST MODUL -- pocetak ================================
		
		// postavljanje imena modela (jedan model za sve lekcije)
		rdfGraphName = "model.rdf";
		
		// promenljiva koja cuva link ka rdf kontroleru, koristi se kod ajax poziva
		var rdfController = config.site_url + "/RdfController";

		// postavljanje trenutnog broja lekcije na 1, pri pokretanju glavnog pogleda sa lekcijama
		var currentLessionNumber = 1;
		
		// bool promenljiva, da li je isteklo vreme za ucenje, na false u startu
		var timeIsUp = false;

		// FUNKCIJE
		
		//
		// kod koji se izvrsava nakon ucitavanja strane
		//
		$(document).ready(function() {
			
			// kliktanje na start test u navigation divu
			$("#startTest").click(function() {
				// cuvanje informacije o akciji zavrsetku ucenja i startovanju testa
			    sendUserActionsLessions(currentLessionNumber, "end_dsi", null);
			});
			
			// postavljanje trenutnog broja lekcije u span u gornjem levom uglu
			$("#lessionNumberSpan2").html(currentLessionNumber);
			
			// postavljanje event hendlera za kliktanje na close (x) na divu za prikaz veza dobijenih iz rdf-a
			$(document).on('click', '.close', function(){
			        $(this).parent().hide(400);
			    });

		});
		
		
		// ucitavanje prve lekcije na strani
		
		//getTextFromServer(1, "tekst1.html", "model.rdf");
		getTextFromServer(1, "tekst1.htm", "model.rdf");

		
		// ========================= changeLessionNumberPrev() ========================
		//
		// funkcija koja menja vrednost broja lekcije na kojoj se trenutno nalazi korisnik, korisnik se vraca unazad
		// pozivaju je event handler za kliktanje na prev dugme u glavnom pogledu (MainView)
		//
		function changeLessionNumberPrev()
		{
			// promena vrednosti promenljive koja cuva broj trenutne lekcije
			currentLessionNumber -= 1;
			
			// upisivanje nove vrednosti u span
			$("#lessionNumberSpan2").html(currentLessionNumber);
		}
		
		// ========================= changeLessionNumberNext() ========================
		//
		// funkcija koja menja vrednost broja lekcije na kojoj se trenutno nalazi korisnik, korisnik ide napred
		// pozivaju je event handler za kliktanje na next dugme u glavnom pogledu (MainView)
		//
		function changeLessionNumberNext()
		{
			// promena vrednosti promenljive koja cuva broj trenutne lekcije
			currentLessionNumber += 1;
			
			// upisivanje nove vrednosti u span
			$("#lessionNumberSpan2").html(currentLessionNumber);
		}

		//
		// dodavanje next i prev kontrola na svaki tab
		//
		$(function() 
		{

			// kreiranje tabova na osnovu divova
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
		
			// definisanje event handlera za klik na next dugme
			$('.next-tab').click(function() 
			{ 
				// pomocu $(this).attr("rel") se dobije broj taba na koji treba da se predje klikom na prev ili next dugme
				// zatim se taj tab selektuje
				$tabs.tabs('select', $(this).attr("rel"));
			
				// postavljanje teksta u tab koji ce biti aktivan klikom na prev ili next kontrolu
				getTextFromServer($(this).attr("rel"), "tekst"+$(this).attr("rel")+".htm", "model.rdf");
				
				// broj prethodne lekcije, treba nam da bi izbrisali sadrzaj lekcije na kojoj smo se prethodno nalazili
				var relPrev = parseInt($(this).attr("rel"))-1;
				
				// brisanje sadrzaja tabova koji nisu trenutno aktivni
				$("#lessionDiv" + relPrev).empty();
				
				// slanje informacije o akciji kliktanja na next dugme serveru
				sendUserActionsLessions(currentLessionNumber, "next", parseInt(currentLessionNumber) + 1);
				
				// izmena broja lekcije na kojoj se trenutno nalazi korisnik, +1, korisnik ide napred
				changeLessionNumberNext();
				
				//alert(relNext + " to je +1 i " + relPrev + " je -1");
				return false;
			});
	       
			// definisanje event handlera za klik na prev dugme
			$('.prev-tab').click(function() 
			{ 
				// pomocu $(this).attr("rel") se dobije broj taba na koji treba da se predje klikom na prev ili next dugme
				// zatim se taj tab selektuje
				$tabs.tabs('select', $(this).attr("rel"));
					
				// postavljanje teksta u tab koji ce biti aktivan klikom na prev ili next kontrolu
				getTextFromServer($(this).attr("rel"), "tekst"+ $(this).attr("rel") + ".htm", "model.rdf");

				// broj naredne lekcije, treba nam da bi izbrisali sadrzaj lekcije na kojoj smo se prethodno nalazili
				var relNext = parseInt($(this).attr("rel")) + 1;

				// brisanje sadrzaja tabova koji nisu trenutno aktivni
				$("#lessionDiv" + relNext).empty();
				
				// slanje informacije o akciji kliktanja na prev dugme serveru
				sendUserActionsLessions(currentLessionNumber, "prev", parseInt(currentLessionNumber) - 1);
				
				// izmena broja lekcije na kojoj se trenutno nalazi korisnik, -1, korisnik ide nazad
				changeLessionNumberPrev();

				// alert(relNext + " to je +1 i " + relPrev + " je -1");
				return false;
			});

		});
		
		
		// ========================= sendUserActions(subject, object) ========================
		//
		// Ajax funkcija koja serveru salje informaciju o prevlacenju reci na rec
		// poziva se u okviru handleDropEvent( event, ui ) koji predstavlja handler za drop event reci
		// ova funkcija serveru salje broj lekcije na kojoj je obavljena akcija, prevucenu rec i onu na koju je spustena,
		// kao i trenutno vreme ove akcije
		// ulazni parametri su: subject - subjekat, podignuta rec
		//						object  - objekat, rec na koju je podignuta rec spustena
		//
		function sendUserActions(subject, object)
		{
			$.ajax({
				  type: "POST",
				  url: config.site_url + "/UserController/getUserActions",
				  data: {	
							  currentLessionNumber: currentLessionNumber,
							  subject: subject,
							  object:object,
							  currentDateTime: getCurrentTime()
				  		}
				}).done(function( response ) {
					
					//alert(response);
				});
		}	
		
		// ========================= sendUserActionsLessions(currentLessionNumber, action, next_prev_lession_number) ========================
		//
		// Ajax funkcija koja serveru salje informaciju o akciji koju je korisnik obavio
		// pozivaju je fje: finishQuiz() == QuizScript.js ==, event handler za kliktanje na prev i next dugmice u MainView
		// automatski se poziva kada se ucita strana na kojoj se ucitava MainScript.js (document.ready na pocetku skripte)
		// poziva se u okviru pogleda: MainView, QuizView, Welcome
		// ulazni parametri su: currentLessionNumber 		- broj lekcije na kojoj se korisnik trenutno nalazi
		//						action  					- akcija koju je korisnik obavio
		//						next_prev_lession_number  	- broj lekcije na koju ce korisnik biti preusmeren izvrsenom akcijom
		//
		function sendUserActionsLessions(currentLessionNumber, action, next_prev_lession_number)
		{
			$.ajax({
				  type: "POST",
				  url: config.site_url + "/UserController/getUserActionsLessions",
				  data: {	
							  currentLessionNumber: currentLessionNumber,
							  action: action,
							  next_prev_lession_number: next_prev_lession_number,
							  currentDateTime: getCurrentTime()
				  		}
				}).done(function( response ) {
					
					//alert(response);
				});
		}	
		
		
		// ========================= getCurrentTime() ========================
		//
		// fja koja vraca trenutno vreme u obliku stringa
		// poziva se u okviru fja sendUserActions(subject, object) i
		// sendUserActionsLessions(currentLessionNumber, action, next_prev_lession_number)
		// kako bi se dobilo vreme izvrsene akcije
		//
		function getCurrentTime()
		{
			var currentTime = new Date();
			var month = currentTime.getMonth() + 1;
			var day = currentTime.getDate();
			var year = currentTime.getFullYear();
			var hours = currentTime.getHours();
			var minuts = currentTime.getMinutes();
			var seconds = currentTime.getSeconds();
			
			var currentTimeString = year + "-" + month + "-" + day +" " + hours + ":" + minuts + ":" + seconds;
			//alert(month + "/" + day + "/" + year + " " + hours + ":" + minuts + ":" + seconds);
			return currentTimeString;
		}
		
	// ==========================  KOD DODAT ZA TEST MODUL -- kraj ================================
		
		
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
	    	  $(".dragdrop").css("background-color", "transparent");
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