<div class="container">
    <div class="card" id="formulario-editar">
        <div class="card-header" style="background: linear-gradient(135deg, #d97706, #f59e0b);">
            <h3>Editar Usuário</h3>
        </div>
        <div class="card-body">
            <form id="editform" method="POST">
                <input type="hidden" name="id" id="edit-id">
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-6">
                        <label class="form-label font-weight-bold">Usuário</label>
                        <input type="text" placeholder="Usuário" class="form-control" name="usuario" id="edit-usuario" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label font-weight-bold">Nova Senha (Preencha para alterar)</label>
                        <input type="password" placeholder="Digite uma nova senha" class="form-control" name="senha" id="edit-senha">
                    </div>
                </div><br>
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Nome Completo</label>
                        <input type="text" placeholder="Nome" class="form-control" name="nome" id="edit-nome" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">E-mail</label>
                        <input type="email" placeholder="E-mail" class="form-control" name="email" id="edit-email" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Empresa</label>
                        <input type="text" placeholder="Empresa" class="form-control" name="empresa" id="edit-empresa">
                    </div>
                </div><br>
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-6">   
                        <label class="form-label font-weight-bold">Privilégios (Nível)</label>
                        <input type="number" placeholder="Privilégios" class="form-control" name="privilegio" id="edit-privilegio" min="0" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label font-weight-bold">Permissão</label>
                        <input type="number" placeholder="Permissão" class="form-control" name="permissao" id="edit-permissao" min="0" required>
                    </div>
                </div><br>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <button type="submit" name="update" class="btn btn-sm btn-warning text-white px-4 py-2" style="background: linear-gradient(135deg, #d97706, #f59e0b); border: none; border-radius: 8px; font-weight: 600;"><i class="fa fa-save"></i> Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>
