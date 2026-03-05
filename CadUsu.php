

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
<link rel="stylesheet" href="Paginas/style.css">
</head>
<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="main p-3">
                <h1> 
                     <div class="container">
                        <div class="card" id="formulario-cadastro">
                            <div class="card-header">
                                <h3>Cadastro de Usuários</h3>
                            </div>
                            <div class="card-body">
                                <form action="cadastrar.php" method="post">
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
                                        <input type="submit" value="Cadastrar" class="btn btn-sm btn-success">
                                    <!--    <a href="Inicio.html" class="btn btn-primary" >Salvar</a>
                                        <a href="Inicio.html" class="btn btn-warning" >Editar</a>
                                        <a href="Inicio.html" class="btn btn-danger" >Cancelar</a> -->
                                    </div>
                                </form>
                                <div class="card-grid">

                                </div>
                            </div>
                        </div>
                    </div>
                </h1>
            </div> 
        </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="Paginas/Script.js"></script>
</html>