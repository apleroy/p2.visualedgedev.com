<div class = "wrapper">

	<div class = "top_bar"></div>

	<br>
		
		<div class = "make_post_div">
			
			<form id= "make_post" method='POST' action='/posts/p_add'>
				
				<label for='content'>New Post:</label><br>
				<textarea rows="20" cols="100" name='content' id='content'></textarea>
				<br>
				<input type='submit' value='Make Post'>
				<br><br>
				<?php if(isset($error)): ?>
			        <div class='error'>
			            Oops!  Looks like a blank post.
			        </div>
			    <br>
		    	<?php endif; ?>

			</form>
			
		</div>

</div>