$(document).ready(function(){
			
			$(document).on("click","#btnOK",function(){
				
				var frm = $("#frmcad").serialize();
				ligapre();
				$.post("grava.php",frm)
				 .done(function(dados){
					$("#retorno").html(dados);
				})
				.always(function(){
					desligapre();
				});
				
			});
			function ligapre(){
			
				$("#preloader").html("<img src='preloader.gif'>");
			
			}	
		
			function desligapre(){
			
				$("#preloader").html("");
			
			}	
			$.post("lista_instalacoes.php",{}).done(function(dados){
				$("#sel_instalacoes").html(dados);
			});
			
			CKEDITOR.replace("txtdesc");
		});