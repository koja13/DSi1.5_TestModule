<div id="content">

<div id='navigationDiv'>
<nav><a href="#" class="focus">Log In</a> | <a href="<?php echo site_url("/user/register"); ?>">Register</a></nav>
</div>
	<div class="signup_wrap">
	
		<div class="signin_form">
		
		<?php $attributes = array('class' => 'signin');
				
			echo form_open("user/login", $attributes); ?>
			<br />
				<h2>Log In</h2>
			    
		    	<input type="text" id="user_name" name="user_name" class="text-field" placeholder="Username" value="" />
				<input type="password" id="pass" name="pass" class="text-field" placeholder="Password" value="" />

		        <input type="submit" class="button" value="Sign in" />
		        
		    <?php echo form_close(); ?>
		    
		</div><!--<div class="signin_form">-->
	</div><!--<div class="signup_wrap">-->
 
</div><!--<div id="content">-->