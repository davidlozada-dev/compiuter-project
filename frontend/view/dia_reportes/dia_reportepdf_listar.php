<html>

<head>
	<meta charset='UTF-8'>
	<title>Lista de Diagnosticos</title>
	<style>
		.head{background-color:#fff;color:#000;border:none}.footer{font-size:15px;background-color:#fff;color:#000;border:none}table{width:100%;text-align:center;border-collapse:collapse}th{font-size:20px}td{font-size:15px}td,th{border:1px solid #000;padding:7px}.nada{border:none;padding:15px}.espacio{border:none;padding:7px}
	</style>
</head>

<body>
	<table>
		<tr class='head'>
			<th class='head' colspan='2' style='text-align: left;'><img src='../img/logo3.png' width='250px'></th>
			<th class='head' colspan='6' style='text-align: right;'>
				<h3>Lista de Diagnosticos</h3>
			</th>
		</tr>
		<tr class='nada'>
			<th class='nada'></th>
		</tr>
		<tr class='tr'>
			<th class="th" colspan='1'>Código</th>
			<th class="th" colspan='1'>Atendio</th>
			<th class="th" colspan='1'>Falla cliente</th>
			<th class="th" colspan='1'>Falla inicial</th>
			<th class="th" colspan='1'>Categoria</th>
			<th class="th" colspan='1'>Marca</th>
			<th class="th" colspan='1'>Serial</th>
			<th class="th" colspan='1'>Cliente</th>
		</tr>
		<?php

		require_once("../../../backend/class/diagnosticos.class.php");
		require_once("../../../backend/class/empleados.class.php");
		require_once("../../../backend/class/equipos.class.php");
		require_once("../../../backend/class/clientes.class.php");
		require_once("../../../backend/class/categorias.class.php");

		$obj_dia = new diagnosticos;
		$obj_dia->puntero = $obj_dia->getAll();

		$obj_equ = new equipos;
		$obj_emp = new empleados;
		$obj_cli = new clientes;
		$obj_cat = new categorias;

		while (($diagnosticos = $obj_dia->extractData()) > 0) {

			$obj_equ->cod_equ = $diagnosticos['fky_equipos'];
			$obj_equ->puntero = $obj_equ->getByCode();
			$equipo = $obj_equ->extractData();

			$obj_cat->cod_cat = $equipo['fky_categorias'];
			$obj_cat->puntero = $obj_cat->getByCode();
			$categoria = $obj_cat->extractData();

			$obj_cli->cod_cli = $diagnosticos['fky_clientes'];
			$obj_cli->puntero = $obj_cli->getByCode();
			$cliente = $obj_cli->extractData();

			$obj_emp->cod_emp = $diagnosticos['fky_empleados'];
			$obj_emp->puntero = $obj_emp->getByCode();
			$empleado = $obj_emp->extractData();

			echo "
						<tr class='tr'>
							<td class='td' colspan='1'>$diagnosticos[cod_dia]</td>
							<td class='td' colspan='1'>$empleado[nom_emp] $empleado[ape_emp]</td>
							<td class='td' colspan='1'>$diagnosticos[fal_cli_dia]</td>
							<td class='td' colspan='1'>$diagnosticos[fal_ini_dia]</td>
							<td class='td' colspan='1'>$categoria[nom_cat]</td>
							<td class='td' colspan='1'>$equipo[ser_equ]</td>
							<td class='td' colspan='1'>$equipo[mar_equ]</td>
							<td class='td' colspan='1'>$cliente[nom_cli] $cliente[ape_cli]</td>
						</tr>
			";
		}
		?>
	</table>
</body>

</html>





