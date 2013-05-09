<div id="content">
<script type="text/javascript" >

 var config = {
     base_url: "<?php echo base_url(); ?>",
     site_url: "<?php echo site_url(); ?>",
     controller: "ReadController",
     opposite_controller: "EditController"
 };

</script>

<nav><?php echo anchor('#', 'Start test') . " | " . anchor('user/logout', 'Logout', array('class'=>'focus') ); ?></nav>

	<!------------------------------------- jQuery biblioteke  ------------------------------------->

	<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery-1.7.2.js');?>"></script>	
	<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery-ui.min.js');?>"></script>

	<script src="<?php echo base_url('assets/countdownTimer/countdown/jquery.countdown.js')?>"></script>
	<script src="<?php echo base_url('assets/countdownTimer/js/script.js')?>"></script>
		
	<script type="text/javascript" src="<?php echo base_url('/assets/js/findAndReplaceDOMText.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('/assets/js/jsFunctions.js');?>"></script>

<!--  
	<div id="countdown"> </div>
-->	

	
<!------------------------- mainDiv, centralni div u koji se ucitava tekst ------------------------->
<div id='mainDiv'>

	<div id="page-wrap">
		
		<div id="tabs">
		
    		<ul>
        		<li><a href="#fragment-1">1</a></li>
        		<li><a href="#fragment-2">2</a></li>
        		<li><a href="#fragment-3">3</a></li>
        		<li><a href="#fragment-4">4</a></li>
        		<li><a href="#fragment-5">5</a></li>
        		<li><a href="#fragment-6">6</a></li>
        		<li><a href="#fragment-7">7</a></li>
        		<li><a href="#fragment-8">8</a></li>
        		<li><a href="#fragment-9">9</a></li>
        		<li><a href="#fragment-10">10</a></li>
    	   </ul>
	
        	<div id="fragment-1" class="ui-tabs-panel">
        	       <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>  
        	</div>
        	
        	<div id="fragment-2" class="ui-tabs-panel ui-tabs-hide">
                    <p>Donec ultricies senectus tristique egestas vitae, et ac morbi habitant quam sit mi quam, malesuada leo. Vestibulum tempor Mauris tortor libero eget, egestas. eu vitae feugiat netus amet Pellentesque ante. amet, ultricies eleifend turpis sit placerat et semper. Aenean est. fames </p>
            </div>
            
        	<div id="fragment-3" class="ui-tabs-panel ui-tabs-hide">
            		<p>ante. Mauris Vestibulum est. fames egestas quam, leo. amet tristique sit libero egestas. ultricies mi turpis senectus Pellentesque habitant eu ac morbi netus eget, Aenean malesuada vitae, semper. eleifend et feugiat vitae amet, placerat Donec et tortor ultricies tempor quam sit </p>
            </div>
        
        	<div id="fragment-4" class="ui-tabs-panel ui-tabs-hide">

        	</div>
        	
        	<div id="fragment-5" class="ui-tabs-panel ui-tabs-hide">
                
        	</div>
        
        	<div id="fragment-6" class="ui-tabs-panel ui-tabs-hide">
        
        	</div>
        	
        	<div id="fragment-7" class="ui-tabs-panel ui-tabs-hide">
        
        	</div>
        	
        	<div id="fragment-8" class="ui-tabs-panel ui-tabs-hide">
        
        	</div>
        	
        	<div id="fragment-9" class="ui-tabs-panel ui-tabs-hide">
        
        	</div>
        	
        	<div id="fragment-10" class="ui-tabs-panel ui-tabs-hide">
					Kraj...
        	</div>
        	
        </div>
        
		<div id="countdown"> </div>
		
	</div>
	
</div>


	
<script type="text/javascript">

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
	
		$('.next-tab, .prev-tab').click(function() 
		{ 
			$tabs.tabs('select', $(this).attr("rel"));
			return false;
		});
       

	});
	
    </script>
    
    
<!------------------------- bottomDiv, donji div u kome se prikazuju veze izmedju reci u tekstu ------------------------->

<div id='bottomDiv'>	</div>
<?php 
			// ucita se ime modela u globalnu promenljivu
			// prikaz dugmeta za download rdf grafa		
			print ("<script>
					//	rdfGraphName =\"". "model" . ".rdf\";
					</script>");


			// upisivanje imena fajla sa tekstom u globalnu promenljivu, i ucitavanje tog teksta iz fajla na serveru
			print ("<script>
					//	textFileName =\"". "tekst" . "." . "html" . "\";
					//	getTextFromServer(\"". "tekst" . "." . "html" . "\");
					</script>");		
?>
		
	
		
		
</div><!--<div id="content">-->