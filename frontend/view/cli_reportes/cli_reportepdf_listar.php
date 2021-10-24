<html>

<head>
	<meta charset='UTF-8'>
	<title>Lista de Clientes</title>
	<style>
		.head{background-color:#fff;color:#000;border:none}.footer{font-size:15px;background-color:#fff;color:#000;border:none}table{width:100%;text-align:center;border-collapse:collapse}th{font-size:20px}td{font-size:15px}td,th{border:1px solid #000;padding:7px}.nada{border:none;padding:15px}.espacio{border:none;padding:7px}
	</style>
</head>

<body>
	<table>
		<tr class='head'>
			<th class='head' colspan='6' style='text-align: left;'>
				<h3>Lista de Clientes</h3>
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
			<th class="th" colspan='1'>Teléfono</th>
			<th class="th" colspan='1'>Dirección</th>
		</tr>
		<?php
		require_once("../../../backend/class/clientes.class.php");

		$obj_cli = new clientes;
		$obj_cli->puntero = $obj_cli->getAll();

		while (($clientes = $obj_cli->extractData()) > 0) {
			echo "
						<tr class='tr'>
							<td class='td' colspan='1'>$clientes[cod_cli]</td>
							<td class='td' colspan='1'>$clientes[nom_cli]</td>
							<td class='td' colspan='1'>$clientes[ape_cli]</td>
							<td class='td' colspan='1'>$clientes[ced_cli]</td>
							<td class='td' colspan='1'>$clientes[tel_cli]</td>
							<td class='td' colspan='1'>$clientes[dir_cli]</td>
						</tr>
			";
		}
		?>
	</table>
</body>

</html>





