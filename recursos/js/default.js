$(function(){
	$("#frmValidar").submit(function(){
		var url =$("#frmValidar").attr('action');//captura la url del action
		var datos =$("#frmValidar").serialize();//captura los datos del formulario
		$.post(url, datos, function(e){
			if(e.success == 1){
				window.location.href = "http://localhost/APP/";
				
			}else{
				//$("#mensaje").html(e.texto);
				Swal.fire('verifique su usuario y contraseña');
				
			}
		},'json');
		return false;
	});
});

// $(function(){
// 	$("#Correo").submit(function(){
// 		var url =$("#Correo").attr('action');//captura la url del action
// 		var datos =$("#Correo").serialize();//captura los datos del formulario
// 		$.post(url, datos, function(e){
// 			if(e.success == 1){
// 				Swal.fire( e.texto);
				
// 			}else{
// 				//$("#mensaje").html(e.texto);
				
				
// 			}
// 		},'json');
// 		return false;
// 	});
// });


$(function(){
	$("#frmCrearUsuario").submit(function(){
		var url =$("#frmCrearUsuario").attr('action');//captura la url del action
		var datos =$("#frmCrearUsuario").serialize();//captura los datos del formulario
		$.post(url, datos, function(e){
			if(e.success == 1){
				Swal.fire({
					position: 'top-end',
					  type: 'success',
					  title: ' Usuario creado  satisfactoriamente',
					  showConfirmButton: false,
					  timer: 1500
				})
				
			}else{
				//$("#mensaje").html(e.texto);
				Swal.fire( e.texto);
				
			}
		},'json');
		return false;
	});


    $('html').bind('Keypress', function(e){
		if(e.KeyCode == 13){
			return false;
		}
	});

	$(".eliminarUsuario").click(function(){
		var url = $(this).data('url');
		var num = $(this).data('id');
		Swal.fire({
		  title: '¿Estas seguro?',
		  text: "una vez eliminado, no podras revertirlo!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, eliminarlo!'
		}).then((result) => {
		  if (result.value) {
		  	
		  	$.post(url, "", function(e){
			if(e.success == 1){

				Swal.fire( e.texto);
				
			}else{
				Swal.fire( e.texto);
				$("#fila" + num).remove();
			}
		},'json');

		    
		  }
		})
		return false;
		
	});

     $("#nombre").keyup(function(){

		var url = $("#frmBusquedaUsuario").attr('action');
		var dato = $("#nombre").val();
		if(dato !=""){
			dato = "valor="+dato;
			$("#listado").html("Cargando");
			$.post(url, dato, function(e){

			$("#listado").html(e.resultado);

		},'json');	
		}else{
			$("#listado").html("");
		}
		
		return false;
	});

     $("#frmCambiarPassword").submit(function() {
     	var url = $(this).attr('action');
     	var datos = $(this).serialize();
     	if($('#conACT').val() == $('#nueCon').val()){
     		Swal.fire("la nueva contraseña es igual a la anterior");
     	}else if($('#nueCon').val() == $('#conNueCon').val()){

     		  $.post(url, datos, function(e){
     		  	if(e.success == 1 ){
     		  		Swal.fire({
					  position: 'top-end',
					  type: 'success',
					  title: ' contraseña actualizada satisfactoriamente',
					  showConfirmButton: false,
					  timer: 1500
				})
     		  	}else if(e.success == 2 ){
     		  		Swal.fire("la contraseña ingresada no coincide con la registrada");
     		  	}
     		  },'json');
     	}else{
     		Swal.fire("las nuevas contraseñas no coinciden");
    	 }
     	return false;
     });

});


$(function(){
	$("#edtUsuario").submit(function(){
		var url =$("#edtUsuario").attr('action');//captura la url del action
		var datos =$("#edtUsuario").serialize();//captura los datos del formulario
		$.post(url, datos, function(e){
			if(e.success == 1){
				Swal.fire({
				  position: 'top-end',
				  type: 'success',
				  title: ' editado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				})
				
			}else{
				//$("#mensaje").html(e.texto);
				Swal.fire( e.texto);
				
			}
		},'json');
		return false;
	});


});

$(function(){
	$("#contactForm").submit(function(){
		var url =$("#contactForm").attr('action');//captura la url del action
		var datos =$("#contactForm").serialize();//captura los datos del formulario
		$.post(url, datos, function(e){
			if(e.success == 1){
				Swal.fire({
				  position: 'top-end',
				  type: 'success',
				  title: ' se a registrado tu sugerencia',
				  showConfirmButton: false,
				  timer: 1500
				})
				
			}else{
				//$("#mensaje").html(e.texto);
				Swal.fire( e.texto);
				
			}
		},'json');
		return false;
	});


});
////////////////////////////////////////////////////////////////////////////////////////////77777

$(function(){
	$("#regProducto").submit(function(){
		 var url =$("#regProducto").attr('action');//captura la url del action
		// var datos =$("#regProducto").serialize();//captura los datos del formulario
		
		 var formData = new FormData();
		 formData.append('nombre', $("#nombre").val());  
		 formData.append('precio', $("#precio").val());  
		 formData.append('escripcion',$("#descripcion").val()); 

		 formData.append( 'foto', $('#foto')[0].files[0]);
		 $.ajax({
                      url: url,
                      data: formData,
                      processData: false,
                      contentType: false,
					  dataType: 'json',
                      type: 'POST',				
		 			  beforeSend: function (o) {					 
						 	
					  },
                      success: function(o){
                      	Swal.fire( o.texto);
                      }
         });
				 
		
		return false;
	});


	$("#nombre_pro").keyup(function(){

			var url = $("#frmBusquedaProducto").attr('action');
			var dato = $("#nombre_pro").val();
			if(dato !=""){
				dato = "valor="+dato;
				$("#listado").html("Cargando");
				$.post(url, dato, function(e){

				$("#listado").html(e.resultado);

			},'json');	
			}else{
				$("#listado").html("");
			}
			
			return false;
		});
		$(".eliminarProducto").click(function(){
		var url = $(this).data('url');
		var num = $(this).data('id');
		Swal.fire({
		  title: '¿Estas seguro?',
		  text: "una vez eliminado, no podras revertirlo!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, eliminarlo!'
		}).then((result) => {
		  if (result.value) {
		  	
		  	$.post(url, "", function(e){
			if(e.success == 1){

				Swal.fire( e.texto);
				
			}else{
				Swal.fire( e.texto);
				$("#fila1" + num).remove();
			}
		},'json');

		    
		  }
		})
		return false;
		
	});

	$("#edtProducto").submit(function(){
		 var url =$("#edtProducto").attr('action');//captura la url del action
		// var datos =$("#regProducto").serialize();//captura los datos del formulario
		
		 var formData = new FormData();
		 formData.append('nombre', $("#nombre").val());  
		 formData.append('precio', $("#precio").val());  
		 formData.append('escripcion',$("#descripcion").val()); 

		 formData.append( 'foto', $('#foto')[0].files[0]);
		 $.ajax({
                      url: url,
                      data: formData,
                      processData: false,
                      contentType: false,
					  dataType: 'json',
                      type: 'POST',				
		 			  beforeSend: function (o) {					 
						 	
					  },
                      success: function(o){
                      	Swal.fire( o.texto);
                      }
         });
				 
		
		return false;
	});

});