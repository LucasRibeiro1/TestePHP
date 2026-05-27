<div class="container">
    <div class="card" id="formulario-editar">
        <div class="card-header" style="background: linear-gradient(135deg, #d97706, #f59e0b);">
            <h3>Editar Fornecedor</h3>
        </div>
        <div class="card-body">
            <form id="editform" method="POST">
                <input type="hidden" name="id" id="edit-id">
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Nome</label>
                        <input type="text" placeholder="Nome" class="form-control" name="nome" id="edit-nome" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="form-label font-weight-bold">CNPJ/CPF</label>
                        <input type="text" placeholder="CNPJ/CPF" class="form-control" name="cnpjcpf" id="edit-cnpjcpf" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label font-weight-bold">E-mail</label>
                        <input type="email" placeholder="E-mail" class="form-control" name="email" id="edit-email" required>
                    </div>
                </div><br>
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Cidade</label>
                        <input type="text" placeholder="Cidade" class="form-control" name="cidade" id="edit-cidade">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Endereço</label>
                        <input type="text" placeholder="Endereço" class="form-control" name="endereco" id="edit-endereco">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label font-weight-bold">Bairro</label>
                        <input type="text" placeholder="Bairro" class="form-control" name="bairro" id="edit-bairro">
                    </div>
                    <div class="form-group col-md-1">
                        <label class="form-label font-weight-bold">UF</label>
                        <input type="text" placeholder="UF" class="form-control" name="uf" id="edit-uf" maxlength="2">
                    </div>
                </div><br>
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-3">
                        <label class="form-label font-weight-bold">Telefone</label>
                        <input type="text" placeholder="Telefone" class="form-control" name="tel" id="edit-tel">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="form-label font-weight-bold">Tipo</label>
                        <input type="text" placeholder="Tipo" class="form-control" name="tipo" id="edit-tipo">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label font-weight-bold">Data de Criação</label>
                        <input type="date" class="form-control" name="dtini" id="edit-dtini" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Acesso</label>
                        <input type="text" placeholder="Acesso" class="form-control" name="acesso" id="edit-acesso">
                    </div>
                </div><br>
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-12">
                        <label class="form-label font-weight-bold">Observações</label>
                        <input type="text" placeholder="Observações" class="form-control" name="obs" id="edit-obs">
                    </div>
                </div><br>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <button type="submit" name="update" class="btn btn-sm btn-warning text-white px-4 py-2" style="background: linear-gradient(135deg, #d97706, #f59e0b); border: none; border-radius: 8px; font-weight: 600;"><i class="fa fa-save"></i> Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>
