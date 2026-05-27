<div class="container">
    <div class="card" id="formulario-cadastro">
        <div class="card-header">
            <h3>Cadastro de Produtos</h3>
        </div>
        <div class="card-body">
            <form id="createform" method="POST">
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-6">
                        <label class="form-label font-weight-bold">Nome do Produto/Serviço</label>
                        <input type="text" placeholder="Digite o nome" class="form-control" name="nome" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label font-weight-bold">Valor (R$)</label>
                        <input type="text" placeholder="Ex: 150.00" class="form-control" name="valor" required>
                    </div>
                </div><br>
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Tipo</label>
                        <select class="form-select form-control" name="tipo" required>
                            <option value="Produto">Produto</option>
                            <option value="Servico">Serviço</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Unidade</label>
                        <input type="text" placeholder="Ex: UN, KG, PCT" class="form-control" name="unidade">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label font-weight-bold">Fabricante</label>
                        <input type="text" placeholder="Ex: Marca X" class="form-control" name="fabricante">
                    </div>
                </div><br>
                
                <div class="row g-3 align-items-center">
                    <div class="form-group col-md-6">   
                        <label class="form-label font-weight-bold">Classificação</label>
                        <input type="text" placeholder="Ex: Categoria A" class="form-control" name="classificacao">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label font-weight-bold">Quantidade Inicial</label>
                        <input type="number" placeholder="Ex: 10" class="form-control" name="qtdini" min="0" required>
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
