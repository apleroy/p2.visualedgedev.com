<div class="navigation_background">
</div>

<div class = "wrapper">

	<div class = "navigation">	
	
		<form id="login_form" method='POST' action='/users/p_login'>
				Email<input type='text' name='email'>
				Password<input type='password' name='password'>
				<input type='submit' id="submit" value='Log In'>

				<?php if(isset($error)): ?>
	        		<div class='error'>
	            		Login failed. Please double check your email and password.
	        		</div>
	        		<br>
    			<?php endif; ?>
		</form>
	
	</div>
	
		<h1>
			<?=APP_NAME?>
		</h1> 

		<div id="home_main">
			
			<!--Signup Form -->
			<form method='POST' action='/users/p_signup'>
				First Name<br>
				<input type='text' name='first_name'><br>
				<br>
				Last Name<br>
				<input type='text' name='last_name'><br>
				<br>
				Email<br>
				<input type='text' name='email'><br>
				<br>
				Password<br>
				<input type='password' name='password'><br>
				<br>
				<input type='submit' value='Sign Up'>
				<input type='hidden' name='timezone'>
					 <script language="javascript" type="text/javascript" src="jstz.js">
			    		$('input[name=timezone]').val(jstz.determine().name());
			     		//var tz = jstz.determine(); // Determines the time zone of the browser client
			     		//tz.name(); // Returns the name of the time zone eg "Europe/Berlin"
					 </script>
			
				<?php if(isset($duplicateerror)): ?>
					<div class = 'error'>
						This email address is already registered.
					</div>
				<?php elseif(isset($signuperror)): ?>
					<div class = 'error'>
						Please complete all fields.
					</div>
				<?php endif; ?>
			</form>


		</div>	




</div>