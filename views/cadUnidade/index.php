    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Cabeçalho da página -->
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">
                    Cadastrar Unidade
                </h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <div class="configdiv">
                                <form name="frmCadUnidade" id="frmCadUnidade" method="post" role="form" autocomplete="off">
                                    <!-- CNES -->
                                    <div class="row">
                                        <div class="form-group row">
                                            <label class="col-sm-2">CNES:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="txtCadUnidCNES" name="txtCadUnidCNES" placeholder="CNES..." maxlength="7"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- DESCRIÇÃO -->
                                    <div class="row">
                                        <div class="form-group row">
                                            <label class="col-sm-2">Descrição:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="txtCadUnidDesc" name="txtCadUnidDesc" placeholder="USF Exemplo" maxlength="30"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- CEP -->
                                    <div class="row">
                                        <div class="form-group row">
                                            <label class="col-sm-2">CEP: </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="txtCadUnidCEP" name="txtCadUnidCEP" placeholder="17.500-000" maxlength="10">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ENDEREÇO -->
                                    <div class="row">
                                        <div class="form-group row">
                                            <label class="col-sm-2">Endereço:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="txtCadUnidEnd" name="txtCadUnidEnd" placeholder="Logradouro, Número" maxlength="50"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- BAIRRO -->
                                    <div class="row">
                                        <div class="form-group row">
                                            <label class="col-sm-2">Bairro:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="txtCadUnidBairro" name="txtCadUnidBairro" placeholder="Informe o bairro..." maxlength="50"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- CIDADE -->
                                    <div class="row">
                                        <div class="form-group row">
                                            <label class="col-sm-2">Cidade:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="txtCadUnidCidade" name="txtCadUnidCidade" placeholder="Informe a cidade..." maxlength="40"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- BOTÕES -->
                                    <br>
                                    <div class="col-sm-2"></div>
                                    <div id="CadUsuario">
                                        <button type="button" id="btnUnidadeIncluir" name="btnUnidadeIncluir" class="btn btn-success"><i class="fas fa-save"></i>
                                            Incluir
                                        </button>
                                        <button type="button" id="btnUnidadeAlterar" name="btnUnidadeAlterar" class="btn btn-success hidden"><i class="fas fa-times"></i>
                                            Salvar Alteração
                                        </button>
                                        <button type="button" id="btnUnidadeCancelar" name="btnUnidadeCancelar" class="btn btn-danger hidden"><i class="fas fa-times"></i>
                                            Cancelar
                                        </button>
                                        <br>
                                    </div>
                                    <br>
                                    
                                    <div id="scroll">    

                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>CNES</th>
                                                    <th>Unidade de Saúde</th>
                                                    <th>Editar / Excluir</th>
                                                </tr>
                                            </thead>
                                            <tbody id="listaU">
                                              
                                            </tbody>
                                        </table>
                                           
                                    </div>    
                                    
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>