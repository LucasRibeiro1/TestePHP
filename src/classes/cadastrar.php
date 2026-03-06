<?php

require('conexao.php');

$nome 		= filter_input(type: INPUT_POST, var_name: 'nome', filter: FILTER_DEFAULT);
$usuario 	= filter_input(type: INPUT_POST, var_name: 'usuario', filter: FILTER_DEFAULT);
$senha 		= filter_input(type: INPUT_POST, var_name: 'senha', filter: FILTER_DEFAULT);
$email 		= filter_input(type: INPUT_POST, var_name: 'email', filter: FILTER_DEFAULT);
$empresa 	= filter_input(type: INPUT_POST, var_name: 'empresa', filter: FILTER_DEFAULT);
$privilegio = filter_input(type: INPUT_POST, var_name: 'privilegio', filter: FILTER_DEFAULT);
$permissao 	= filter_input(type: INPUT_POST, var_name: 'permissao', filter: FILTER_DEFAULT);

try{
	$sql = "INSERT INTO cadusu (nome, usuario, senha, email, empresa, privilegio, permissao) VALUES ('$nome','$usuario','$senha','$email','$empresa','$privilegio','$permissao')";
	$statement = $pdo->query(query: $sql);
	header(header:'location:/Prod_OS/Inicio.php');
} catch (PDOException $e){
	echo 'ops! Aconteceu o erro :' . $e->getMessage();
	exit();
}