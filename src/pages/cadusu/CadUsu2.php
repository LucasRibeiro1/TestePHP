<div class="container">
    <div class="card" id="formulario-cadastro">
        <div class="card-header">
            <h3>Cadastro de Usuários</h3>
        </div>
        <div class="card-body">
            <form id="createform" method="POST">
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-6">
                        <label class="form-label font-weight-bold">Usuário</label>
                        <input type="text" placeholder="Digite o nome de usuário" class="form-control" name="usuario" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label font-weight-bold">Senha</label>
                        <input type="password" placeholder="Digite a senha" class="form-control" name="senha" required>
                    </div>
                </div><br>
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Nome Completo</label>
                        <input type="text" placeholder="Nome" class="form-control" name="nome" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">E-mail</label>
                        <input type="email" placeholder="email@exemplo.com" class="form-control" name="email" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Empresa</label>
                        <input type="text" placeholder="Nome da empresa" class="form-control" name="empresa">
                    </div>
                </div><br>
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-6">   
                        <label class="form-label font-weight-bold">Privilégios (Nível)</label>
                        <input type="number" placeholder="Ex: 1, 2" class="form-control" name="privilegio" min="0" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label font-weight-bold">Permissão</label>
                        <input type="number" placeholder="Ex: 1" class="form-control" name="permissao" min="0" required>
                    </div>
                </div><br>
                
                <div class="form-check form-check-reverse d-flex justify-content-end gap-2 align-items-center" style="display: none !important;">
                    <label class="form-check-label" for="reverseCheck1">Ativo</label>
                    <input type="checkbox" class="form-check-input" id="reverseCheck1" checked>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <button type="submit" name="create" class="btn btn-sm btn-success px-4 py-2" style="border-radius: 8px; font-weight: 600;"><i class="fa fa-plus"></i> Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>
