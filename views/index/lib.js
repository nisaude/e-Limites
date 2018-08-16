DIR="http://localhost:8080/app/";

$(document).ready(function(){
	
    function listaQuadras(){	
	
        $.post(DIR+"/quadra/lista",{},function(data){
		
        var dados=JSON.parse(data);
        var txt="";
        for(var i=0;i<dados.length;i++){
		  
            txt+="<div class=\"col-sm-3\">"
            txt+="<div class=\"panel panel-primary\">"
            txt+="<div class=\"panel-heading\">"
            txt+="<h3 class=\"panel-title\">"+dados[i].nome+"</h3>"
            txt+="</div>"
            txt+="<div class=\"panel-body\">"
            txt+="<img src=\""+DIR+"public/bs/img/quadra.png\" class=\"img-responsive\" />"
            txt+="</div>"
            txt+="<a href=\"quadra/index/"+dados[i].id+"\">"
            txt+="<div class=\"panel-footer\">"
            txt+="<span class=\"pull-left\">Reservar</span>"
            txt+="<span class=\"pull-right\"><i class=\"fa fa-arrow-circle-right\"></i></span>"
            txt+="<div class=\"clearfix\"></div>"
            txt+="</div>"
            txt+="</a>"
            txt+="</div>"
            txt+="</div>"
        }	
        $("#listaquadras").html(txt);
    });	
    }
    
    listaQuadras();
});