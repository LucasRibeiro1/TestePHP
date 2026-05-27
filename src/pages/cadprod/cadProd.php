<?php

    require_once __DIR__ . '../../../../config/conexao.php';
    require_once __DIR__ . '/../../controllers/ProdController.php';

    $prodController = new ProdController($pdo);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['create'])){
            $prodController->create($_POST['nome'],$_POST['valor'],$_POST['tipo'],$_POST['unidade'],$_POST['fabricante'],$_POST['classificacao'],$_POST['qtdini']);
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        }elseif (isset($_POST['update'])){
            // Correct parameter mapping to update($id, $nome, $valor, $tipo, $unidade, $fabricante, $classificacao, $saldo)
            $prodController->update($_POST['id'],$_POST['nome'],$_POST['valor'],$_POST['tipo'],$_POST['unidade'],$_POST['fabricante'],$_POST['classificacao'],$_POST['saldo']);
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        }elseif (isset($_POST['delete'])){
            $prodController->delete($_POST['id']);
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        }
    }
    $prods = $prodController->inicio();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Cadastro de Produtos</title>
    
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
                <h1 class="h3 font-weight-bold" style="color: #0f172a; margin: 0;">Gestão de Produtos</h1>
                <button id="openPopup" class="btn-create-trigger"><i class="fa fa-plus-circle"></i> Cadastrar Novo</button>
            </div>

            <!-- Modal de Cadastro -->
            <div class="overlay" id="overlayCreate"></div>
            <div class="popup" id="popupCreate">
                <div class="popup-header">
                    <h2>Cadastro de Produto</h2>
                    <button type="button" id="closePopupCreate" class="popup-close-btn"><i class="fa fa-times"></i></button>
                </div>
                <?php include 'cadProd2.php'; ?>
            </div>

            <!-- Modal de Edição -->
            <div class="overlay" id="overlayEdit"></div>
            <div class="popup" id="popupEdit">
                <div class="popup-header">
                    <h2>Editar Produto</h2>
                    <button type="button" id="closePopupEdit" class="popup-close-btn"><i class="fa fa-times"></i></button>
                </div>
                <?php include 'cadProd3.php'; ?>
            </div>

            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h3>Lista de Produtos Cadastrados</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOME</th>
                                        <th>SALDO</th>
                                        <th>VALOR</th>
                                        <th>TIPO</th>
                                        <th>UNIDADE</th>
                                        <th>FABRICANTE</th>
                                        <th>CLASSIFICAÇÃO</th>
                                        <th class="text-center" style="width: 220px;">AÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($prods as $prod): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($prod['id']) ?></td>
                                        <td><strong><?= htmlspecialchars($prod['nome']) ?></strong></td>
                                        <td><span class="badge bg-info text-dark" style="font-size: 0.85rem; font-weight: 600; padding: 6px 12px; border-radius: 6px;"><?= htmlspecialchars($prod['saldo']) ?></span></td>
                                        <td>R$ <?= htmlspecialchars(number_format((float)$prod['valor'], 2, ',', '.')) ?></td>
                                        <td>
                                            <?php if ($prod['tipo'] === 'Produto'): ?>
                                                <span class="badge bg-primary" style="padding: 6px 10px; border-radius: 6px;"><?= htmlspecialchars($prod['tipo']) ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-success" style="padding: 6px 10px; border-radius: 6px;"><?= htmlspecialchars($prod['tipo']) ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= htmlspecialchars($prod['unidade']) ?></td>
                                        <td><?= htmlspecialchars($prod['fabricante']) ?></td>
                                        <td><?= htmlspecialchars($prod['classificacao']) ?></td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="btn-action-edit edit-btn"
                                                    data-id="<?= htmlspecialchars($prod['id'] ?? '') ?>"
                                                    data-nome="<?= htmlspecialchars($prod['nome'] ?? '') ?>"
                                                    data-valor="<?= htmlspecialchars($prod['valor'] ?? '') ?>"
                                                    data-tipo="<?= htmlspecialchars($prod['tipo'] ?? '') ?>"
                                                    data-unidade="<?= htmlspecialchars($prod['unidade'] ?? '') ?>"
                                                    data-fabricante="<?= htmlspecialchars($prod['fabricante'] ?? '') ?>"
                                                    data-classificacao="<?= htmlspecialchars($prod['classificacao'] ?? '') ?>"
                                                    data-saldo="<?= htmlspecialchars($prod['saldo'] ?? '') ?>">
                                                    <i class="fa fa-pencil"></i> Editar
                                                </button>

                                                <form style="display: inline;" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir o produto <?= htmlspecialchars(addslashes($prod['nome'])) ?>?');">
                                                    <input type="hidden" name="id" value="<?= htmlspecialchars($prod['id']) ?>">
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
                document.getElementById('edit-valor').value = this.getAttribute('data-valor') || '';
                document.getElementById('edit-tipo').value = this.getAttribute('data-tipo') || '';
                document.getElementById('edit-unidade').value = this.getAttribute('data-unidade') || '';
                document.getElementById('edit-fabricante').value = this.getAttribute('data-fabricante') || '';
                document.getElementById('edit-classificacao').value = this.getAttribute('data-classificacao') || '';
                document.getElementById('edit-saldo').value = this.getAttribute('data-saldo') || '';

                openPopup('popupEdit', 'overlayEdit');
            };
        });
    </script>
</html>