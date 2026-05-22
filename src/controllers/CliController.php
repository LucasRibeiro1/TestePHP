<?php

	require_once __Dir__ . '/../classes/Cli.php';

	class CliController{
		private $cli;

		public function __construct($pdo){
			$this->cli = new Cli($pdo);	
		}

		public function inicio(){
			return $this->cli->read();
		}
		public function create($nome,$cnpjcpf,$email,$cidade,$endereco,$bairro,$uf,$tel,$tipo,$dtini,$acesso,$obs){
			$this->cli->create($nome,$cnpjcpf,$email,$cidade,$endereco,$bairro,$uf,$tel,$tipo,$dtini,$acesso,$obs);
		}
		public function update($id,$nome,$cnpjcpf,$email,$cidade,$endereco,$bairro,$uf,$tel,$tipo,$dtini,$acesso,$obs){
			$this->cli->update($id,$nome,$cnpjcpf,$email,$cidade,$endereco,$bairro,$uf,$tel,$tipo,$dtini,$acesso,$obs);
		}
		public function delete($id){
			$this->cli->delete($id);
		}
	}

?>