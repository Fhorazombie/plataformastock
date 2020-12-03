<?php require_once("conexion.php") ?> 
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Stock EmpresaFamosa</title>
	<link rel="stylesheet" type="text/css" href="css/stock.css">
	</head>
	<body>

	<a href="../stock"><h1>Stock EmpresaFamosa</h1></a>
	<div id="editdiv">
			<input type="checkbox" name="option1" id="editar"> Editar producto?
	</div>
	<form action="" method"post" name="form_busqueda" id="form_busqueda">
		Buscador: <input type="text" name="busqueda" id="busqueda">
	</form>
	<form action="editar.php" method="POST" name="form_editar" id="form_editar">
		<input type="text" name="edic" id="edic">
		<div id="resultados"></div>
		<div id="content_pagi">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody id="stock">

					<tr id="catego">
						<td colspan="7" id="productos">Datos del producto</td>
						<td colspan="3" id="compra">Datos de compra/ingreso</td>
						<td colspan="1" id="vendido">Vendido</td>
					</tr>
					<tr class="datos">
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
					<?php 
						$consulta = "SELECT * FROM stock LIMIT 2";
						$resultado = $connect->query($consulta);

						while ( $fila = mysqli_fetch_assoc($resultado)) {
							echo "<tr>";
							echo "<td class='ido'>" . $fila['id'] . "</td>";
							echo "<td>" . $fila['marca'] . "</td>";
							echo "<td>" . $fila['nombre'] . "</td>";
							echo "<td>" . $fila['modelo'] . "</td>";
							echo "<td>" . $fila['noparte'] . "</td>";
							echo "<td>" . $fila['noserie'] . "</td>";
							echo "<td>" . $fila['piezas'] . "</td>";
							echo "<td>" . $fila['costo'] . "</td>";
							echo "<td>" . $fila['fecha'] . "</td>";
							echo "<td>" . $fila['mayorista'] . "</td>";
							echo "<td>" . $fila['facturano'] . "</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
			</div>
			<div id="content_nav">
				<button id="anteriore" value="anteriore">Anteriores</button>
				<button id="siguiente" value="siguiente">Siguientes</button>
			</div>
			<div id="editar_boton">
				<button id="guardarE" type="submit" form="form_editar" value="Submit">Guardar</button>
				<button id="borrarrE" type="submit" form="form_editar" value="Submit">Eliminar</button>
			</div>
		</form>
		<div id="content">
			<h2>Agregar Nuevo Producto</h2><p>Ingresa los datos del producto<p>
			<table id="guardar" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
					<tr class="datos">
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
						<form action="guardar.php" method="POST" name="form_agregar" id="form_agregar">
							<td><input type="text" name="marca" id="marca"></td>
							<td><input type="text" name="nombre" id="nombre"></td>
							<td><input type="text" name="modelo" id="modelo"></td>
							<td><input type="text" name="noparte" id="noparte"></td>
							<td><input type="text" name="noserie" id="noserie"></td>
							<td><input type="text" name="piezas" id="piezas"></td>
							<td><input type="text" name="costo" id="costo"></td>
							<td><input type="text" name="fecha" id="fecha"></td>
							<td><input type="text" name="mayorista" id="mayorista"></td>
							<td><input type="text" name="facturano" id="facturano"></td>
						</form>
					</tr>
				</tbody>
			</table>
		</div>
		<div id="content_boton"><button type="submit" form="form_agregar" value="Submit">Guardar</button></div>
	</div>

	<div id="nuevo"></div>
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/ajax.js"></script>
	</body>
</html>