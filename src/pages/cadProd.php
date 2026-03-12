<?php

    require_once __DIR__ . '/../../config/conexao.php';
    require_once __DIR__ . '/../controllers/ProdController.php';

    $prodController = new ProdController($pdo);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['create'])){
            $prodController->create($_POST['nome'],$_POST['valor'],$_POST['tipo'],$_POST['unidade'],$_POST['fabricante'],$_POST['classificacao'],$_POST['qtdini']);
        }elseif (isset($_POST['update'])){
            $prodController->update($_POST['nome'],$_POST['valor'],$_POST['tipo'],$_POST['unidade'],$_POST['fabricante'],$_POST['classificacao'],$_POST['saldo']);
        }elseif (isset($_POST['delete'])){
            $prodController->delete($_POST['id']);
    }
    }
    $prods = $prodController->inicio();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>teste</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/../Paginas/style.css">
</head>
<body>
    <?php include '../comum/navibar.php'; ?>
    <div class="wrapper">
        <div class="main p-3">
                <h1> 
                     <div class="container">
                        <div class="card" id="formulario-cadastro">
                            <div class="card-header">
                                <h3>Cadastro de Produtos</h3>
                            </div>
                            <div class="card-body">
                                <form id="createform" method="POST">
                                    <div class="row g-3 align-items-center">
                                            <div class="form-group col-md-3">
                                                <label>Nome</label>
                                                <input type="text" placeholder="Nome" class="form-control" name="nome">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Valor</label>
                                                <input type="text" placeholder="Valor" class="form-control" name="valor">
                                            </div>
                                    </div><br>
                                    <div class="row g-3 align-items-center"><br>
                                        <div class="form-group col-md-4">
                                            <label>Tipo</label>
                                            <input type="text" placeholder="Tipo" class="form-control" name="tipo">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Unidade</label>
                                            <input type="text" placeholder="Unidade" class="form-control" name="unidade">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Fabricante</label>
                                            <input type="text" placeholder="Fabricante" class="form-control" name="fabricante">
                                        </div>
                                    </div><br>
                                    <div class="row g-3 align-items-center">
                                        <div class="form-group col-md-3">   
                                            <label>Classificação</label>
                                            <input type="text" placeholder="Classificacao" class="form-control" name="classificacao">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Quantidade Inicial</label>
                                            <input type="number" placeholder="QTD.Inicial" class="form-control" name="qtdini">
                                        </div>
                                    </div>
                                    <div class="form-check form-check-reverse">
                                        <label for="reverseCheck1">Ativo
                                        <input type="checkbox"  class="form-check-input">
                                    </div><br>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" name="create" class="btn btn-sm btn-success">Adicionar</button>
                                    </div>
                                </form>
                                <div class="card-grid">

                                </div>
                            </div>
                        </div>
                    </div>
                </h1>
                <div class="container">
                        <div class="card" id="formulario-cadastro">
                            <div class="card-header">
                                <h3>Lista de Usuários</h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOME</th>
                                            <th>SALDO</th>
                                            <th>VALOR</th>
                                            <th>TIPO</th>
                                            <th>UNIDADE</th>
                                            <th>FABRICANTE</th>
                                            <th>CALSSIFICAÇÃO</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <br>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($prods as $prod): ?>
                                        <tr>
                                            <td><?= $prod['id'] ?></td>
                                            <td><?= $prod['nome'] ?></td>
                                            <td><?= $prod['saldo'] ?></td>
                                            <td><?= $prod['valor'] ?></td>
                                            <td><?= $prod['tipo'] ?></td>
                                            <td><?= $prod['unidade'] ?></td>
                                            <td><?= $prod['fabricante'] ?></td>
                                            <td><?= $prod['classificacao'] ?></td>
                                            <td>
                                            <button type="button" class="btn btn-primary btn-sm">Editar</button>
                                        <form style="display: inline;" method="POST">
                                            <input type="hidden" name="id" value="<?=$prod['id']?>">
                                            <button type="submit" name="delete" class="btn btn-danger btn-sm" method="POST">Excluir</button></td>
                                        </form>
                                        </tr>
                                        <br>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>   
                            </div>
                        </div>
                    </div>
            </div> 
        </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="/../Paginas/Script.js"></script>
</html>