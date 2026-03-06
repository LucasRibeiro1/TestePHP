<?php

	require_once __Dir__ . '/../classes/User.php';

	class UserController{
		private $user;

		public function __construct($pdo){
			$this->user = new User($pdo);	
		}

		public function inicio(){
			return $this->user->read();
		}
		public function create($nome,$usuario,$senha,$email,$empresa,$privilegio,$permissao){
			$this->user->create($nome,$usuario,$senha,$email,$empresa,$privilegio,$permissao);
		}
		public function update($id,$nome,$usuario,$senha,$email,$empresa,$privilegio,$permissao){
			$this->user->update($id,$nome,$usuario,$senha,$email,$empresa,$privilegio,$permissao);
		}
		public function delete($id){
			$this->user->delete($id);
		}
	}



?>