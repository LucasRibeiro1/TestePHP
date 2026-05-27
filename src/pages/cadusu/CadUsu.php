<?php

    require_once __DIR__ . '../../../../config/conexao.php';
    require_once __DIR__ . '/../../controllers/UserController.php';

    $userController = new UserController($pdo);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['create'])){
            $userController->create($_POST['nome'],$_POST['usuario'],$_POST['senha'],$_POST['email'],$_POST['empresa'],$_POST['privilegio'],$_POST['permissao']);
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        }elseif (isset($_POST['update'])){
            // Correct parameter mapping to update($id, $nome, $usuario, $senha, $email, $empresa, $privilegio, $permissao)
            // If password is not provided in edit, we can pass a default or keep the form one.
            $senha = !empty($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : '';
            // But wait, the original User class update takes $senha directly. Let's pass the processed password or whatever the user types.
            $userController->update($_POST['id'], $_POST['nome'], $_POST['usuario'], $_POST['senha'], $_POST['email'], $_POST['empresa'], $_POST['privilegio'], $_POST['permissao']);
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        }elseif (isset($_POST['delete'])){
            $userController->delete($_POST['id']);
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        }
    }
    $users = $userController->inicio();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Cadastro de Usuários</title>
    
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
                <h1 class="h3 font-weight-bold" style="color: #0f172a; margin: 0;">Gestão de Usuários</h1>
                <button id="openPopup" class="btn-create-trigger"><i class="fa fa-user-plus"></i> Cadastrar Novo</button>
            </div>

            <!-- Modal de Cadastro -->
            <div class="overlay" id="overlayCreate"></div>
            <div class="popup" id="popupCreate">
                <div class="popup-header">
                    <h2>Cadastro de Usuário</h2>
                    <button type="button" id="closePopupCreate" class="popup-close-btn"><i class="fa fa-times"></i></button>
                </div>
                <?php include 'CadUsu2.php'; ?>
            </div>

            <!-- Modal de Edição -->
            <div class="overlay" id="overlayEdit"></div>
            <div class="popup" id="popupEdit">
                <div class="popup-header">
                    <h2>Editar Usuário</h2>
                    <button type="button" id="closePopupEdit" class="popup-close-btn"><i class="fa fa-times"></i></button>
                </div>
                <?php include 'CadUsu3.php'; ?>
            </div>

            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h3>Lista de Usuários Cadastrados</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>USUÁRIO</th>
                                        <th>NOME</th>
                                        <th>EMAIL</th>
                                        <th>EMPRESA</th>
                                        <th>PRIVILÉGIO</th>
                                        <th>PERMISSÃO</th>
                                        <th class="text-center" style="width: 220px;">AÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['id']) ?></td>
                                        <td><strong><?= htmlspecialchars($user['usuario']) ?></strong></td>
                                        <td><?= htmlspecialchars($user['nome']) ?></td>
                                        <td><?= htmlspecialchars($user['email']) ?></td>
                                        <td><?= htmlspecialchars($user['empresa']) ?></td>
                                        <td><span class="badge bg-secondary" style="padding: 6px 10px; border-radius: 6px;">Nível <?= htmlspecialchars($user['privilegio']) ?></span></td>
                                        <td><span class="badge bg-dark" style="padding: 6px 10px; border-radius: 6px;">Permissão <?= htmlspecialchars($user['permissao']) ?></span></td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="btn-action-edit edit-btn"
                                                    data-id="<?= htmlspecialchars($user['id'] ?? '') ?>"
                                                    data-usuario="<?= htmlspecialchars($user['usuario'] ?? '') ?>"
                                                    data-nome="<?= htmlspecialchars($user['nome'] ?? '') ?>"
                                                    data-email="<?= htmlspecialchars($user['email'] ?? '') ?>"
                                                    data-empresa="<?= htmlspecialchars($user['empresa'] ?? '') ?>"
                                                    data-privilegio="<?= htmlspecialchars($user['privilegio'] ?? '') ?>"
                                                    data-permissao="<?= htmlspecialchars($user['permissao'] ?? '') ?>">
                                                    <i class="fa fa-pencil"></i> Editar
                                                </button>

                                                <form style="display: inline;" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir o usuário <?= htmlspecialchars(addslashes($user['nome'])) ?>?');">
                                                    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
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
                document.getElementById('edit-usuario').value = this.getAttribute('data-usuario') || '';
                document.getElementById('edit-nome').value = this.getAttribute('data-nome') || '';
                document.getElementById('edit-email').value = this.getAttribute('data-email') || '';
                document.getElementById('edit-empresa').value = this.getAttribute('data-empresa') || '';
                document.getElementById('edit-privilegio').value = this.getAttribute('data-privilegio') || '';
                document.getElementById('edit-permissao').value = this.getAttribute('data-permissao') || '';
                document.getElementById('edit-senha').value = ''; // Don't pre-fill password for security

                openPopup('popupEdit', 'overlayEdit');
            };
        });
    </script>
</html>