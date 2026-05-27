<div class="container">
                        <div class="card" id="formulario-editar">
                            <div class="card-header" style="background: linear-gradient(135deg, #d97706, #f59e0b);">
                                <h3>Editar Cliente</h3>
                            </div>
                            <div class="card-body">
                                <form id="editform" method="POST">
                                    <input type="hidden" name="id" id="edit-id">
                                    <div class="row g-3 align-items-center">
                                            <div class="form-group col-md-4">
                                                <label>Nome</label>
                                                <input type="text" placeholder="Nome" class="form-control" name="nome" id="edit-nome" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>CNPJ/CPF</label>
                                                <input type="text" placeholder="CNPJ/CPF" class="form-control" name="cnpjcpf" id="edit-cnpjcpf">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" placeholder="Email" class="form-control" name="email" id="edit-email">
                                            </div>
                                    </div><br>
                                    <div class="row g-3 align-items-center">
                                        <div class="form-group col-md-4">
                                            <label>Cidade</label>
                                            <input type="text" placeholder="Cidade" class="form-control" name="cidade" id="edit-cidade">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Endereço</label>
                                            <input type="text" placeholder="Endereço" class="form-control" name="endereco" id="edit-endereco">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Bairro</label>
                                            <input type="text" placeholder="Bairro" class="form-control" name="bairro" id="edit-bairro">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>UF</label>
                                            <input type="text" placeholder="UF" class="form-control" name="uf" id="edit-uf">
                                        </div>
                                    </div><br>
                                    <div class="row g-3 align-items-center">
                                        <div class="form-group col-md-3">
                                            <label>Telefone</label>
                                            <input type="text" placeholder="Telefone" class="form-control" name="tel" id="edit-tel">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Tipo</label>
                                            <input type="text" placeholder="Tipo" class="form-control" name="tipo" id="edit-tipo">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Data de Criação</label>
                                            <input type="date" placeholder="Data de Criação" class="form-control" name="dtini" id="edit-dtini">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Acesso</label>
                                            <input type="text" placeholder="Acesso" class="form-control" name="acesso" id="edit-acesso">
                                        </div>
                                    </div><br>
                                    <div class="row g-3 align-items-center">
                                        <div class="form-group col-md-6">
                                            <label>Observações</label>
                                            <input type="text" placeholder="Observações" class="form-control" name="obs" id="edit-obs">
                                        </div>
                                    </div><br>
                                    <div class="form-check form-check-reverse" style="display: none;">
                                        <label for="reverseCheck1">Ativo</label>
                                        <input type="checkbox" class="form-check-input" id="edit-ativo">
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" name="update" class="btn btn-sm btn-warning text-white" style="background: linear-gradient(135deg, #d97706, #f59e0b); border: none;">Salvar Alterações</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
