<html>

<head>
	<meta charset='UTF-8'>
	<title>Lista de Categorias</title>
	<link rel='stylesheet' href='../../css/estilospdf.css'>
</head>

<body>
	<table>
		<tr class='head'>
			<th class='head' colspan="1" style='text-align: left;'><!-- <img src='../../img/logo3.png' width='250px'> --></th>
			<th class='head' colspan="1" style='text-align: right;'>
				<h3>Lista de Categorias</h3>
			</th>
			<th class='head'></th>
		</tr>
		<tr class='nada'>
			<th class='nada'></th>
		</tr>
		<tr class='tr'>
			<th class="th">Código</th>
			<th class="th">Nombre</th>
		</tr>
		<?php
		require_once("../../../backend/class/categorias.class.php");

		$obj_cat = new categorias;
		$obj_cat->puntero = $obj_cat->getAll();

		while (($categorias = $obj_cat->extractData()) > 0) {
			echo "
						<tr class='tr'>
							<td class='td'>$categorias[cod_cat]</td>
							<td class='td'>$categorias[nom_cat]</td
						</tr>
			";
		}
		?>
	</table>
</body>

</html>