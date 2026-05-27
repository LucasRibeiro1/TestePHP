<div class="container">
    <div class="card" id="formulario-editar">
        <div class="card-header" style="background: linear-gradient(135deg, #d97706, #f59e0b);">
            <h3>Editar Produto</h3>
        </div>
        <div class="card-body">
            <form id="editform" method="POST">
                <input type="hidden" name="id" id="edit-id">
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-6">
                        <label class="form-label font-weight-bold">Nome do Produto/Serviço</label>
                        <input type="text" placeholder="Nome" class="form-control" name="nome" id="edit-nome" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label font-weight-bold">Valor (R$)</label>
                        <input type="text" placeholder="Valor" class="form-control" name="valor" id="edit-valor" required>
                    </div>
                </div><br>
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Tipo</label>
                        <select class="form-select form-control" name="tipo" id="edit-tipo" required>
                            <option value="Produto">Produto</option>
                            <option value="Servico">Serviço</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Unidade</label>
                        <input type="text" placeholder="Unidade" class="form-control" name="unidade" id="edit-unidade">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Fabricante</label>
                        <input type="text" placeholder="Fabricante" class="form-control" name="fabricante" id="edit-fabricante">
                    </div>
                </div><br>
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-6">   
                        <label class="form-label font-weight-bold">Classificação</label>
                        <input type="text" placeholder="Classificação" class="form-control" name="classificacao" id="edit-classificacao">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label font-weight-bold">Saldo Atual</label>
                        <input type="number" placeholder="Saldo" class="form-control" name="saldo" id="edit-saldo" min="0" required>
                    </div>
                </div><br>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <button type="submit" name="update" class="btn btn-sm btn-warning text-white px-4 py-2" style="background: linear-gradient(135deg, #d97706, #f59e0b); border: none; border-radius: 8px; font-weight: 600;"><i class="fa fa-save"></i> Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>
