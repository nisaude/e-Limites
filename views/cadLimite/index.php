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
                    <div class="col-sm-2"></div>
                        <div class="col-sm-7">
                            <div class="configdiv" style="text-align:left">
                                <div>
                                    <form name="frmCadLimite" id="frmCadLimite" method="post" role="form">
                                        <!-- CEP / IBGE -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">CEP:</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="txtCadCEP" name="txtCadCEP" placeholder="Insira o CEP..." maxlength="10" onkeypress="mascara(this, '##.###-###')" onblur="pesquisaCep(this.value)">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label class="col-sm-1 col-form-label">IBGE:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtIBGE" name="txtIBGE" placeholder="IBGE..." maxlength="6" ng-model="limite.IBGE" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- LOGRADOURO -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Logradouro:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="txtLogradouro" name="txtLogradouro" placeholder="Logradouro..." maxlength="50" ng-model="limite.Logradouro" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- NÚMEROS INICIAL / FINAL / LADO -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Núm. Incial:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtNumIni" name="txtNumIni" placeholder="Inicial" maxlength="6" ng-model="limite.NumIni" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                                <label class="col-sm-1 col-form-label">Final:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtNumFim" name="txtNumFim" placeholder="Final" maxlength="6" ng-model="limite.NumFim" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                                <label class="col-sm-1 col-form-label">Lado:</label>
                                                <div class="col-sm-2">
                                                    <select data-toggle="dropdown" class="form-control" aria-haspopup="true" aria-expanded="false">
                                                        <option>Ambos</option>
                                                        <option>Par</option>
                                                        <option>Impar</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- BAIRRO -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Bairro:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="txtBairro" name="txtBairro" placeholder="Bairro..." maxlength="50" ng-model="limite.Bairro" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- CIDADE -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Cidade:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="Cidade..." maxlength="50" ng-model="limite.Cidade" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- UNIDADES DE SAÚDE / UF -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Unidade:</label>
                                                <div class="col-sm-5">                                                    
                                                    <select name="unidades" id="unidades" class="form-control show-tick">
                                                        <option value="">Selecione a Unidade...</option>
                                                        <!--<option>USF Aeroporto</option> -->
                                                        <!--<option>USF Altaneira</option> -->
                                                        <!--<option>USF Aniz Badra</option> -->
                                                        <!--<option>USF Argolo Ferrão</option> -->
                                                    </select>
                                                </div>
                                                <label class="col-sm-1 col-form-label">UF:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtUF" name="txtUF" placeholder="UF..." maxlength="6" ng-model="limite.UF" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                            </div>
                                        </div> 
                                        <!-- ÁREA E MICRO ÁREA -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Área:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtArea" name="txtArea" placeholder="Área..." maxlength="6" ng-model="limite.Area" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                                <div class="col-sm-1">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Micro Área:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="txtMicroArea" name="txtMicroArea" placeholder="Micro Área..." maxlength="6" ng-model="limite.MicroArea" ng-model-options="{ getterSetter: true }" >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- BOTÕES -->
                                        <br>
                                        <div class="col-sm-2"></div>
                                        <div id="botaoCad" ng-show="cadastrando">
                                            <button type="submit" id="btnSalvar" name="btnSalvar" class="btn btn-success" ng-click="gravarDados(limite)"><i class="fas fa-save"></i>
                                                Salvar
                                            </button>
                                           
                                            <button type="reset" id="btncancel" name="btnCancel" class="btn btn-danger"><i class="fas fa-times"></i>
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