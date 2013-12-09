<div id="content">
<div id='navigationDiv'>
<nav><?php echo anchor('UserController/logout', 'Logout', array('class'=>'focus') ); ?></nav>
</div>

<script>
sendUserActionsLessions(null, "logged_in", null);
</script>

		<?php $attributes = array('class' => 'welcome');
				
			
		echo form_open("UserController/start", $attributes); ?>
		
			<h6> Welcome <?php echo $this->session->userdata('user_name'); ?>! Start learning with DSi2.0 </h6>

			<input type="submit" class="button" value="Start!" />
			
		<?php echo form_close(); ?>
		
</div><!--<div id="content">-->