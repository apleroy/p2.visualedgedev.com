<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html" charset=UTF-8>	
	
	<!--Common CSS/JS -->
	<link rel="stylesheet" href="/css/app.css" type="text/css">


	<!-- <link href="/dist/css/bootstrap.css" rel="stylesheet">
	<script src="/assets/js/jquery.js"></script>
    <script src="/dist/js/bootstrap.min.js"></script>
	<link href="/dist/css/navbar.css" rel="stylesheet"> -->

	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	

</head>



<body>

	<div class="container">	

		<!-- <div class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav"> -->
            <li><a href='/'>HOME</a></li>
            <?php if($user): ?>
				<li><a href='/users/logout'>LOGOUT</a></li>
				<li><a href='/users/profile'>PROFILE</a></li>
            <?php else: ?>
				<li><a href='/users/signup'>SIGN UP</a></li>
				<li><a href='/users/login'>LOG IN</a></li>
			<?php endif; ?>	
            

            <!-- <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="./">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>
            <li><a href="../navbar-fixed-top/">Fixed top</a></li>
          </ul>
        </div> -->
        <!--/.nav-collapse -->
      

      <!-- Main component for a primary marketing message or call to action -->
      <!-- <div class="jumbotron">
        <h1>Navbar example</h1>
        <p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
        <p>
          <a class="btn btn-lg btn-primary" href="../../components/#navbar">View navbar docs &raquo;</a>
        </p>
      </div> -->



	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>

	</div>

</body>

</html>