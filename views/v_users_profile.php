<div class = "wrapper">

	<?php if(isset($user)): ?>

		

		<div class = "picture_div">
			<?php foreach($pics as $pic): ?>

				<div class="profile_picture">
					<img src="/uploads/profiles/<?=$pic['picture']?>" width="250" height="250">
				</div>
			<?php endforeach; ?>

				

		</div>

		
		<div class = "bio_div">

			<div class = "bio_content">
			<h1><?= $user->first_name?> <?= $user->last_name?></h1>
				<?php foreach($bios as $bio): ?>
					<?=$bio['content']?> 
				<?php endforeach; ?>
			</div>
			
			<div class = "profile_update_uploads">
				<div id="picture_upload">
					<form method='POST' enctype="multipart/form-data" action='/users/p_upload/'>
						<input type='file' name='photo'>
						<input type='submit'>
					</form>
				</div>
				<div id="bio_upload">
					<form method='POST' action='/users/p_bio'>
						<label for='content'>Bio:</label>
						<textarea name='content' id='bio'></textarea>
						<input type='submit' value='Submit'>
					</form>
				</div>
			</div>

		</div>

	<?php endif; ?>

			


	<div class = "discover_post">
		<div class = "discover_element">
			<a href='/posts/users'>DISCOVER</a>
    	</div>
    	<div class = "post_element">
    		<a href='/posts/add'>POST</a>
    	</div>
	</div>
	
	<br>
	
	<?php foreach ($posts as $post): ?>
			<div class = "post">
				<div class = "post_picture_holder">
					<div class = "post_picture">
						<img src="/uploads/profiles/<?=$post['picture']?>" width="80" height="80">
					</div>
				</div>
				
				<div class = "post_person">
					<?=$post['first_name']?> <?=$post['last_name']?>
				</div>
			
				<div class = "post_content">
					<?=$post['content']?>
				</div>

				<div class = "post_time">
					<time datetime="<?=Time::display($post['created'], 'Y-m-d G:i')?>">
					<?=Time::display($post['created'])?>
					</time>
				</div>
			</div>
		<br>
	<?php endforeach; ?>

</div>

