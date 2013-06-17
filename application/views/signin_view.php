<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=128303734043111";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div id="content">

<div id='navigationDiv'>
<nav><a href="#" class="focus">Log In</a> | <a href="<?php echo site_url("/user/register"); ?>">Register</a></nav>
</div>
	<div class="signup_wrap">
	
		<?php if(isset($message))
			  {
				echo "<div id='thanksDiv'>" . $message . "</div>";
			  }
		?>
		<div class="signin_form">
		
		<?php $attributes = array('class' => 'signin');
				
			echo form_open("user/login", $attributes); ?>
			<br />
				<h2>Log In</h2>
			    
		    	<input type="text" id="user_name" name="user_name" class="text-field" placeholder="Username" value="" />
				<input type="password" id="pass" name="pass" class="text-field" placeholder="Password" value="" />
				
				<?php if(isset($error_message))
			  		{
						echo "<div class='error'>* " . $error_message . "</div>";
			  		}
				?>
		        <input type="submit" class="button" value="Sign in" />
		        
		    <?php echo form_close(); ?>
		    <div class="fb-login-button" autologoutlink="true" scope="publish_stream" data-show-faces="false" data-width="200" data-max-rows="1"></div>
		</div><!--<div class="signin_form">-->
	</div><!--<div class="signup_wrap">-->
 
</div><!--<div id="content">-->