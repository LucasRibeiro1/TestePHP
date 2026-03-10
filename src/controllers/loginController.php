<?php

	require_once __Dir__ . '/../classes/User.php';

	class LoginController{
		private $login;

		public function __construct($pdo){
			$this->login = new User($pdo);	
		}

		public function login(){
			return $this->login->read();
	}
}
?>