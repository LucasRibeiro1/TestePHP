<?php

    require_once __DIR__ . '../../../../config/conexao.php';
    require_once __DIR__ . '/../../controllers/FornController.php';

    $fornController = new FornController($pdo);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['create'])){
            $fornController->create(
                $_POST['nome'],
                $_POST['cnpjcpf'],
                $_POST['email'],
                $_POST['cidade'],
                $_POST['endereco'],
                $_POST['bairro'],
                $_POST['uf'],
                $_POST['tel'],
                $_POST['tipo'],
                $_POST['dtini'],
                $_POST['acesso'],
                $_POST['obs']
            );
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        }elseif (isset($_POST['update'])){
            $fornController->update(
                $_POST['id'],
                $_POST['nome'],
                $_POST['cnpjcpf'],
                $_POST['email'],
                $_POST['cidade'],
                $_POST['endereco'],
                $_POST['bairro'],
                $_POST['uf'],
                $_POST['tel'],
                $_POST['tipo'],
                $_POST['dtini'],
                $_POST['acesso'],
                $_POST['obs']
            );
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        }elseif (isset($_POST['delete'])){
            $fornController->delete($_POST['id']);
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        }
    }
    $fornecedores = $fornController->inicio();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Cadastro de Fornecedores</title>
    
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
                <h1 class="h3 font-weight-bold" style="color: #0f172a; margin: 0;">Gestão de Fornecedores</h1>
                <button id="openPopup" class="btn-create-trigger"><i class="fa fa-plus-circle"></i> Cadastrar Novo</button>
            </div>

            <!-- Modal de Cadastro -->
            <div class="overlay" id="overlayCreate"></div>
            <div class="popup" id="popupCreate">
                <div class="popup-header">
                    <h2>Cadastro de Fornecedor</h2>
                    <button type="button" id="closePopupCreate" class="popup-close-btn"><i class="fa fa-times"></i></button>
                </div>
                <?php include 'CadForn2.php'; ?>
            </div>

            <!-- Modal de Edição -->
            <div class="overlay" id="overlayEdit"></div>
            <div class="popup" id="popupEdit">
                <div class="popup-header">
                    <h2>Editar Fornecedor</h2>
                    <button type="button" id="closePopupEdit" class="popup-close-btn"><i class="fa fa-times"></i></button>
                </div>
                <?php include 'CadForn3.php'; ?>
            </div>

            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h3>Lista de Fornecedores Cadastrados</h3>
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
                                        <th>TELEFONE</th>
                                        <th>TIPO</th>
                                        <th>CRIADO EM</th>
                                        <th class="text-center" style="width: 220px;">AÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($fornecedores as $forn): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($forn['id']) ?></td>
                                        <td><strong><?= htmlspecialchars($forn['nome']) ?></strong></td>
                                        <td><?= htmlspecialchars($forn['cnpjcpf']) ?></td>
                                        <td><?= htmlspecialchars($forn['email']) ?></td>
                                        <td><?= htmlspecialchars($forn['cidade']) ?> / <?= htmlspecialchars($forn['uf']) ?></td>
                                        <td><?= htmlspecialchars($forn['endereco']) ?>, <?= htmlspecialchars($forn['bairro']) ?></td>
                                        <td><?= htmlspecialchars($forn['tel']) ?></td>
                                        <td><span class="badge bg-secondary"><?= htmlspecialchars($forn['tipo']) ?></span></td>
                                        <td><?= htmlspecialchars($forn['dtini']) ?></td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="btn-action-edit edit-btn"
                                                    data-id="<?= htmlspecialchars($forn['id'] ?? '') ?>"
                                                    data-nome="<?= htmlspecialchars($forn['nome'] ?? '') ?>"
                                                    data-cnpjcpf="<?= htmlspecialchars($forn['cnpjcpf'] ?? '') ?>"
                                                    data-email="<?= htmlspecialchars($forn['email'] ?? '') ?>"
                                                    data-cidade="<?= htmlspecialchars($forn['cidade'] ?? '') ?>"
                                                    data-endereco="<?= htmlspecialchars($forn['endereco'] ?? '') ?>"
                                                    data-bairro="<?= htmlspecialchars($forn['bairro'] ?? '') ?>"
                                                    data-uf="<?= htmlspecialchars($forn['uf'] ?? '') ?>"
                                                    data-tel="<?= htmlspecialchars($forn['tel'] ?? '') ?>"
                                                    data-tipo="<?= htmlspecialchars($forn['tipo'] ?? '') ?>"
                                                    data-dtini="<?= htmlspecialchars($forn['dtini'] ?? '') ?>"
                                                    data-acesso="<?= htmlspecialchars($forn['acesso'] ?? '') ?>"
                                                    data-obs="<?= htmlspecialchars($forn['obs'] ?? '') ?>">
                                                    <i class="fa fa-pencil"></i> Editar
                                                </button>

                                                <form style="display: inline;" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir o fornecedor <?= htmlspecialchars(addslashes($forn['nome'])) ?>?');">
                                                    <input type="hidden" name="id" value="<?= htmlspecialchars($forn['id']) ?>">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../Paginas/Script.js"></script>
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