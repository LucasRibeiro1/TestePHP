
<?php

    require_once __DIR__ . '/../../config/conexao.php';
    require_once __DIR__ . '/../controllers/CliController.php';

    $cliController = new cliController($pdo);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['create'])){
            $cliController->create($_POST['nome'],$_POST['cnpjcpf'],$_POST['email'],$_POST['cidade'],$_POST['endereco'],$_POST['bairro'],$_POST['uf'],$_POST['tel'],$_POST['tipo'],$_POST['dtini'],$_POST['acesso'],$_POST['obs']);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
        }elseif (isset($_POST['update'])){
            $cliController->update($_POST['nome'],$_POST['cnpjcpf'],$_POST['email'],$_POST['cidade'],$_POST['endereco'],$_POST['bairro'],$_POST['uf'],$_POST['tel'],$_POST['tipo'],$_POST['dtini'],$_POST['acesso'],$_POST['obs']);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
        }elseif (isset($_POST['delete'])){
            $cliController->delete($_POST['id']);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
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
<style>
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border: 1px solid #ccc;
            padding: 20px;
            z-index: 1000;
        }
        .overlay {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 500;
        }
    </style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../Paginas/style.css">
</head>
<body>
     <?php include '../comum/navibar.php'; ?>
    <div class="wrapper">
        <div class="main p-3">
                
        <button id="openPopup" class="btn btn-success btn-sm">Cadastrar</button>

        <div class="overlay" id="overlay"></div>
        <div class="popup" id="popup">
            <h2>Cadastro de Cliente</h2>
            <?php $message = include '../pages/CadCliteste2.php'; ?>
        <button id="closePopup">Close</button>
    </div>


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
                                            <td><?= $cli['cidade'] ?></td>
                                            <td><?= $cli['endereco'] ?></td>
                                            <td><?= $cli['bairro'] ?></td>
                                            <td><?= $cli['uf'] ?></td>
                                            <td><?= $cli['tel'] ?></td>
                                            <td><?= $cli['tipo'] ?></td>
                                            <td><?= $cli['dtini'] ?></td>
                                            <td><?= $cli['acesso'] ?></td>
                                            <td><?= $cli['obs'] ?></td>
                                            <td>
                                            <button id="openPopup1" class="btn btn-success btn-sm">Editar</button>

                                                <div class="overlay" id="overlay"></div>
                                                <div class="popup" id="popup" >
                                                    <h2>Editar</h2>
                                                        <?php $message = include '../pages/CadCliteste3.php'; ?>
                                                <button id="closePopup1">Close</button>
                                            <td>
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
        <script>
        document.getElementById('openPopup').onclick = function() {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }
        document.getElementById('closePopup').onclick = function() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
        document.getElementById('openPopup1').onclick = function() {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }
        document.getElementById('closePopup1').onclick = function() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>
</html>