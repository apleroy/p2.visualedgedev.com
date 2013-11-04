<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html" charset=UTF-8>	
	
	<!--Common CSS/JS -->
	<link rel="stylesheet" href="/css/app.css" type="text/css">

	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	

</head>


<body>
      
    <?php if($user): ?>

    <div class = "navigation_background">
    </div>
	 
      <div class = "wrapper">

        <div class="navigation"> 
    			<a href='/users/profile'>PROFILE</a>
          <a href='/users/logout'>LOGOUT</a>
        </div>

      </div>

   	<?php endif; ?>	
                      
	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>

	
</body>

</html>