<?php if(isset($user)): ?>

<div id="test">
<h2>This is the profile of <?= $user->first_name?></h2>
</div>


<?php foreach($bios as $bio): ?>

	<?=$bio['content']?> 

<?php endforeach; ?>

<br><br>

<?php foreach($pics as $pic): ?>

<br><br>
<img src="/views/images/<?=$pic['picture']?>">

<?php endforeach; ?>


<div id = "profile_pic">
<h3>Upload your picture</h3>
</div>

	<form method='POST' enctype="multipart/form-data" action='/users/p_upload/'>
	
		<input type='file' name='photo'>
		<input type='submit'>

	</form>

<br><br>
<div id= "bio">
<h3>User Bio</h3>

	<form method='POST' action='/users/p_bio'>
	
	<label for='content'>Bio:</label><br>
	<textarea name='content' id='bio'></textarea>
	
	<br><br>
	<input type='submit' value='Submit'>

	</form>

</div>

<?php endif; ?>


