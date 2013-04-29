<div id="content">

<nav><?php echo anchor('#', 'Start test') . " | " . anchor('user/logout', 'Logout', array('class'=>'focus') ); ?></nav>

		<?php echo form_open("user/start"); ?>
		
			<h6> Welcome <?php echo $this->session->userdata('username'); ?>! Start learning with DSi2.0 </h6>

			<input type="submit" class="button" value="Start!" />
			
		<?php echo form_close(); ?>
		
</div><!--<div id="content">-->