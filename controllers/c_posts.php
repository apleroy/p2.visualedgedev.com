<?php

class posts_controller extends base_controller {
	
	public function __construct() {
		parent::__construct();

		if(!$this->user) {
			die("Members only. <a href='/users/login'>Login</a>");
		}
	}

	public function index() {

		Router::redirect("/users/profile");
	}

	public function add() {

		$this->template->content = View::instance('v_posts_add');
		$this->template->title = "New Post";

		echo $this->template;

	}

	public function p_add() {

		$_POST['user_id'] = $this->user->user_id;

		$_POST['created'] = Time::now();

		$_POST['modified'] = Time::now();

		DB::instance(DB_NAME)->insert('posts', $_POST);

		Router::redirect("/users/profile");

	}

	public function users() {

		$this->template->content= View::instance("v_posts_users");
		$this->template->title = "Users";

		$q = "SELECT *
			FROM users";

		$users = DB::instance(DB_NAME)->select_rows($q);

		$q3 = "SELECT *
			FROM profilePics";

		$pics = DB::instance(DB_NAME)->select_rows($q3);

		$q2 = "SELECT *
			FROM users_users
			WHERE users_users.user_id = ".$this->user->user_id;

		$connections = DB::instance(DB_NAME)->select_array($q2, 'user_id_followed');

		$this->template->content->pics = $pics;
		$this->template->content->users = $users;
		$this->template->content->connections = $connections;

		echo $this->template;

	}


	public function follow($user_id_followed) {

		$data = Array(
			"created" => Time::now(),
			"user_id" => $this->user->user_id,
			"user_id_followed" => $user_id_followed
			);

		DB::instance(DB_NAME)->insert('users_users', $data);

		Router::redirect("/posts/users");

	}


	public function unfollow($user_id_followed) {

		$where_connection = 'WHERE user_id = '.$this->user->user_id.' 
		AND user_id_followed = '.$user_id_followed;

		DB::instance(DB_NAME)->delete('users_users', $where_connection);

		Router::redirect("/posts/users");

	}







}

?>