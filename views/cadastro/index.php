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
                                        <!-- CEP -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">CEP: </label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="txtCadCEP" name="txtCadCEP" placeholder="Insira o CEP..." maxlength="8" ng-readonly="editando" ng-model="aluno.Ra" ng-model-options="{ getterSetter: true }">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- LOGRADOURO -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Logradouro:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="txtLogradouro" name="txtLogradouro" placeholder="Logradouro..." maxlength="50" ng-model="aluno.Nome" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- NÚMEROS INICIAL E FINAL -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Núm. Incial:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtNumIni" name="txtNumIni" placeholder="Inicial" maxlength="6" ng-model="aluno.End" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                                <div class="col-sm-2">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Núm. Final:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtNumFim" name="txtNumFim" placeholder="Final" maxlength="6" ng-model="aluno.End" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- BAIRRO -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Bairro:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="txtBairro" name="txtBairro" placeholder="Bairro..." maxlength="50" ng-model="aluno.Nome" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- UNIDADES DE SAÚDE -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Unidade:</label>
                                                <div class="col-sm-5">                                                    
                                                    <select data-toggle="dropdown" class="form-control" aria-haspopup="true" aria-expanded="false">
                                                        <option value="0">Selecione a Unidade...</option>
                                                        <option value="1">USF Aeroporto</option>
                                                        <option value="2">USF Altaneira</option>
                                                        <option value="3">USF Aniz Badra</option>
                                                        <option value="4">USF Argolo Ferrão</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>  
                                        <!-- NÚMEROS INICIAL E FINAL -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Área:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtArea" name="txtArea" placeholder="Área..." maxlength="6" ng-model="aluno.End" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                                <div class="col-sm-1">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Micro Área:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="txtMicroArea" name="txtMicroArea" placeholder="Micro Área..." maxlength="6" ng-model="aluno.End" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- BOTÕES -->
                                        <br>
                                        <div class="col-sm-2"></div>
                                        <div id="botaoCad" ng-show="cadastrando">
                                            <button type="button" id="btnSalvar" name="btnSalvar" class="btn btn-success" ng-click="gravarNovo(aluno)">
                                                Salvar
                                            </button>
                                           
                                            <button type="reset" id="btnCancel" name="btnCancel" class="btn btn-danger" ng-click="gravarDados(aluno)">
                                                Cancelar
                                            </button>
                                             
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
