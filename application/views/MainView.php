

	<!------------------------------------- jQuery biblioteke  ------------------------------------->
	<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery-1.7.2.js');?>"></script>	
	<script type="text/javascript" src="<?php echo base_url('/assets/js/jquery-ui.min.js');?>"></script>

	<script type="text/javascript" src="<?php echo base_url('/assets/js/findAndReplaceDOMText.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('/assets/js/jsFunctionsTestModule.js');?>"></script>

	<script src="<?php echo base_url('assets/countdownTimer/countdown/jquery.countdown.js')?>"></script>
	<script src="<?php echo base_url('assets/countdownTimer/js/script.js')?>"></script>




<div id='navigationDiv'>
<nav> <?php echo anchor('user/startQuiz', 'Start test') . " | " . anchor('user/logout', 'Logout', array('class'=>'focus') ); ?> </nav>
</div>

<!------------------------- mainDiv, centralni div u koji se ucitava tekst ------------------------->
<div id='mainDiv'>
 			
        <div id="tabs">
			
	    	<ul>
	        		<li><a href="#fragment-1">1</a></li><li><a href="#fragment-2">2</a></li>
	        		<li><a href="#fragment-3">3</a></li><li><a href="#fragment-4">4</a></li>
	        		<li><a href="#fragment-5">5</a></li><li><a href="#fragment-6">6</a></li>
	        		<li><a href="#fragment-7">7</a></li><li><a href="#fragment-8">8</a></li>
	        		<li><a href="#fragment-9">9</a></li><li><a href="#fragment-10">10</a></li>
	    	</ul>
	
        	<div id="fragment-1" class="ui-tabs-panel">
	        	<div id="lessionDiv1" class="lessionDiv"></div>
        	</div>
        	
        	<div id="fragment-2" class="ui-tabs-panel ui-tabs-hide">
                <div id="lessionDiv2" class="lessionDiv"></div>      
			</div>
            
        	<div id="fragment-3" class="ui-tabs-panel ui-tabs-hide">
        		<div id="lessionDiv3" class="lessionDiv"></div>
        	</div>
            
        	<div id="fragment-4" class="ui-tabs-panel ui-tabs-hide">
        		<div id="lessionDiv4" class="lessionDiv"></div>
        	</div>
        		
        	<div id="fragment-5" class="ui-tabs-panel ui-tabs-hide">
        		<div id="lessionDiv5" class="lessionDiv"></div>
        	</div>       
        	
        	<div id="fragment-6" class="ui-tabs-panel ui-tabs-hide">
        		<div id="lessionDiv6" class="lessionDiv"></div>
        	</div>        	
        	
        	<div id="fragment-7" class="ui-tabs-panel ui-tabs-hide">
        		<div id="lessionDiv7" class="lessionDiv"></div>
        	</div>      	
        	
        	<div id="fragment-8" class="ui-tabs-panel ui-tabs-hide">
        		<div id="lessionDiv8" class="lessionDiv"></div>
        	</div>
        	
        	<div id="fragment-9" class="ui-tabs-panel ui-tabs-hide">
        		<div id="lessionDiv9" class="lessionDiv"></div>
        	</div>
        	
        	<div id="fragment-10" class="ui-tabs-panel ui-tabs-hide">
        		<div id="lessionDiv10" class="lessionDiv"></div>
			</div>
        	
        </div>
</div>

<div id="countdown"> </div>

<div id="bottomDiv">Bla bla</div>