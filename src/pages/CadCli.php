<?php

    require_once __DIR__ . '/../../config/conexao.php';
    require_once __DIR__ . '/../controllers/CliController.php';

    $cliController = new cliController($pdo);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['create'])){
            $cliController->create($_POST['nome'],$_POST['cnpjcpf'],$_POST['email'],$_POST['cid'],$_POST['end'],$_POST['bairro'],$_POST['uf'],$_POST['tel'],$_POST['tipo'],$_POST['dtini'],$_POST['acesso'],$_POST['obs']);
        }elseif (isset($_POST['update'])){
            $cliController->update($_POST['nome'],$_POST['cnpjcpf'],$_POST['email'],$_POST['cid'],$_POST['end'],$_POST['bairro'],$_POST['uf'],$_POST['tel'],$_POST['tipo'],$_POST['dtini'],$_POST['acesso'],$_POST['obs']);
        }elseif (isset($_POST['delete'])){
            $cliController->delete($_POST['id']);
    }
    }
    $cliente = $cliController->inicio();
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
<link rel="stylesheet" href="../../Paginas/style.css">
</head>
<body>
     <?php include '../comum/navibar.php'; ?>
    <div class="wrapper">
        <div class="main p-3">
                <h1> 
                     <div class="container">
                        <div class="card" id="formulario-cadastro">
                            <div class="card-header">
                                <h3>Cadastro de Clientes</h3>
                            </div>
                            <div class="card-body">
                                <form id="createform" method="POST">
                                    <div class="row g-3 align-items-center">
                                            <div class="form-group col-md-4">
                                                <label>Nome</label>
                                                <input type="text" placeholder="Nome" class="form-control" name="nome">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>CNPJ/CPF</label>
                                                <input type="text" placeholder="CPNJ/CPF" class="form-control" name="cnpjcpf">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                            <input type="email" placeholder="Email" class="form-control" name="email">
                                        </div>
                                    </div><br>
                                    <div class="row g-3 align-items-center"><br>
                                        <div class="form-group col-md-4">
                                            <label>Cidade</label>
                                            <input type="text" placeholder="Cidade" class="form-control" name="cid">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Endereço</label>
                                            <input type="text" placeholder="Endereço" class="form-control" name="end">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Bairro</label>
                                            <input type="email" placeholder="Bairro" class="form-control" name="bairro">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>UF</label>
                                            <input type="text" placeholder="UF" class="form-control" name="uf">
                                        </div>
                                    </div><br>
                                    <div class="row g-3 align-items-center"><br>
                                        <div class="form-group col-md-3">
                                            <label>Telefone</label>
                                            <input type="text" placeholder="Telefone" class="form-control" name="tel">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Tipo</label>
                                            <input type="text" placeholder="Tipo" class="form-control" name="tipo">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Data de Criação</label>
                                            <input type="date" placeholder="Data de Criação" class="form-control" name="dtini">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Acesso</label>
                                            <input type="text" placeholder="Acesso" class="form-control" name="acesso">
                                        </div>
                                    </div><br>
                                    <div class="row g-3 align-items-center"><br>
                                        <div class="form-group col-md-6">
                                            <label>Observações</label>
                                            <input type="text" placeholder="Observações" class="form-control" name="obs">
                                        </div>
                                    </div><br>
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
                                <h3>Lista de Clientes</h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOME</th>
                                            <th>CNPJ/CPF</th>
                                            <th>EMAIL</th>
                                            <th>ENDEREÇO</th>
                                            <th>BAIRRO</th>
                                            <th>CIDADE</th>
                                            <th>PAIS</th>
                                            <th>TELEFONE</th>
                                            <th>TIPO</th>
                                            <th>DATA INICIAL</th>
                                            <th>OBSERVAÇÕES</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <br>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($cliente as $cli): ?>
                                        <tr>
                                            <td><?= $cli['id'] ?></td>
                                            <td><?= $cli['nome'] ?></td>
                                            <td><?= $cli['cnpjcpf'] ?></td>
                                            <td><?= $cli['email'] ?></td>
                                            <td><?= $cli['cid'] ?></td>
                                            <td><?= $cli['end'] ?></td>
                                            <td><?= $cli['bairro'] ?></td>
                                            <td><?= $cli['uf'] ?></td>
                                            <td><?= $cli['tel'] ?></td>
                                            <td><?= $cli['tipo'] ?></td>
                                            <td><?= $cli['dtini'] ?></td>
                                            <td><?= $cli['acesso'] ?></td>
                                            <td><?= $cli['obs'] ?></td>
                                            <td>
                                            <button type="button" class="btn btn-primary btn-sm">Editar</button>
                                        <form style="display: inline;" method="POST">
                                            <input type="hidden" name="id" value="<?=$cli['id']?>">
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
    <script src="Paginas/Script.js"></script>
</html>