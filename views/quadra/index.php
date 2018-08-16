	<div id="page-wrapper">
            <div class="container-fluid">
			<!-- Cabeçalho da página -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php print_r($this->nome);?> <small></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row (Linha)-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                            <i class="fa fa-info-circle"></i>  <strong>Selecione o local desejado!!!</strong>
                        </div>
                    </div>
                </div>
	
	
	
	
	<!-- DADOS DAS QUADRAS     -->
				<div class="row">
					<!-- QUADRA 01 -->
                    <div class="col-sm-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
							   <h3 class="panel-title"> <?php print_r($this->nome);?>
                            </div>
                            <div class="panel-body">
                                <img src="<?=URL?>public/bs/img/quadra.png" class="img-responsive" />
								
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-4 -->
                    <div class="col-sm-3">
						<div class="page-header">
                            <h4 class="panel-title"><strong>Conteúdo disponível</strong></h3>
                        </div>
						<div>
							<?php print_r($this->descricao);?>
						</div>
						<br>
                            
						</br>
						
                    </div>
					<div class="col-sm-6">
                       <div id='calendar'></div>

                    </div>
                </div>
			</div>
		</div>
		<div id="script-warning">

                </div>
		<div id="contextMenu" class="dropdown clearfix">
                   
        </div>
				