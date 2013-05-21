<div id="content">

<nav><?php echo anchor('user/logout', 'Logout', array('class'=>'focus') ); ?></nav>

		<?php echo form_open("user/quiz"); ?>
		
			<h5> Let's see what you have learned with DSi<?php echo $this->session->userdata('username'); ?>!<br />
			
			The test contains 20 questions and there is no time limit.
			
			Press button to start Quiz.<br />
			Good luck! 
			</h5>

			<input type="submit" class="button" value="Start DSi2.0 QUIZ!" />
			
		<?php echo form_close(); ?>
		
</div><!--<div id="content">-->