
<?php

    require_once __DIR__ . '/../../../config/conexao.php';
    require_once __DIR__ . '/../../controllers/CliController.php';

    $cliController = new cliController($pdo);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['create'])){
            $cliController->create($_POST['nome'],$_POST['cnpjcpf'],$_POST['email'],$_POST['cidade'],$_POST['endereco'],$_POST['bairro'],$_POST['uf'],$_POST['tel'],$_POST['tipo'],$_POST['dtini'],$_POST['acesso'],$_POST['obs']);
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        }elseif (isset($_POST['update'])){
            // Pass the ID as the first argument as expected by CliController::update
            $cliController->update($_POST['id'],$_POST['nome'],$_POST['cnpjcpf'],$_POST['email'],$_POST['cidade'],$_POST['endereco'],$_POST['bairro'],$_POST['uf'],$_POST['tel'],$_POST['tipo'],$_POST['dtini'],$_POST['acesso'],$_POST['obs']);
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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Cadastro de Clientes</title>
    
    <!-- Google Fonts for Premium Look -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../Paginas/style.css?v=<?= time() ?>">
</head>
<body>
    <?php include '../../comum/navibar.php'; ?>
    <div class="wrapper">
        <div class="main p-4">
            <div class="container mb-4 d-flex justify-content-between align-items-center">
                <h1 class="h3 font-weight-bold" style="color: #0f172a; margin: 0;">Gestão de Clientes</h1>
                <button id="openPopup" class="btn-create-trigger"><i class="fa fa-user-plus"></i> Cadastrar Novo</button>
            </div>

            <!-- Modal de Cadastro -->
            <div class="overlay" id="overlayCreate"></div>
            <div class="popup" id="popupCreate">
                <div class="popup-header">
                    <h2>Cadastro de Cliente</h2>
                    <button type="button" id="closePopupCreate" class="popup-close-btn"><i class="fa fa-times"></i></button>
                </div>
                <?php include 'CadCliteste2.php'; ?>
            </div>

            <!-- Modal de Edição -->
            <div class="overlay" id="overlayEdit"></div>
            <div class="popup" id="popupEdit">
                <div class="popup-header">
                    <h2>Editar Cliente</h2>
                    <button type="button" id="closePopupEdit" class="popup-close-btn"><i class="fa fa-times"></i></button>
                </div>
                <?php include 'CadCliteste3.php'; ?>
            </div>

            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h3>Lista de Clientes Cadastrados</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOME</th>
                                        <th>CNPJ/CPF</th>
                                        <th>EMAIL</th>
                                        <th>CIDADE</th>
                                        <th>ENDEREÇO</th>
                                        <th>BAIRRO</th>
                                        <th>UF</th>
                                        <th>TELEFONE</th>
                                        <th>TIPO</th>
                                        <th>DATA INICIAL</th>
                                        <th>ACESSO</th>
                                        <th>OBSERVAÇÕES</th>
                                        <th class="text-center" style="width: 220px;">AÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($cliente as $cli): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($cli['id']) ?></td>
                                        <td><strong><?= htmlspecialchars($cli['nome']) ?></strong></td>
                                        <td><?= htmlspecialchars($cli['cnpjcpf']) ?></td>
                                        <td><?= htmlspecialchars($cli['email']) ?></td>
                                        <td><?= htmlspecialchars($cli['cidade']) ?></td>
                                        <td><?= htmlspecialchars($cli['endereco']) ?></td>
                                        <td><?= htmlspecialchars($cli['bairro']) ?></td>
                                        <td><?= htmlspecialchars($cli['uf']) ?></td>
                                        <td><?= htmlspecialchars($cli['tel']) ?></td>
                                        <td><span class="badge bg-secondary"><?= htmlspecialchars($cli['tipo']) ?></span></td>
                                        <td><?= htmlspecialchars($cli['dtini']) ?></td>
                                        <td><?= htmlspecialchars($cli['acesso']) ?></td>
                                        <td><?= htmlspecialchars($cli['obs']) ?></td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="btn-action-edit edit-btn"
                                                    data-id="<?= htmlspecialchars($cli['id'] ?? '') ?>"
                                                    data-nome="<?= htmlspecialchars($cli['nome'] ?? '') ?>"
                                                    data-cnpjcpf="<?= htmlspecialchars($cli['cnpjcpf'] ?? '') ?>"
                                                    data-email="<?= htmlspecialchars($cli['email'] ?? '') ?>"
                                                    data-cidade="<?= htmlspecialchars($cli['cidade'] ?? '') ?>"
                                                    data-endereco="<?= htmlspecialchars($cli['endereco'] ?? '') ?>"
                                                    data-bairro="<?= htmlspecialchars($cli['bairro'] ?? '') ?>"
                                                    data-uf="<?= htmlspecialchars($cli['uf'] ?? '') ?>"
                                                    data-tel="<?= htmlspecialchars($cli['tel'] ?? '') ?>"
                                                    data-tipo="<?= htmlspecialchars($cli['tipo'] ?? '') ?>"
                                                    data-dtini="<?= htmlspecialchars($cli['dtini'] ?? '') ?>"
                                                    data-acesso="<?= htmlspecialchars($cli['acesso'] ?? '') ?>"
                                                    data-obs="<?= htmlspecialchars($cli['obs'] ?? '') ?>">
                                                    <i class="fa fa-pencil"></i> Editar
                                                </button>

                                                <form style="display: inline;" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir o cliente <?= htmlspecialchars(addslashes($cli['nome'])) ?>?');">
                                                    <input type="hidden" name="id" value="<?= htmlspecialchars($cli['id']) ?>">
                                                    <button type="submit" name="delete" class="btn-action-delete"><i class="fa fa-trash"></i> Excluir</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="../../Paginas/Script.js?v=<?= time() ?>"></script>
    <script>
        // Modal Open / Close Controller with CSS Transition support
        function openPopup(popupId, overlayId) {
            const popup = document.getElementById(popupId);
            const overlay = document.getElementById(overlayId);
            
            popup.style.display = 'block';
            overlay.style.display = 'block';
            
            // Force browser reflow to trigger transition
            void popup.offsetWidth;
            
            popup.classList.add('active');
            overlay.classList.add('active');
        }

        function closePopup(popupId, overlayId) {
            const popup = document.getElementById(popupId);
            const overlay = document.getElementById(overlayId);
            
            popup.classList.remove('active');
            overlay.classList.remove('active');
            
            setTimeout(() => {
                if (!popup.classList.contains('active')) {
                    popup.style.display = 'none';
                }
                if (!overlay.classList.contains('active')) {
                    overlay.style.display = 'none';
                }
            }, 300);
        }

        // Setup Create Popup Event Listeners
        document.getElementById('openPopup').onclick = function() {
            openPopup('popupCreate', 'overlayCreate');
        }
        document.getElementById('closePopupCreate').onclick = function() {
            closePopup('popupCreate', 'overlayCreate');
        }
        document.getElementById('overlayCreate').onclick = function() {
            closePopup('popupCreate', 'overlayCreate');
        }

        // Setup Edit Popup Event Listeners
        document.getElementById('closePopupEdit').onclick = function() {
            closePopup('popupEdit', 'overlayEdit');
        }
        document.getElementById('overlayEdit').onclick = function() {
            closePopup('popupEdit', 'overlayEdit');
        }

        // Edit Button Actions: Populate input fields dynamic & Open the Edit modal
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.onclick = function() {
                document.getElementById('edit-id').value = this.getAttribute('data-id') || '';
                document.getElementById('edit-nome').value = this.getAttribute('data-nome') || '';
                document.getElementById('edit-cnpjcpf').value = this.getAttribute('data-cnpjcpf') || '';
                document.getElementById('edit-email').value = this.getAttribute('data-email') || '';
                document.getElementById('edit-cidade').value = this.getAttribute('data-cidade') || '';
                document.getElementById('edit-endereco').value = this.getAttribute('data-endereco') || '';
                document.getElementById('edit-bairro').value = this.getAttribute('data-bairro') || '';
                document.getElementById('edit-uf').value = this.getAttribute('data-uf') || '';
                document.getElementById('edit-tel').value = this.getAttribute('data-tel') || '';
                document.getElementById('edit-tipo').value = this.getAttribute('data-tipo') || '';
                document.getElementById('edit-dtini').value = this.getAttribute('data-dtini') || '';
                document.getElementById('edit-acesso').value = this.getAttribute('data-acesso') || '';
                document.getElementById('edit-obs').value = this.getAttribute('data-obs') || '';

                openPopup('popupEdit', 'overlayEdit');
            };
        });
    </script>
</html>