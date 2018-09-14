    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Cabeçalho da página -->
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">
                    Cadastrar Limites
                </h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <div class="configdiv" style="text-align:left">
                                <div ng-controller="CadAlunosController">
                                    <form name="frmCadAlu" id="frmCadAlu" method="post" role="form">
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">CEP: </label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="txtCadCEP" name="txtCadCEP" placeholder="Insira o CEP..." maxlength="8" ng-readonly="editando" ng-model="aluno.Ra" ng-model-options="{ getterSetter: true }">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Logradouro:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="txtLogradouro" name="txtLogradouro" placeholder="Logradouro..." maxlength="40" ng-model="aluno.Nome" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Número Incial:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtNumIni" name="txtNumIni" placeholder="Inicial" maxlength="6" ng-model="aluno.End" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                                <div class="col-sm-2">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Número Final:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtNumFim" name="txtNumFim" placeholder="Final" maxlength="6" ng-model="aluno.End" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-8 col-lg-4">
                                                <label>Unidade:</label>
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Selecione a unidade
                                                </button>
                                                <div class="dropdown-menu">
                                                ...inserir banco de dados
                                                </div>
                                            </div>
                                        </div>    
                                        <!-- BOTÕES -->
                                        <div id="botaocad" ng-show="cadastrando">
                                            <button type="button" id="btnCad" name="btnCad" class="btn btn-default" ng-click="gravarNovo(aluno)">
                                                Cadastrar
                                            </button>
                                        </div>
                                        <div id="botoesedit" ng-show="editando">
                                            <button type="button" id="btnSave" name="btnSave" class="btn btn-default" ng-click="gravarDados(aluno)">
                                                Gravar
                                            </button>
                                            <button type="button" name="btnCancel" id="btnCancel" class="btn btn-default" ng-click="resetForm()">
                                                Cancelar
                                            </button>
                                        </div>
                                        <div>
                                            {{result}}
                                        </div>
                                    </form>
                                    <br>
                                    <div>
                                        <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>RA</th>
                                                <th>Nome</th>
                                                <th>Endereço</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="d in resultAlunos">
                                                <td>{{d.ra}}</td>
                                                <td>{{d.nome}}</td>
                                                <td>{{d.endereco}}</td>
                                                <td>
                                                    <a href="#" ng-click="editarAluno(d.ra)">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                    </a>
                                                    <a href="#" ng-click="removerAluno(d.ra)">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </a>	
                                                </td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
