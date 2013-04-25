<div id="content">
<nav><a  href="<?php echo site_url("/user"); ?>">Log In</a> | <a href="#" class="focus">Register</a></nav>
	<div class="reg_form" >

			<?php echo validation_errors('<p class="error">'); ?>
				
				

				
				<?php
				 
				$attributes = array('class' => 'register');
				
				echo form_open("/user/registration", $attributes); 
				
				?>
					
					<h2>Register</h2>
					
					<input type="text" id="user_name" name="user_name" class="text-field" placeholder="Username" value="<?php echo set_value('user_name'); ?>" />
					<input type="text" id="email_address" name="email_address" class="text-field" placeholder="E-mail" value="<?php echo set_value('email_address'); ?>" />
					<input type="password" id="password" name="password" class="text-field" placeholder="Password" value="<?php echo set_value('password'); ?>" />
					<input type="password" id="con_password" name="con_password" class="text-field" placeholder="Repeat Password" value="<?php echo set_value('con_password'); ?>" />
					<input id="submitButton" type="submit" class="button" value="Submit" />
					
				
				<?php echo form_close(); ?>
				
	</div><!--<div class="reg_form">-->
    
</div><!--<div id="content">-->