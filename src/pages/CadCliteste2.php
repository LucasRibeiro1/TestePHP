
                     <div class="container">
                        <div class="card" id="formulario-cadastro">
                            <div class="card-header">
                                <h3>Cadastro de Clientes</h3>
                            </div>
                            <div class="card-body">
                                <form id="createform" method="POST">
                                    <div class="row g-3 align-items-center">
                                            <div class="form-group col-md-4">
                                                <label>Nome</label>
                                                <input type="text" placeholder="Nome" class="form-control" name="nome">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>CNPJ/CPF</label>
                                                <input type="text" placeholder="CPNJ/CPF" class="form-control" name="cnpjcpf">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                            <input type="email" placeholder="Email" class="form-control" name="email">
                                        </div>
                                    </div><br>
                                    <div class="row g-3 align-items-center"><br>
                                        <div class="form-group col-md-4">
                                            <label>Cidade</label>
                                            <input type="text" placeholder="Cidade" class="form-control" name="cidade">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Endereço</label>
                                            <input type="text" placeholder="Endereço" class="form-control" name="endereco">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Bairro</label>
                                            <input type="text" placeholder="Bairro" class="form-control" name="bairro">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>UF</label>
                                            <input type="text" placeholder="UF" class="form-control" name="uf">
                                        </div>
                                    </div><br>
                                    <div class="row g-3 align-items-center"><br>
                                        <div class="form-group col-md-3">
                                            <label>Telefone</label>
                                            <input type="text" placeholder="Telefone" class="form-control" name="tel">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Tipo</label>
                                            <input type="text" placeholder="Tipo" class="form-control" name="tipo">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Data de Criação</label>
                                            <input type="date" placeholder="Data de Criação" class="form-control" name="dtini">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Acesso</label>
                                            <input type="text" placeholder="Acesso" class="form-control" name="acesso">
                                        </div>
                                    </div><br>
                                    <div class="row g-3 align-items-center"><br>
                                        <div class="form-group col-md-6">
                                            <label>Observações</label>
                                            <input type="text" placeholder="Observações" class="form-control" name="obs">
                                        </div>
                                    </div><br>
                                    <div class="form-check form-check-reverse">
                                        <label for="reverseCheck1">Ativo
                                        <input type="checkbox"  class="form-check-input">
                                    </div><br>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" name="create" class="btn btn-sm btn-success">Adicionar</button>
                                    </div>
                                </form>
                                <div class="card-grid">

                                </div>
                            </div>
                        </div>
                    </div>


 