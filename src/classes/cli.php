<?php

class Cli{
	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function create($nome,$cnpjcpf,$email,$cidade,$endereco,$bairro,$uf,$tel,$tipo,$dtini,$acesso,$obs){

	$sql = "INSERT INTO cadcliente(nome, usuario, senha, email, empresa, privilegio, permissao) VALUES (:nome, :usuario, :senha, :email, :empresa, :privilegio, :permissao)";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute(['nome'=> $nome,'usuario'=> $usuario,'senha'=> $senhahash,'email'=> $email,'empresa'=> $empresa,'privilegio'=> $privilegio,'permissao'=> $permissao]);
	}

	public function read(){
		$sql = "SELECT * FROM cadcliente ";
		$stmt = $this->pdo->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function update($id,$nome,$usuario,$senha,$email,$empresa,$privilegio,$permissao){
		$sql = "UPDATE cadcliente SET nome = :nome, usuario = :usuario, senha= :senha, email= :email, empresa= :empresa, privilegio= :privilegio, permissao= :permissao WHERE id = $id ";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(['nome'=>$nome,'usuario'=>$usuario,'senha'=>$senha,'email'=>$email,'empresa'=>$empresa,'privilegio'=>$privilegio,'permissao'=>$permissao]);
	}

	public function delete($id){
		$sql = "DELETE FROM cadcliente where id = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(['id' => $id]);
	}
}