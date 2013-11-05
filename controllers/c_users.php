<?php

class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
	}


	
	public function signup($signup_error = NULL) {
		
		$this->template->content = View::instance('v_index_index');
		
		$this->template->content->signup_error = $signup_error;

		echo $this->template;
		
	}

	public function signup_duplicate($duplicate_error = NULL) {
		
		$this->template->content = View::instance('v_index_index');
		
		$this->template->content->duplicate_error = $duplicate_error;

		echo $this->template;
		
	}

	public function signup_invalid($invalid_error = NULL) {
		
		$this->template->content = View::instance('v_index_index');
		
		$this->template->content->invalid_error = $invalid_error;

		echo $this->template;
		
	}


	public function p_signup() {

		
		//ensure valid email address syntax- this is the variable
			$email_a = $_POST['email'];

		//check to ensure there is not already a user with that email (a duplicate)
			$q = "SELECT users.email
				FROM users 
	        	WHERE users.email = '".$_POST['email']."'
	        	";
			
			$email_validation = DB::instance(DB_NAME)->select_field($q);

		//validation of empty fields

		if (empty($_POST['first_name'])) {
			Router::redirect("/users/signup/signup_error");

    	} elseif (empty($_POST['last_name'])) {
    		Router::redirect("/users/signup/signup_error");
        	
    	} elseif (empty($_POST['email'])) {
        	Router::redirect("/users/signup/signuperror");
        	
    	} elseif (empty($_POST['password'])) {
        	Router::redirect("/users/signup/signup_error");
        
        //check for valid email syntax	
    	} elseif (!filter_var($email_a, FILTER_VALIDATE_EMAIL)) {
    	
			Router::redirect("/users/signup_invalid/signup_invalid");
		
    	} 
    	//check duplicate
    	elseif ($email_validation) {
				
			Router::redirect("/users/signup_duplicate/signup_duplicate");
		
		//signup the user and send info to DB	
		} else {

				$_POST['created'] = Time::now();
				$_POST['modified'] = Time::now();
				$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
				$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

				$user_id = DB::instance(DB_NAME)->insert('users', $_POST);

				$q5 = "SELECT users.user_id
				FROM users 
	        	WHERE users.email = '".$_POST['email']."'
	        	";
			
				$user_validation = DB::instance(DB_NAME)->select_field($q5);
				//insert a default pic for user

				$data = Array('pic_id' => $user_validation,
						'user_id' => $user_validation,
						'created' => Time::now(),
						'picture' => "/uploads/profiles/blank_profile.jpg");

				$user_id = DB::instance(DB_NAME)->update_or_insert_row('profilePics', $data);

				
				//upon signup, give the user a token to continue directly to their page
				$q2 = "SELECT token
				FROM users 
	        	WHERE email = '".$_POST['email']."'
	        	AND password = '".$_POST['password']."'";

				$token = DB::instance(DB_NAME)->select_field($q2);

				setcookie("token", $token, strtotime('+1 year'), '/');

				Router::redirect("/users/profile");
		}		
	
	}
	

	public function login($error = NULL) {
		
		$this->template->content = View::instance('v_index_index');
		
		$this->template->content->error = $error;
		
		echo $this->template;

	}

	public function p_login() {
			
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);

		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

		// $_POST['last_login'] = DB::instance(DB_NAME)->insert(Time::now());

		$q = "SELECT token
			FROM users 
        	WHERE email = '".$_POST['email']."'
        	AND password = '".$_POST['password']."'";

		$token = DB::instance(DB_NAME)->select_field($q);

		if(!$token) {
			Router::redirect("/users/login/error");
			//echo "Not valid";
		}
		else {
			setcookie("token", $token, strtotime('+1 year'), '/');

			Router::redirect("/users/profile");
			//echo "Logged in!";
		}
	}

	public function logout() {
		
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

		$data = Array("token" => $new_token);

		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

		setcookie("token", "", strtotime('-1 year'), '/');

		Router::redirect("/");

	}

	public function profile($error = NULL) {

		if(!$this->user) {
			Router::redirect('/users/login');
		}

		$this->template->content = View::instance('v_users_profile');

		//This person's profile and name
			$this->template->title = "Profile of ".$this->user->first_name;

		//This person's bio
			$bioQ = "SELECT bios.content
				FROM bios
				WHERE bios.user_id = ".$this->user->user_id;

			$bios = DB::instance(DB_NAME)->select_rows($bioQ);

			$this->template->content->bios = $bios;

		//This person's profile picture

			$picQ = "SELECT profilePics.picture
				FROM profilePics
				WHERE profilePics.user_id = ".$this->user->user_id;

			$pics = DB::instance(DB_NAME)->select_rows($picQ);

			$this->template->content->pics = $pics;


		//Show selected posts from people the user is following.
		//Join together user pic from those people.
		//Order the posts descending by time created so that most recent is on top

			$postsQ = 'SELECT
				posts.content,
				posts.created,
				posts.user_id AS post_user_id,
				users_users.user_id AS follower_id,
				users.first_name,
				users.last_name,
				profilePics.picture
			FROM posts
			INNER JOIN users_users
				ON posts.user_id = users_users.user_id_followed
			INNER JOIN users
				ON posts.user_id = users.user_id
			INNER JOIN profilePics
				ON profilePics.user_id = posts.user_id
			WHERE users_users.user_id = '.$this->user->user_id .'
			ORDER BY posts.created DESC';

			$posts = DB::instance(DB_NAME)->select_rows($postsQ);

			$this->template->content->posts = $posts;

		
		echo $this->template;
			
		
	}

	public function p_bio() {
		$_POST['user_id'] = $this->user->user_id;

		$_POST['created'] = Time::now();

		$_POST['bio_id'] = $this->user->user_id;
		
		DB::instance(DB_NAME)->update_or_insert_row('bios', $_POST);
		
		Router::redirect("/users/profile");
	}


	public function p_upload() {
		
		$image = Upload::upload($_FILES, "/uploads/profiles/", array("jpg", "jpeg", "gif", "png"), "picture".$this->user->user_id);

		//need to prevent a blank photo upload from occuring
		if(($_FILES['photo']['size']) == 0 || $image == 'Invalid file type.') {

            Router::redirect("/users/profile");

    	} else {

			$_POST['user_id'] = $this->user->user_id;

			$_POST['created'] = Time::now();

			$_POST['pic_id'] = $this->user->user_id;

	        $_POST['picture'] = Upload::upload($_FILES, "/uploads/profiles/", array("jpg", "jpeg", "gif", "png"), "picture".$this->user->user_id);

			DB::instance(DB_NAME)->update_or_insert_row('profilePics', $_POST);

			Router::redirect("/users/profile");

		}
		
	}

}

?>