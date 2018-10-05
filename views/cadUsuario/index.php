    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Cabeçalho da página -->
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">
                    Cadastrar Usuários
                </h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <div class="configdiv">
                                <div ng-controller="CadUsuarioController">
                                    <form name="frmCadUsuario" id="frmCadUsuario" method="post" role="form">
                                        <!-- ID -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">ID:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="txtCadUsuarioId" name="txtCadUsuarioId" placeholder="Insira o ID..." maxlength="50" ng-model="frmInclusao.Id" ng-model-options="{ getterSetter: true }" ></input>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- NOME -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nome:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="txtCadUsuarioNome" name="txtCadUsuarioNome" placeholder="Insira o nome..." maxlength="50" ng-model="frmInclusao.Nome" ng-model-options="{ getterSetter: true }" ></input>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- SENHA -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Senha:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="txtCadUsuarioSenha" name="txtCadUsuarioSenha" placeholder="Senha..." maxlength="10" ng-model="frmInclusao.Senha" ng-model-options="{ getterSetter: true }" ></input>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- CONFIRM SENHA -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Confirmar Senha:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="txtCadUsuarioConfSenha" name="txtCadUsuarioConfSenha" placeholder="Confirme a Senha..." maxlength="10" ng-model="frmInclusao.ConfSenha" ng-model-options="{ getterSetter: true }" ></input>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- BOTÕES -->
                                        <br>
                                        <div class="col-sm-2"></div>
                                        <div id="CadUsuario">
                                            <button type="submit" id="btnUsuarioSalvar" name="btnUsuarioSalvar" class="btn btn-success" ng-click="incluirPessoa()"><i class="fas fa-save"></i>
                                                Incluir
                                            </button>
                                           
                                            <button type="reset" id="btnUsuarioCancel" name="btnUsuarioCancel" class="btn btn-danger" ng-click="excluirPessoa"><i class="fas fa-times"></i>
                                                Excluir
                                            </button>
                                            
                                            <br>
                                            
                                            
                                            
                                        </div>
                                        
                                        <div>
                                            {{result}}
                                        </div>
                                        
                                        <br>
                                        <div>
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nome</th>
                                                        <th>Senha</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="d in listaUsuarios">
                                                        <td>{{d.id}}</td>
                                                        <td>{{d.nome}}</td>
                                                        <td>{{d.senha}}</td>
                                                        <td><a href="#" ng-click="editarUsuario(d.id)">
                                                            <span class="glyphicon glyphicon-edit"></span>
							</a>
							
							<a href="#" ng-click="excluirUsuario(d.id)">
                                                            <span class="glyphicon glyphicon-trash"></span>
							</a>	
						</td>
                                                    </tr>
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
    </div>