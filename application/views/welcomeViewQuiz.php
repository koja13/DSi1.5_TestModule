<div id="content">
<div id='navigationDiv'>
<nav><?php echo anchor('user/logout', 'Logout', array('class'=>'focus') ); ?></nav>
</div>

		<?php $attributes = array('class' => 'welcomeQuiz');
	
		echo form_open("user/quiz", $attributes); ?>
		
			<h5> Let's see what you have learned with DSi <?php echo $this->session->userdata('user_name'); ?>!<br /><br />
			
			The test contains 20 questions and there is no time limit.
			
			Press button to start Quiz.<br />
			
			Good luck! 
			</h5>

			<input type="submit" class="button" value="Start DSi2.0 QUIZ!" />
			
		<?php echo form_close(); ?>
		
</div><!--<div id="content">-->