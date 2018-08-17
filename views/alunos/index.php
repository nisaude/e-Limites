    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Cabeçalho da página -->
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">
                    Alunos
                </h1>
                </div>
            </div>
            
            <div class="row">
                <div ng-controller="CadAlunosController">
                    <form name="frmCadAlu" id="frmCadAlu" method="post" role="form">
                        <div class="row">
                            <div class="form-group col-md-4 col-lg-2">
                                <label>RA:</label>
                                <input type="text" class="form-control" id="txtRa" name="txtRa" placeholder="RA" maxlength="7" ng-readonly="editando" ng-model="aluno.Ra" ng-model-options="{ getterSetter: true }" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8 col-lg-6">
                                <label>Nome:</label>
                                <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Nome" maxlength="40" ng-model="aluno.Nome" ng-model-options="{ getterSetter: true }" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8 col-lg-6">
                                <label>Endereço:</label>
                                <input type="text" class="form-control" id="txtEnd" name="txtEnd" placeholder="Endereço" maxlength="40" ng-model="aluno.End" ng-model-options="{ getterSetter: true }" >
                            </div>
                        </div>

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
