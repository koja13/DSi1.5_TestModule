<div id="fb-root"></div>

<script>
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '128303734043111', // App ID
    channelUrl : 'http://dsitest.site88.net/', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
  // for any authentication related change, such as login, logout or session refresh. This means that
  // whenever someone who was previously logged out tries to log in again, the correct case below 
  // will be handled. 
  FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs. 
    if (response.status === 'connected') {
      // The response object is returned with a status field that lets the app know the current
      // login status of the person. In this case, we're handling the situation where they 
      // have logged in to the app.
      saveUserDataFB();
    } else if (response.status === 'not_authorized') {
      // In this case, the person is logged into Facebook, but not into the app, so we call
      // FB.login() to prompt them to do so. 
      // In real-life usage, you wouldn't want to immediately prompt someone to login 
      // like this, for two reasons:
      // (1) JavaScript created popup windows are blocked by most browsers unless they 
      // result from direct interaction from people using the app (such as a mouse click)
      // (2) it is a bad experience to be continually prompted to login upon page load.
     FB.login(function(response)
     {
    	 saveUserDataFB();
    	 
	 }, {scope: 'email'});
    } else {
      // In this case, the person is not logged into Facebook, so we call the login() 
      // function to prompt them to do so. Note that at this stage there is no indication
      // of whether they are logged into the app. If they aren't then they'll see the Login
      // dialog right after they log in to Facebook. 
      // The same caveats as above apply to the FB.login() call here.
      
      FB.login(function(response)
      {
    	  saveUserDataFB();
    	  
 	  }, {scope: 'email'});
      }});

  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function saveUserDataFB() {
    
	console.log('Welcome!  Fetching your information.... ');

    FB.api('/me', function(response)
	{
		console.log('Good to see you, ' + response.name + '.');
		console.log('Good to see you, ' + response.username + '.');
		console.log('Good to see you, ' + response.email + '.');

		saveUserDataFromFB(response);
	 
    });
  }


  function saveUserDataFromFB(response)
  {
	  $.ajax({
		  type: "POST",
		  url: config.site_url + "/UserController/getUserDataFB",
		  data: {	
					name: response.name,
					username: response.username,
					email: response.email,
					// name: "ppp",
					// username:"trucbla",
				 	// email: "blatruc@bla",
					account_type: "f"
		  		}
		}).done(function( response ) {
			
			//alert("Podaci su sacuvani!");
		});
  }

 //saveUserDataFromFB();
</script>

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
			    
		    	<input type="text" id="user_name" name="user_name" class="text-field" placeholder="Username" value="" />
				<input type="password" id="pass" name="pass" class="text-field" placeholder="Password" value="" />
				
				<?php if(isset($error_message))
			  		{
						echo "<div class='error'>* " . $error_message . "</div>";
			  		}
				?>
		        <input type="submit" class="button" value="Sign in" />
		        
		        <br /><br /><h4>-- or --</h4><br />
		        
		        
		        <div class="fb-login-button" perms="email" scope="publish_stream" size="large" data-show-faces="false" data-width="200" data-max-rows="1">Login with Facebook</div>
		        
		    <?php echo form_close(); ?>
		    
		</div><!--<div class="signin_form">-->
	</div><!--<div class="signup_wrap">-->
 
</div><!--<div id="content">-->