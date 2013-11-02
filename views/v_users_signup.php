<script language="javascript" type="text/javascript" src="jstz.js">
var timezone = jstz.determine();
timezone.name();
</script>

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
		 <script>
    		$('input[name=timezone]').val(jstz.determine().name());
     		//var tz = jstz.determine(); // Determines the time zone of the browser client
     		//tz.name(); // Returns the name of the time zone eg "Europe/Berlin"
		 </script>
</form>

<?php if(isset($error)): ?>
<div class = 'error'>
	That email address is already taken.  Please login or signup as a different user.
</div>
<?php endif; ?>
<br>

