<?php

    require_once __DIR__ . '/../../config/conexao.php';
    require_once __DIR__ . '/../controllers/UserController.php';

    $userController = new UserController($pdo);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['create'])){
            $userController->create($_POST['nome'],$_POST['usuario'],$_POST['senha'],$_POST['email'],$_POST['empresa'],$_POST['privilegio'],$_POST['permissao']);
        }elseif (isset($_POST['update'])){
            $userController->update($_POST['nome'],$_POST['usuario'],$_POST['senha'],$_POST['email'],$_POST['empresa'],$_POST['privilegio'],$_POST['permissao']);
        }elseif (isset($_POST['delete'])){
            $userController->create($_POST['id']);
    }
    }
    $users = $userController->inicio();
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
    <div class="wrapper">
        <?php include '../Comum/sidebar.php'; ?>
        <div class="main p-3">
                <h1> 
                     <div class="container">
                        <div class="card" id="formulario-cadastro">
                            <div class="card-header">
                                <h3>Cadastro de Usuários</h3>
                            </div>
                            <div class="card-body">
                                <form id="createform" method="POST">
                                    <div class="row g-3 align-items-center">
                                            <div class="form-group col-md-3">
                                                <label>Usuário</label>
                                                <input type="text" placeholder="Usuário" class="form-control" name="usuario">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Senha</label>
                                                <input type="password" placeholder="Senha" class="form-control" name="senha">
                                            </div>
                                    </div><br>
                                    <div class="row g-3 align-items-center"><br>
                                        <div class="form-group col-md-4">
                                            <label>Nome</label>
                                            <input type="text" placeholder="Nome" class="form-control" name="nome">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Email</label>
                                            <input type="email" placeholder="email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Empresa</label>
                                            <input type="text" placeholder="Empresa" class="form-control" name="empresa">
                                        </div>
                                    </div><br>
                                    <div class="row g-3 align-items-center">
                                        <div class="form-group col-md-3">   
                                            <label>Privilégios</label>
                                            <input type="number" placeholder="Privilégios" class="form-control" name="privilegio">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Permissão</label>
                                            <input type="number" placeholder="Permissao" class="form-control" name="permissao">
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
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>USUÁRIO</th>
                                        <th>NOME</th>
                                        <th>EMAIL</th>
                                        <th>EMPRESA</th>
                                        <th>PRIVILEGIO</th>
                                        <th>PERMISSAO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= $user['id'] ?></td>
                                        <td><?= $user['usuario'] ?></td>
                                        <td><?= $user['nome'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['empresa'] ?></td>
                                        <td><?= $user['privilegio'] ?></td>
                                        <td><?= $user['permissao'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            <div class="card-grid">

                                </div>
                            </div>
                        </div>
                    </div>
            </div> 
        </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="/../Paginas/Script.js"></script>
</html>