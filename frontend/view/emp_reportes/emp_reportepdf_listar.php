<html>

<head>
	<meta charset='UTF-8'>
	<title>Lista de Empleados</title>
	<style>
		.head {
			background-color: #fff;
			color: #000;
			border: none
		}

		.footer {
			font-size: 15px;
			background-color: #fff;
			color: #000;
			border: none
		}

		table {
			width: 100%;
			text-align: center;
			border-collapse: collapse
		}

		th {
			font-size: 20px
		}

		td {
			font-size: 15px
		}

		td,
		th {
			border: 1px solid #000;
			padding: 7px
		}

		.nada {
			border: none;
			padding: 15px
		}

		.espacio {
			border: none;
			padding: 7px
		}
	</style>
</head>

<body>
	<table>
		<tr class='head'>
			<th class='head' colspan='6' style='text-align: left;'>
				<h3>Lista de Empleados</h3>
			</th>
		</tr>
		<tr class='nada'>
			<th class='nada'></th>
		</tr>
		<tr class='tr'>
			<th class="th" colspan='1'>Código</th>
			<th class="th" colspan='1'>Nombre</th>
			<th class="th" colspan='1'>Apellido</th>
			<th class="th" colspan='1'>Cédula</th>
			<th class="th" colspan='1'>Correo</th>
			<th class="th" colspan='1'>Dirección</th>
			<th class="th" colspan='1'>Teléfono</th>
			<th class="th" colspan='1'>Cargo</th>
		</tr>
		<?php
		require_once("../../../backend/class/empleados.class.php");

		$obj_emp = new empleados;
		$obj_emp->puntero = $obj_emp->getAll();

		while (($empleados = $obj_emp->extractData()) > 0) {
			echo "
						<tr class='tr'>
							<td class='td' colspan='1'>$empleados[cod_emp]</td>
							<td class='td' colspan='1'>$empleados[nom_emp]</td>
							<td class='td' colspan='1'>$empleados[ape_emp]</td>
							<td class='td' colspan='1'>$empleados[ced_emp]</td>
							<td class='td' colspan='1'>$empleados[cor_emp]</td>
							<td class='td' colspan='1'>$empleados[dir_emp]</td>
							<td class='td' colspan='1'>$empleados[tel_emp]</td>
							<td class='td' colspan='1'>$empleados[car_emp]</td>
						</tr>
			";
		}
		?>
	</table>
</body>

</html>