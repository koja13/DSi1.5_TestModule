<div id="fb-root"></div>

<script src="<?php echo base_url('assets/js/fbLoginScript.js')?>"> </script>

<div id="content">

<div id='navigationDiv'>
<nav><a href="#" class="focus">Log In</a> | <a href="<?php echo site_url("/UserController/register"); ?>">Register</a></nav>
</div>
	<div class="signup_wrap">
	
		<?php if(isset($message))
			  {
				echo "<div id='thanksDiv'>" . $message . "</div>";
			  }
		?>
		<div class="signin_form">
		
		<?php $attributes = array('class' => 'signin');
				
			echo form_open("UserController/login", $attributes); ?>
			<br />
				<h2>Log In</h2>
			    
		    	<input type="text" id="email_address" name="email_address" class="text-field" placeholder="E-mail" value="" />
				<input type="password" id="pass" name="pass" class="text-field" placeholder="Password" value="" />
				
				<?php if(isset($error_message))
			  		{
						echo "<div class='error'>* " . $error_message . "</div>";
			  		}
				?>
		        <input type="submit" class="button" value="Sign in" />
		        
		        <br /><br /><h4>-- or --</h4><br />
		        
		        
		        <div class="fb-login-button"  perms="email" scope="publish_stream" size="large" data-show-faces="false" data-width="200" data-max-rows="1">Login with Facebook</div>
		        
		    <?php echo form_close(); ?>
		    
		</div><!--<div class="signin_form">-->
	</div><!--<div class="signup_wrap">-->
 
</div><!--<div id="content">-->