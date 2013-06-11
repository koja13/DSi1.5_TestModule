<div id="content">

<div id='navigationDiv'>
<nav><a  href="<?php echo site_url("/user"); ?>">Log In</a> | <a href="#" class="focus">Register</a></nav>

</div>
	<div class="reg_form" >

			<?php //echo validation_errors('<p class="error">'); ?>
				
				

				
				<?php
				 
				$attributes = array('class' => 'register');
				
				echo form_open("/user/registration", $attributes); 
				
				?>
					<br />
					<h2>Register</h2>
					
					<input type="text" id="user_name" name="user_name" class="text-field" placeholder="Username" value="<?php echo set_value('user_name'); ?>" />
					<?php echo form_error('user_name', '<div class="error"  style="position:absolute; color:red; left:270px;top:40px;">', '</div>'); ?>
					
					<input type="text" id="email_address" name="email_address" class="text-field" placeholder="E-mail" value="<?php echo set_value('email_address'); ?>" />
					<?php echo form_error('email_address', '<div class="error" style="color:red">', '</div>'); ?>
					
					<input type="password" id="password" name="password" class="text-field" placeholder="Password" value="<?php echo set_value('password'); ?>" />
					<?php echo form_error('password', '<div class="error" style="color:red">', '</div>'); ?>
					
					<input type="password" id="con_password" name="con_password" class="text-field" placeholder="Repeat Password" value="<?php echo set_value('con_password'); ?>" />
					<?php echo form_error('con_password', '<div class="error" style="color:red">', '</div>'); ?>
					
					
					<?php //echo form_error('user_name', '<div class="error" style="color:red">', '</div>'); ?>
					<?php // echo validation_errors('<p class="error" style="color:red">'); ?>
					
					<input id="submitButton" type="submit" class="button" value="Submit" />
					
				
				<?php echo form_close();?>
				
	</div><!--<div class="reg_form">-->
    
</div><!--<div id="content">-->