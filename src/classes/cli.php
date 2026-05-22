<?php

class Cli{
	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function create($nome,$cnpjcpf,$email,$cidade,$endereco,$bairro,$uf,$tel,$tipo,$dtini,$acesso,$obs){

	$sql = "INSERT INTO cadcliente(nome, cnpjcpf, email, cidade, endereco, bairro, uf, tel, tipo, dtini, acesso, obs) VALUES (:nome, :cnpjcpf, :email, :cidade, :endereco, :bairro, :uf, :tel, :tipo, :dtini, :acesso, :obs)";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute(['nome'=> $nome,'cnpjcpf'=> $cnpjcpf,'email'=> $email,'cidade'=> $cidade,'endereco'=> $endereco,'bairro'=> $bairro,'uf'=> $uf,'tel'=> $tel,'tipo'=> $tipo,'dtini'=> $dtini,'acesso'=> $acesso,'obs'=> $obs]);
	}

	public function read(){
		$sql = "SELECT * FROM cadcliente ";
		$stmt = $this->pdo->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function update($id,$nome,$cnpjcpf,$email,$cidade,$endereco,$bairro,$uf,$tel,$tipo,$dtini,$acesso,$obs){
		$sql = "UPDATE cadcliente SET nome = :nome, cnpjcpf = :cnpjcpf, email= :email, cidade= :cidade, endereco= :endereco, bairro= :bairro, uf= :uf, tel= :tel, tipo= :tipo, dtini= :dtini, acesso= :acesso, obs= :obs WHERE id = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(['id'=>$id,'nome'=>$nome,'cnpjcpf'=>$cnpjcpf,'email'=>$email,'cidade'=>$cidade,'endereco'=>$endereco,'bairro'=>$bairro,'uf'=>$uf,'tel'=>$tel,'tipo'=>$tipo,'dtini'=>$dtini,'acesso'=>$acesso,'obs'=>$obs]);
	}

	public function delete($id){
		$sql = "DELETE FROM cadcliente where id = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(['id' => $id]);
	}
}