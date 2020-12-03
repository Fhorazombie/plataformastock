<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Stock EmpresaFamosa</title>
	<link rel="stylesheet" type="text/css" href="css/stock.css">
	</head>
	<body>

	<a href="../stock"><h1>Stock EmpresaFamosa</h1></a>

<?php 
	require_once('conexion.php');

	$edic = "";
	if (isset($_POST['edic'])) {
		$edic = $_POST['edic'];
		
	}

	$id = "";
	if (isset($_POST['iddos'])) {
		$id = $_POST['iddos'];
		
	}

	$marca = "";
	if (isset($_POST['marca2'])) {
		$marca = $_POST['marca2'];
	}

	$nombre = "";
	if (isset($_POST['nombre2'])) {
		$nombre = $_POST['nombre2'];
		
	}

	$modelo = "";
	if (isset($_POST['modelo2'])) {
		$modelo = $_POST['modelo2'];
		
	}

	$noparte = "";
	if (isset($_POST['noparte2'])) {
		$noparte = $_POST['noparte2'];
		
	}

	$noserie = "";
	if (isset($_POST['noserie2'])) {
		$noserie = $_POST['noserie2'];
		
	}

	$piezas = "";
	if (isset($_POST['piezas2'])) {
		$piezas = $_POST['piezas2'];
		
	}

	$costo = "";
	if (isset($_POST['costo2'])) {
		$costo = $_POST['costo2'];
		
	}

	$fecha = "";
	if (isset($_POST['fecha2'])) {
		$fecha = $_POST['fecha2'];
		
	}

	$mayorista = "";
	if (isset($_POST['mayorista2'])) {
		$mayorista = $_POST['mayorista2'];
		
	}

	$facturano = "";
	if (isset($_POST['facturano2'])) {
		$facturano = $_POST['facturano2'];
		
	}

