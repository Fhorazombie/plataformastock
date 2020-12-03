<?php 
	require_once('conexion.php');

	sleep(1);

	if (isset($_POST['busqueda'])) {
		$search = $_POST['busqueda'];
	}

	$consulta = "SELECT * FROM stock WHERE nombre LIKE '%" .$search. "%' OR  modelo LIKE '%" .$search. "%' OR  marca LIKE '%" .$search. "%' ORDER BY id DESC";
	$resultado = $connect->query($consulta);
	$fila = mysqli_fetch_assoc($resultado);
	$total = mysqli_num_rows($resultado);
?>

<?php if ($total>0 && $search!='') { ?>
	<div id="content">
	<h2>Resultados de busqueda</h2>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
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
	<?php do { ?>
		<tr>
			<?php echo "<td class='ido'>" . $fila['id'] . "</td>"; ?>
			<?php echo "<td>" . $fila['marca'] . "</td>"; ?>
			<?php echo "<td>" . $fila['nombre'] . "</td>"; ?>
			<?php echo "<td>" . $fila['modelo'] . "</td>"; ?>
			<?php echo "<td>" . $fila['noparte'] . "</td>"; ?>
			<?php echo "<td>" . $fila['noserie'] . "</td>"; ?>
			<?php echo "<td>" . $fila['piezas'] . "</td>"; ?>
			<?php echo "<td>" . $fila['costo'] . "</td>"; ?>
			<?php echo "<td>" . $fila['fecha'] . "</td>"; ?>
			<?php echo "<td>" . $fila['mayorista'] . "</td>"; ?>
			<?php echo "<td>" . $fila['facturano'] . "</td>"; ?>
		</tr>
	<?php }
	while ($fila=mysqli_fetch_assoc($resultado)); ?>
	</table>
	</div>
<?php } 
elseif ($search == '') {
	echo '<h2>Ingresa un parametro de busqueda</h2><p>Ingresa palabras claves</p>';
} else {
	echo '<h2>No se ha encontrado ningun resultado</h2><p>Ingresa palabras claves como nombre, marca, numero de serie.</p>';
}?>