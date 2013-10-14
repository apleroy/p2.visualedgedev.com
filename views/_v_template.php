<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

	<div id='menu'>

		<a href='/'>HOME</a>

		<!--Menu for users who have logged in-->
		<?php if($user): ?>
			<a href='/users/logout'>LOGOUT</a>
			<a href='/users/profile'>PROFILE</a>

		<!--Menu for those not logged in-->
		<?php else: ?>
			<a href='/users/signup'>SIGN UP</a>
			<a href='users/login'>LOG IN</a>

		<?php endif; ?>	


	</div>

	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>

</body>
</html>