<?php

try{
$pdo = new PDO('mysql:hostnome=localhost;dbname=meubanco', 'root', '');
}catch(PDOException $e){
	die("erro ao conectar ao banco de dados" . $e->getmessage());
}

?>