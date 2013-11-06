<div id="home_page">

	<div class="navigation_background"></div>

	<div class = "wrapper">

			<div class = "navigation">	
			  
			  	<div class = "logo"><a href="/">S<b>//</b>DEBAR</a></div>
				
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

		<div class="top_bar"></div>	
		
			
			<div id="signup_form_div">
				
				<!--Signup Form -->
				<form id="signup_form" method='POST' action='/users/p_signup'>
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
				
					<?php if(isset($signup_error)): ?>
						<div class = 'error'>
							Please complete all fields.
						</div>
					<?php elseif(isset($duplicate_error)): ?>
						<div class = 'error'>
							This email address is already in use.  Please login or provide a new email address.
						</div>
					<?php elseif(isset($invalid_error)): ?>
						<div class = 'error'>
							This is not a valid email address.
						</div>
					<?php endif; ?>

				</form>

			</div>

			<div id="main_logo">
				<div id="main_logo_content">
					<br>
					S//DEBAR

					<p>
						<br>
						+1: Upload and Edit Profile Picture and View User Profile Pictures in Posts<br>
						<br>
						+1: Upload and Edit Profile Biography
						<br>
						<br>
					</p>
					<p2>
						Andy LeRoy  |  P2 - CSCI E-15 - Dynamic Web Applications
					</p2>
				</div>
			</div>
			

	</div>

</div>

