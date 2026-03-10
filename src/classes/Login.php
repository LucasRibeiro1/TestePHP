<?php

session_start();

require('../../config/conexao.php');

		$usuario = $_POST['usuario'] ?? '';
		$senha   = $_POST['senha'] ?? '';

		$sql = "SELECT * FROM cadusu WHERE usuario = :usuario LIMIT 1";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(":usuario",$usuario);
		$stmt->execute();

		$dados = $stmt->fetch(PDO::FETCH_ASSOC);

		if($dados){

			if (password_verify($senha,$dados['senha'])){
				$_SESSION['usuario_id'] = $dados['id'];
				$_SESSION['usuario_nome'] = $dados['nome'];
				header('location: ../../inicio.php');
				exit();
			}else{
				$_SESSION['erro_login'] = "Senha Incorreta!! ";
				header("location: ../pages/PagLogin.php");
				exit();

			}
		
		}else{
			$_SESSION['erro_login'] = "Usuario não Encontrado";
			header("location: ../pages/PagLogin.php");
			exit();
		}


?>