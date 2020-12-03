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

	$marca = "";
	if (isset($_POST['marca'])) {
		$marca = $_POST['marca'];
		
	}

	$nombre = "";
	if (isset($_POST['nombre'])) {
		$nombre = $_POST['nombre'];
		
	}

	$modelo = "";
	if (isset($_POST['modelo'])) {
		$modelo = $_POST['modelo'];
		
	}

	$noparte = "";
	if (isset($_POST['noparte'])) {
		$noparte = $_POST['noparte'];
		
	}

	$noserie = "";
	if (isset($_POST['noserie'])) {
		$noserie = $_POST['noserie'];
		
	}

	$piezas = "";
	if (isset($_POST['piezas'])) {
		$piezas = $_POST['piezas'];
		
	}

	$costo = "";
	if (isset($_POST['costo'])) {
		$costo = $_POST['costo'];
		
	}

	$fecha = "";
	if (isset($_POST['fecha'])) {
		$fecha = $_POST['fecha'];
		
	}

	$mayorista = "";
	if (isset($_POST['mayorista'])) {
		$mayorista = $_POST['mayorista'];
		
	}

	$facturano = "";
	if (isset($_POST['facturano'])) {
		$facturano = $_POST['facturano'];
		
	}

if ($marca != "" && $nombre != "" && $modelo != "" && $noparte != "") {


	if ($connect->query("INSERT INTO stock VALUES('','".$marca."','".$nombre."','".$modelo."','".$noparte."','".$noserie."','".$piezas."','".$costo."','".$fecha."','".$mayorista."','".$facturano."')")){
		echo "
		<h2>Producto Guardado!</h2>
		<div id='content_boton'><a href='../stock'><button>Regresar</button></a></div>";
		echo "
		<div id='content_pagi'>
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
		"; ?>

<?php	}else {
		echo "<h1>Algo fallo</h1>";
		echo "<a href='../stock'>Regresar</a><br><br>";
		echo "

			<table id='guardar' border='0' cellpadding='0' cellspacing='0' width='100%'>
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
				<form action='guardar.php' method='POST' name='form_agregar' id='form_agregar'>
					<td class='no esta'><input type='text' name='marca' id='marca' value='".$marca."'></td>
					<td class='no esta'><input type='text' name='nombre' id='nombre' value='".$nombre."'></td>
					<td class='no esta'><input type='text' name='modelo' id='modelo' value='".$modelo."'></td>
					<td class='no esta'><input type='text' name='noparte' id='noparte' value='".$noparte."'></td>
					<td class='no esta'><input type='text' name='noserie' id='noserie' value='".$noserie."'></td>
					<td class='no esta'><input type='text' name='piezas' id='piezas' value='".$piezas."'></td>
					<td class='no esta'><input type='text' name='costo' id='costo' value='".$costo."'></td>
					<td class='no esta'><input type='text' name='fecha' id='fecha' value='".$fecha."'></td>
					<td class='no esta'><input type='text' name='mayorista' id='mayorista' value='".$mayorista."'></td>
					<td class='no esta'><input type='text' name='facturano' id='facturano' value='".$facturano."'></td>
				</form>
			</tr>
			</table>
			<div><button type='submit' form='form_agregar' value='Submit'>Guardar</button></div>

		";


	}


} else {
	echo "<h2>Ingresa todos los datos (Verifica los campos obligatorios *)</h1>";
	echo "

			<table id='guardar' border='0' cellpadding='0' cellspacing='0' width='100%'>
				<tr class='datos'>
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
				<form action='guardar.php' method='POST' name='form_agregar' id='form_agregar'>
					<td class='no esta'><input type='text' name='marca' id='marca' value='".$marca."'></td>
					<td class='no esta'><input type='text' name='nombre' id='nombre' value='".$nombre."'></td>
					<td class='no esta'><input type='text' name='modelo' id='modelo' value='".$modelo."'></td>
					<td class='no esta'><input type='text' name='noparte' id='noparte' value='".$noparte."'></td>
					<td class='no esta'><input type='text' name='noserie' id='noserie' value='".$noserie."'></td>
					<td class='no esta'><input type='text' name='piezas' id='piezas' value='".$piezas."'></td>
					<td class='no esta'><input type='text' name='costo' id='costo' value='".$costo."'></td>
					<td class='no esta'><input type='text' name='fecha' id='fecha' value='".$fecha."'></td>
					<td class='no esta'><input type='text' name='mayorista' id='mayorista' value='".$mayorista."'></td>
					<td class='no esta'><input type='text' name='facturano' id='facturano' value='".$facturano."'></td>
				</form>
			</tr>
			</table>
			<div><button type='submit' form='form_agregar' value='Submit'>Guardar</button></div>

		";
}
 ?>

	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/ajax.js"></script>
	</body>
</html>
