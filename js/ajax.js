$(function() {
	$('#form_busqueda').submit(function(e){
		e.preventDefault();
	})

	$('#busqueda').keyup(function(){
		$('#resultados').show();
		var envio = $('#busqueda').val();
		$('#resultados').html('<p id="cargar"><img src="img/ajax_loader_metal_512.gif" width="50"><br>Cargando<p>');

		$.ajax({
			type: "POST",
			url: "buscador.php",
			data: ('busqueda=' + envio),
			success: function(resp){
				if (resp!='') {
					$('#resultados').html(resp);

				}
			} 
		})
	})
})


/*****************************Paginaation*/

var bandera = 2;//Productos mostrados por pagina
console.log("Numero de productos mostrados por pagina = " + bandera);

$('#siguiente').click( function() {
		var pag = $('#siguiente').val();
		$('#content_pagi').html('<p id="cargar"><img src="img/ajax_loader_metal_512.gif" width="50"><br>Cargando<p>');
		$.ajax({
			type: "POST",
			url: "pagination.php",
			data: ('pagination=' + pag + bandera),
			success: function(resp){
				if (resp!='') {
					$('#content_pagi').html(resp);
					$('#anteriore').show();
					bandera = bandera + 2;
					console.log("Numero de productos mostrados por pagina = " + bandera);
					var tabla = $('#stock tr').length;
					if (tabla == 4) {
						$('#siguiente').show();
					} else {
						$('#siguiente').hide();
						bandera = bandera - 2;
					}
				}
			} 
		})
	})

$('#anteriore').click( function() {
		$('#siguiente').show();
		bandera = bandera - 2;
		var pag2 = $('#anteriore').val();
		$('#content_pagi').html('<p id="cargar"><img src="img/ajax_loader_metal_512.gif" width="50"><br>Cargando<p>');
		$.ajax({
			type: "POST",
			url: "pagination.php",
			data: ('pagination=' + pag2 + bandera),
			success: function(resp){
				if (resp!='') {
					$('#content_pagi').html(resp);
					console.log( "Numero de productos mostrados por pagina = " + bandera);
					if (bandera == 2) {
						$('#anteriore').hide();
					};
				}
			} 
		})
	})

/*****************************Editor de produtos*/

$('#editar').click( function() { 

	$('#content_nav').hide()


	//Checar estado de Checkbox
	var check = $('#editar:checked').length;

	//Productos Mostrados
	var ids = $('.ido').length;
	console.log( "Numero de productos mostrados = " + ids);

	//Inputs mostrados	
	var obs = $('.obeditar').length;
	console.log( "Numero de productos mostrados = " + obs);

	//Check
	var arrey = []
	var i = 0

	//Uncheck
	var arreydos = []
	var ii = 0

	
	if (check == 1 ) {

		//Guardar Id dentro de un arreglo
		do {

				arrey[i] = $('.ido:eq( '+ i +' )').text();
				console.log("Valor del id " + i + " es " + arrey[i]);
				i++;

		} while ( i < ids )

	} else if (check == 0) {

		//Guardar Value dentro de un arreglo
		do {
				arreydos[ii] = $('.obeditar:eq( '+ ii +' )').val();
				console.log("Valor del input " + ii + " es " + arreydos[ii]);
				ii++;

		} while ( ii < obs )

	}


	//Cambiar elementos del DOM

	i = 0
	ii = 0

		//Cambiar a Checkbox cuando Check
	if (check == 1 ) {

		do {
			
			var idvalor = arrey[i]

			$(".ido:eq( 0 )").replaceWith( "<input type='checkbox' name='editar' class='obeditar' value='" + idvalor + "'>");

		} while ( ++i < ids ) 

		$('.obeditar').click( function(){

			var arrayM = []
			iM = 0

			var marcado = $(this).prop("checked")

			console.log('marcado')

			if ( marcado == true) {

				console.log('Si entro')

				$('.obeditar:checked').attr('id','iddos')
				$('.obeditar:checked').attr('name','iddos')

				$('.obeditar').parent().hide()

				$('#iddos').parent().show()

				$('#editar_boton').show()

				$('#guardarE').click( function() {
					$('#edic').attr('value', 'guardar')
				})

				$('#borrarrE').click( function() {
					$('#edic').attr('value', 'borrarr')
				})

				$('#iddos').siblings().attr('class','iddos')

				var selecM = $('.iddos').length;

				do {

				if (iM == 0) {
					var name = "name='marca2' id='marca2'"
				}
				if (iM == 1) {
					var name = "name='nombre2' id='nombre2'"
				}
				if (iM == 2) {
					var name = "name='modelo2' id='modelo2'"
				}
				if (iM == 3) {
					var name = "name='noparte2' id='noparte2'"
				}
				if (iM == 4) {
					var name = "name='noserie2' id='noserie2'"
				}
				if (iM == 5) {
					var name = "name='piezas2' id='piezas2'"
				}
				if (iM == 6) {
					var name = "name='costo2' id='costo2'"
				}
				if (iM == 7) {
					var name = "name='fecha2' id='fecha2'"
				}
				if (iM == 8) {
					var name = "name='mayorista2' id='mayorista2'"
				}
				if (iM == 9) {
					var name = "name='facturano2' id='marca2'"
				}

				arrayM[iM] = $('.iddos:eq( '+ iM +' )').text();
				console.log("Valor del input " + iM + " es " + arrayM[iM]);
				var Mvalor = arrayM[iM]
				console.log(Mvalor)
				$('.iddos:eq( '+ iM +' )').replaceWith( "<td class='iddos'><input type='text' "+ name +" class='input_edit' value='" + Mvalor + "'></td>");
				iM++;

				} while ( iM < selecM )

			}

		})

		//Cambiar a Checkbox cuando UnCheck
	} else if (check == 0) {

		do {

			var idvalor = arreydos[ii]

			$( ".obeditar:eq( 0 )" ).replaceWith( "<td class='ido'>"+ idvalor +"</td>" );

		} while ( ++ii < obs )

	}
} )

// Convertir campos editables



//$('.obeditar').siblings('li');