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
                                    <form name="frmCadLimite" id="frmCadLimite" method="post" role="form" autocomplete="off">
                                        <!-- CEP / IBGE -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">CEP:</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="txtCadCEP" name="txtCadCEP" placeholder="Insira o CEP..." maxlength="10"  onkeypress="mascara(this, '##.###-###')" > <!--   onblur="pesquisaCep(this.value)"    -->
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label class="col-sm-1 col-form-label">IBGE:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtIBGE" name="txtIBGE" placeholder="IBGE..." maxlength="6">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- LOGRADOURO -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Logradouro:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="txtLogradouro" name="txtLogradouro" placeholder="Logradouro..." maxlength="50">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- NÚMEROS INICIAL / FINAL / LADO -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Núm. Incial:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtNumIni" name="txtNumIni" placeholder="Inicial" maxlength="6">
                                                </div>
                                                <label class="col-sm-1 col-form-label">Final:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtNumFim" name="txtNumFim" placeholder="Final" maxlength="6">
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
                                                    <input type="text" class="form-control" id="txtBairro" name="txtBairro" placeholder="Bairro..." maxlength="50">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- CIDADE -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Cidade:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="Cidade..." maxlength="50">
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
                                                    </select>
                                                </div>
                                                <label class="col-sm-1 col-form-label">UF:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtUF" name="txtUF" placeholder="UF..." maxlength="6">
                                                </div>
                                            </div>
                                        </div> 
                                        <!-- ÁREA E MICRO ÁREA -->
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Área:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="txtArea" name="txtArea" placeholder="Área..." maxlength="6">
                                                </div>
                                                <div class="col-sm-1">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Micro Área:</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="txtMicroArea" name="txtMicroArea" placeholder="Micro Área..." maxlength="6">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- BOTÕES -->
                                        <br>
                                        <div class="col-sm-2"></div>
                                        <div id="botaoCad" ng-show="cadastrando">
                                            <button type="submit" id="btnSalvar" name="btnSalvar" class="btn btn-success"><i class="fas fa-save"></i>
                                                Salvar
                                            </button>
                                           
                                            <button type="reset" id="btncancel" name="btnCancel" class="btn btn-danger" onclick="limpa_formulario_cep();"><i class="fas fa-times"></i>
                                                Cancelar
                                            </button>
                                        </div>
                                        <br>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2"></div>
                    <div class="col-sm-6">
                        <div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>CEP</th>
                                        <th>Logradouro</th>
                                        <th>Bairro</th>
                                        <th>Num. Inícial</th>
                                        <th>Num. Final</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="listaLimites">
                                     <!-- Aqui o JavaScript está preenchendo-->            
                                </tbody>
                            </table>
                        </div>               
                    </div>
            </div>
        </div>
    </div>