if ($edic == "guardar" ) {

	if ($nombre != "") {


		if ($connect->query("UPDATE stock SET marca='".$marca."', nombre='".$nombre."', modelo='".$modelo."', noparte='".$noparte."', noserie='".$noserie."', piezas='".$piezas."', costo='".$costo."', fecha='".$fecha."', mayorista='".$mayorista."', facturano='".$facturano."' WHERE id='". $id . "'" )){
			
			echo "
			<div id='content_pagi'>
				<h2>Producto Editado!</h2>
				<div id='content_boton'><a href='../stock'><button>Regresar</button></a></div>
				<table border='0' cellpadding='0' cellspacing='0' width='100%'>
					<tbody id='stock'>
						<tr class='datos'>
							<td>MARCA</td>
							<td>NOMBRE</td>
							<td>MODELO</td>
							<td>No PARTE</td>
							<td>No SERIE</td>
							<td>PIEZAS</td>
							<td>COSTO</td>
							<td>FECHA</td>
							<td>MAYORISTA</td>
							<td>FACTURA No</td>
						</tr>
						<tr>
							<td>".$marca."</td>
							<td>".$nombre."</td>
							<td>".$modelo."</td>
							<td>".$noparte."</td>
							<td>".$noserie."</td>
							<td>".$piezas."</td>
							<td>".$costo."</td>
							<td>".$fecha."</td>
							<td>".$mayorista."</td>
							<td>".$facturano."</td>
						</tr>
					</tbody>
				</table>
			</div>
			";
		} else {

			echo "
			<div id='content_pagi'>
				<h1>Algo fallo</h1>
				<a href='../stock'>Regresar</a><br><br>
				<table id='guardar' border='0' cellpadding='0' cellspacing='0' width='100%'>
					<tr class='datos'>
						<td>ID</td>
						<td>MARCA</td>
						<td>NOMBRE</td>
						<td>MODELO</td>
						<td>No PARTE</td>
						<td>No SERIE</td>
						<td>PIEZAS</td>
						<td>COSTO</td>
						<td>FECHA</td>
						<td>MAYORISTA</td>
						<td>FACTURA No</td>
					</tr>
				<tr>
					<form action='editar.php' method='POST' name='form_agregar' id='form_agregar'>
						<input type='text' name='edic' id='edic' value='guardar'>
						<td class='no esta'><input type='text' name='iddos' id='iddos' value='".$id."'></td>
						<td class='no esta'><input type='text' name='marca2' id='marca2' value='".$marca."'></td>
						<td class='no esta'><input type='text' name='nombre2' id='nombre2' value='".$nombre."'></td>
						<td class='no esta'><input type='text' name='modelo2' id='modelo2' value='".$modelo."'></td>
						<td class='no esta'><input type='text' name='noparte2' id='noparte2' value='".$noparte."'></td>
						<td class='no esta'><input type='text' name='noserie2' id='noserie2' value='".$noserie."'></td>
						<td class='no esta'><input type='text' name='piezas2' id='piezas2' value='".$piezas."'></td>
						<td class='no esta'><input type='text' name='costo2' id='costo2' value='".$costo."'></td>
						<td class='no esta'><input type='text' name='fecha2' id='fecha2' value='".$fecha."'></td>
						<td class='no esta'><input type='text' name='mayorista2' id='mayorista2' value='".$mayorista."'></td>
						<td class='no esta'><input type='text' name='facturano2' id='facturano2' value='".$facturano."'></td>
					</form>
				</tr>
				</table>
				<div id='content_boton'><button type='submit' form='form_agregar' value='Submit'>Guardar</button></div>
			</div>

			";

		}


	} else {
		echo "
		<div id='content_pagi'>
			<h2>Ingresa todos los datos (Verifica los campos obligatorios *)</h1>
					<table id='guardar' border='0' cellpadding='0' cellspacing='0' width='100%'>
						<tr class='datos'>
							<td>ID*</td>
							<td>MARCA*</td>
							<td>NOMBRE*</td>
							<td>MODELO*</td>
							<td>No PARTE*</td>
							<td>No SERIE</td>
							<td>PIEZAS</td>
							<td>COSTO</td>
							<td>FECHA</td>
							<td>MAYORISTA</td>
							<td>FACTURA No</td>
						</tr>
					<tr>
						<form action='editar.php' method='POST' name='form_agregar' id='form_agregar'>
						<input type='text' name='edic' id='edic' value='guardar'>
							<td class='no esta'><input type='text' name='iddos' id='iddos' value='".$id."'></td>
							<td class='no esta'><input type='text' name='marca2' id='marca2' value='".$marca."'></td>
							<td class='no esta'><input type='text' name='nombre2' id='nombre2' value='".$nombre."'></td>
							<td class='no esta'><input type='text' name='modelo2' id='modelo2' value='".$modelo."'></td>
							<td class='no esta'><input type='text' name='noparte2' id='noparte2' value='".$noparte."'></td>
							<td class='no esta'><input type='text' name='noserie2' id='noserie2' value='".$noserie."'></td>
							<td class='no esta'><input type='text' name='piezas2' id='piezas2' value='".$piezas."'></td>
							<td class='no esta'><input type='text' name='costo2' id='costo2' value='".$costo."'></td>
							<td class='no esta'><input type='text' name='fecha2' id='fecha2' value='".$fecha."'></td>
							<td class='no esta'><input type='text' name='mayorista2' id='mayorista2' value='".$mayorista."'></td>
							<td class='no esta'><input type='text' name='facturano2' id='facturano2' value='".$facturano."'></td>
						</form>
					</tr>
					</table>
					<div id='content_boton'><button type='submit' form='form_agregar' value='Submit'>Guardar</button></div>
				</div>

			";
	} 

} else {

			echo "Entro a borrarr";
			
			if ($connect->query("DELETE FROM stock WHERE id='" .$id. "'" )) {
			echo "
			<div id='content_pagi'>
			<h2>Producto borrado!</h2>
			<div id='content_boton'><a href='../stock'><button>Regresar</button></a></div>
			</div>

			";

			} else {
			echo "<div id='content_pagi'> <h1>Algo fallo</h1>";
			echo "<a href='../stock'>Regresar</a><br><br> </div>";
			}
}
	?>


	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/ajax.js"></script>
	</body>
</html>