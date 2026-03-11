<?php

	require_once __Dir__ . '/../classes/Prod.php';

	class UserController{
		private $prod;

		public function __construct($pdo){
			$this->prod = new User($pdo);	
		}

		public function inicio(){
			return $this->prod->read();
		}
		public function create($nome,$valor,$tipo,$unidade,$fabricante,$classificacao,$qtdini){
			$this->prod->create($nome,$valor,$tipo,$unidade,$fabricante,$classificacao,$qtdini);
		}
		public function update($id,$nome,$valor,$tipo,$unidade,$fabricante,$classificacao,$saldo){
			$this->prod->update($id,$nome,$valor,$tipo,$unidade,$fabricante,$classificacao,$saldo);
		}
		public function delete($id){
			$this->prod->delete($id);
		}
	}


?>