<div class = "wrapper">
	
	<div class = "top_bar"></div>
	<br>
	
	<?php foreach($users as $user): ?>
			
		<div class = "discover_user">
			
			<?php foreach($pics as $pic) : ?>
				<?php if($user['user_id'] == $pic['user_id']): ?>
					<div class = "discover_pic">
						<img src="/uploads/profiles/<?=$pic['picture']?>" alt="Profile picture" width="50" height="50">
					</div>
				<?php endif; ?>
			<?php endforeach; ?>

			<div class = "discover_name">
				<?=$user['first_name']?> <?=$user['last_name']?>
			</div>
			
			<div class = "discover_connection">
				<?php if(isset($connections[$user['user_id']])): ?>
					<a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>
				<?php else: ?>
					<a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
				<?php endif; ?>
			</div>

		</div>
		
		<br>
		
	<?php endforeach; ?>

	<div class ="top_bar"></div>

</div>