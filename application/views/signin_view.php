<div id="content">
<nav><a href="#" class="focus">Log In</a> | <a href="<?php echo site_url("/user/register"); ?>">Register</a></nav>
	<div class="signup_wrap">
	<div id="countdown"></div>
		<div class="signin_form">
		
			<?php echo form_open("user/login"); ?>
			
				<h2>Log In</h2>
			    
		    	<input type="text" id="email" name="email" class="text-field" placeholder="E-mail" value="" />
				<input type="password" id="pass" name="pass" class="text-field" placeholder="Password" value="" />
		        <input type="submit" class="button" value="Sign in" />
		        
		    <?php echo form_close(); ?>
		    
		</div><!--<div class="signin_form">-->
	</div><!--<div class="signup_wrap">-->
    
       
    
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="<?php echo base_url('assets/countdownTimer/countdown/jquery.countdown.js')?>"></script>
		<script src="<?php echo base_url('assets/countdownTimer/js/script.js')?>"></script>
 
    
    
</div><!--<div id="content">-->