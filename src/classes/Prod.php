<?php

class Prod{
	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function create($nome,$valor,$tipo,$unidade,$fabricante,$classificacao,$qtdini){


	$sql = "INSERT INTO cadprod(nome,valor,tipo,unidade,fabricante,classificacao,saldo) VALUES (:nome,:valor,:tipo,:unidade,:fabricante,:classificacao,:qtdini)";
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute(['nome'=> $nome,'valor'=> $valor,'tipo'=> $tipo,'unidade'=> $unidade,'fabricante'=> $fabricante,'classificacao'=> $classificacao,'saldo'=> $saldo]);
	}

	public function read(){
		$sql = "SELECT * FROM cadprod ";
		$stmt = $this->pdo->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function update($id,$nome,$valor,$tipo,$unidade,$fabricante,$classificacao,$saldo){
		$sql = "UPDATE cadprod SET nome = :nome, valor = :valor, tipo= :tipo, unidade= :unidade, fabricante= :fabricante, classificacao= :classificacao, saldo= :saldo WHERE id = $id ";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(['nome'=> $nome,'valor'=> $valor,'tipo'=> $tipo,'unidade'=> $unidade,'fabricante'=> $fabricante,'classificacao'=> $classificacao,'saldo'=> $saldo]);
	}

	public function delete($id){
		$sql = "DELETE FROM cadprod where id = :id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(['id' => $id]);
	}
}