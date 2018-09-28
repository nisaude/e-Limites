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
                                    
                                    <div>Nome da Lista: {{ nomeListaUsuarios }}</div>
                                    <form name="frmCadUsuario" id="frmCadUsuario" method="post" role="form">
                                        <!-- NOME -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nome:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="txtCadUsuarioNome" name="txtCadUsuarioNome" placeholder="Insira o nome..." maxlength="50" ng-model="usuario.Nome" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- SENHA -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Senha:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="txtCadUsuarioSenha" name="txtCadUsuarioSenha" placeholder="Senha..." maxlength="10" ng-model="usuario.Senha" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- BOTÕES -->
                                        <br>
                                        <div class="col-sm-2"></div>
                                        <div id="CadUsuario">
                                            <button type="submit" id="btnUsuarioSalvar" name="btnUsuarioSalvar" class="btn btn-success" ng-click="gravarDados(usuario)"><i class="fas fa-save"></i>
                                                Salvar
                                            </button>
                                           
                                            <button type="reset" id="btnUsuarioCancel" name="btnUsuarioCancel" class="btn btn-danger" ng-click="resetForm()"><i class="fas fa-times"></i>
                                                Cancelar
                                            </button>
                                            
                                            <br>
                                            
                                            <button type="button" id="btnUsuarioPesq" name="btnUsuarioPesq" class="btn btn-info" ng-click="listaUsuarios()"><i class="fas fa-times"></i>
                                                Pesquisar
                                            </button>
                                            
                                            
                                            
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
                                                    <tr ng-repeat="d in resultUsuarios">
                                                        <td>{{d.id}}</td>
                                                        <td>{{d.nome}}</td>
                                                        <td>{{d.senha}}</td>
                                                        <td><a href="#" ng-click="editarUsuario(d.id)">
                                                            <span class="glyphicon glyphicon-edit"></span>
							</a>
							
							<a href="#" ng-click="removerUsuario(d.id)">
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