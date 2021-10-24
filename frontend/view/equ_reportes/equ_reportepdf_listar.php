<html>

<head>
	<meta charset='UTF-8'>
	<title>Lista de Equipos</title>
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
				<h3>Lista de Equipos</h3>
			</th>
		</tr>
		<tr class='nada'>
			<th class='nada'></th>
		</tr>
		<tr class='tr'>
			<th class="th" colspan='1'>Código</th>
			<th class="th" colspan='1'>Serial</th>
			<th class="th" colspan='1'>Marca</th>
			<th class="th" colspan='1'>Descripcion</th>
			<th class="th" colspan='1'>Categoria</th>
			<th class="th" colspan='1'>Cliente</th>
		</tr>
		<?php
		require_once("../../../backend/class/clientes.class.php");
		require_once("../../../backend/class/equipos.class.php");
		require_once("../../../backend/class/categorias.class.php");


		$obj_equ = new equipos;
		$obj_equ->puntero = $obj_equ->getAll();

		$obj_cli = new clientes;

		$obj_cat = new categorias;

		while (($equipos = $obj_equ->extractData()) > 0) {

			$obj_cat->cod_cat = $equipos['fky_categorias'];
			$obj_cat->puntero = $obj_cat->getByCode();
			$categoria = $obj_cat->extractData();

			$obj_cli->cod_cli = $equipos['fky_clientes'];
			$obj_cli->puntero = $obj_cli->getByCode();
			$cliente = $obj_cli->extractData();

			echo "
						<tr class='tr'>
							<td class='td' colspan='1'>$equipos[cod_equ]</td>
							<td class='td' colspan='1'>$equipos[ser_equ]</td>
							<td class='td' colspan='1'>$equipos[mar_equ]</td>
							<td class='td' colspan='1'>$equipos[des_equ]</td>
							<td class='td' colspan='1'>$categoria[nom_cat]</td>
							<td class='td' colspan='1'>$cliente[nom_cli] $cliente[ape_cli]</td>
						</tr>
			";
		}
		?>
	</table>
</body>

</html>