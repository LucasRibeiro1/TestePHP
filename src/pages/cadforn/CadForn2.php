<div class="container">
    <div class="card" id="formulario-cadastro">
        <div class="card-header">
            <h3>Cadastro de Fornecedores</h3>
        </div>
        <div class="card-body">
            <form id="createform" method="POST">
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Nome</label>
                        <input type="text" placeholder="Nome do fornecedor" class="form-control" name="nome" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="form-label font-weight-bold">CNPJ/CPF</label>
                        <input type="text" placeholder="CNPJ/CPF" class="form-control" name="cnpjcpf" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label font-weight-bold">E-mail</label>
                        <input type="email" placeholder="fornecedor@exemplo.com" class="form-control" name="email" required>
                    </div>
                </div><br>
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Cidade</label>
                        <input type="text" placeholder="Cidade" class="form-control" name="cidade">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Endereço</label>
                        <input type="text" placeholder="Rua, Número, Comp." class="form-control" name="endereco">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label font-weight-bold">Bairro</label>
                        <input type="text" placeholder="Bairro" class="form-control" name="bairro">
                    </div>
                    <div class="form-group col-md-1">
                        <label class="form-label font-weight-bold">UF</label>
                        <input type="text" placeholder="UF" class="form-control" name="uf" maxlength="2">
                    </div>
                </div><br>
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-3">
                        <label class="form-label font-weight-bold">Telefone</label>
                        <input type="text" placeholder="(99) 99999-9999" class="form-control" name="tel">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="form-label font-weight-bold">Tipo</label>
                        <input type="text" placeholder="Ex: Matéria Prima" class="form-control" name="tipo">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label font-weight-bold">Data de Criação</label>
                        <input type="date" class="form-control" name="dtini" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Acesso</label>
                        <input type="text" placeholder="Nível de acesso" class="form-control" name="acesso">
                    </div>
                </div><br>
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-12">
                        <label class="form-label font-weight-bold">Observações</label>
                        <input type="text" placeholder="Observações adicionais" class="form-control" name="obs">
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
