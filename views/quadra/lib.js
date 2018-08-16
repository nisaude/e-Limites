$(document).ready(function() {
		
		function refreshCalendar(){
			
			$('#calendar').fullCalendar('refetchEvents');
		}
		
		var sPageURL = decodeURIComponent(window.location);
		var sURLVariables = sPageURL.split('/');
		var q=$(sURLVariables).get(-1);
		
	
		var initialLocaleCode = 'pt-br';

		$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				//defaultDate: '2015-02-12',
				locale: initialLocaleCode,
				buttonIcons: false, // show the prev/next text
				weekNumbers: false,
				editable: false,
				firstDay: 1,
                minTime:"08:00",
                maxTime:"22:00",
                defaultView: 'agendaWeek',
                weekends: false,
				eventLimit: true, // allow "more" link when too many events				
				dayClick: function(date, jsEvent, view) {
					//alert('Clicked on: ' + date.format());
					//alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
					//alert('Current view: ' + view.name);
					// change the day's background color just for fun
					//$(this).css('background-color', 'red');
					var myDate = new Date();
					var myDate90 = new Date();
						myDate90.setDate(myDate.getDate() + 90);
			   
				   
				   if((date >= myDate)&&(date<=myDate90)) {
                    BootstrapDialog.confirm({
                        title: "Reservar instalação em "+date.format("DD/MM/YYYY")+"?",
                        message: "<p>Hora incial:"+date.format("HH:mm")+"<br> Hora Final: <input type='text' name='txthf' id='txthf' placeholder='hh:mm'></p>",
                        type: BootstrapDialog.TYPE_PRIMARY, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
                        closable: true, // <-- Default value is false
                        draggable: true, // <-- Default value is false
                        btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
                        btnOKLabel: 'OK!', // <-- Default value is 'OK',
                        btnOKClass: 'btn-primary', // <-- If you didn't specify it, dialog type will be used,
                        callback: function(result) {
                            // result will be true if button was click, while it will be false if users close the dialog directly.
                            if(result) {
                                //$.cookie("dtCons", date.format("DD/MM/YYYY HH:mm"), { expires: 7 });
                                   
									//gravar reserva
									console.log("Gravar Reserva");
									var fim=date.format("YYYY-MM-DD")+" "+$("#txthf").val();
									$.post("/app/quadra/gravaReserva",{di: date.format("YYYY-MM-DD HH:mm"), df: fim, quadra:q}, function(retorno){
										alert(retorno);
										refreshCalendar();
									});

                            }else {
                             //   alert("NOP");
                            }
                        }
                    });
				}

				},
				eventClick: function(calEvent, jsEvent, view) {

					//alert('Event: '+ calEvent.id+ " " + calEvent.title+' '+moment(calEvent.start).format('DD/MM/YYYY HH:mm')+'-'+calEvent.end);
                    //window.location="/app/quadra/edit/"+calEvent.id;
					//alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
					//alert('View: ' + view.name);

				},
                eventRender: function(event, element) {
                    //alert("OK");
                },
        events: {
            url: '/app/quadra/listaEventos/'+q,
            error: function() {
                $('#script-warning').show();
             }
        }
      });


      var $contextMenu = $("#contextMenu");

      $("body").on("contextmenu", "table tr", function(e) {
          $contextMenu.css({
              display: "block",
              left: e.pageX,
              top: e.pageY
          });
          return false;
      });

      $contextMenu.on("click", "a", function() {
          $contextMenu.hide();
      });
});