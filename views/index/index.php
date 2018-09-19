    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Cabeçalho da página -->
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">
                    Consultar Limites <!--<small>Comentário adicional</small> -->
		</h1>
                </div>
            </div>
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <div class="configdiv" style="text-align:left">
                                <form name="frmConsulta" id="frmConsulta">
                                    <!-- CEP -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">CEP: </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="txtConsCEP" placeholder="Insira o CEP...">
                                        </div>
                                    </div>
                                    <!-- LOGRADOURO -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Logradouro: </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="txtConsLog" placeholder="Insira o logradouro...">
                                        </div>
                                    </div>
                                    <!-- BOTÃO CONSULTAR -->
                                    <div class="col-sm-2"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-2">
                                            <button type="button" id="btnConsulta" name="btnConsulta" class="btn btn-success" ><i class="fas fa-search"></i>
                                                Consultar</button>	
                                        </div>
                                    </div>
                                    <br>
                                    <!-- TABELA -->
                                    <div>
                                        <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>CEP</th>
                                                <th>Logradouro</th>
                                                <th>Num. Inicial</th>
                                                <th>Num. Final</th>
                                                <th>Unidade de Saúde</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="d in resultAlunos">
                                                <td>{{d.cep}}</td>
                                                <td>{{d.logradouro}}</td>
                                                <td>{{d.numini}}</td>
                                                <td>{{d.numfim}}</td>
                                                <td>{{d.unidade}}</td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>					
				</form>
                            </div>
			</div>
                        <div class="col-sm-4"> </div>
                </div>
            </div>
        </div>
    </div>