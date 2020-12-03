<?php 
	require_once('conexion.php');

	sleep(1);

		$post = $_POST['pagination'];
		$pagination = substr($post, 0, 9);
		$pagina = substr($post, 9);
		$offset = "OFFSET";

?>

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
				if ($pagination == 'siguiente' && $pagina >= 2) {
					$consulta = "SELECT * FROM stock LIMIT 2 " ." " . $offset . " " . $pagina ;
				} elseif ($pagina > 2 ) {
					$consulta = "SELECT * FROM stock LIMIT 2" ." " . $offset . " " . $pagina;
				} else {
					$consulta = "SELECT * FROM stock LIMIT 2";
				}

					$resultado = $connect->query($consulta);
					

					while ( $fila = mysqli_fetch_assoc($resultado)) {
						echo "<tr'>";
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