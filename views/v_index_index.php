<h1>
Welcome to <?=APP_NAME?>
<?php if($user) echo ', '.$user->first_name; ?>

<?php if($user) echo ' '.$user->last_name; ?>
</h1> 