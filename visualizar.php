<?php
require('conexao.php');

$id = filter_input(INPUT_GET, 'ID', FILTER_DEFAULT);
$sql = "SELECT * FROM 'NOME DA TABELA' WHERE id = $id ";
$statement = $pdo->query($sql);
$result = $statement->fetch(PDO::FILTER_DEFAULT);
?>

<!-- ABAIXO COLOCAR OS DADOS PARA LISTAR OS DADOS NECESSÁRIOS.