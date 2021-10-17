<?php

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../../library/dompdf/autoload.inc.php';
require_once("../../backend/class/facturas.class.php");
require_once("../../backend/class/diagnosticos.class.php");
require_once("../../backend/class/equipos.class.php");
require_once("../../backend/class/clientes.class.php");
require_once("../../backend/class/categorias.class.php");
require_once("../../backend/class/empleados.class.php");

$obj_fac = new facturas;

$cod_fac = $_REQUEST['cod_fac'];

$obj_fac->cod_fac = $cod_fac;
$obj_fac->puntero = $obj_fac->getByCode();
$factura = $obj_fac->extractData();

$obj_dia = new diagnosticos;
$obj_equ = new equipos;
$obj_cli = new clientes;
$obj_cat = new categorias;
$obj_emp = new empleados;

$obj_dia->cod_dia = $factura['fky_diagnosticos'];
$obj_dia->puntero = $obj_dia->getByCode();
$diagnosticos = $obj_dia->extractData();

$obj_equ->cod_equ = $diagnosticos['fky_equipos'];
$obj_equ->puntero = $obj_equ->getByCode();
$equipo = $obj_equ->extractData();

$obj_cat->cod_cat = $equipo['fky_categorias'];
$obj_cat->puntero = $obj_cat->getByCode();
$categoria = $obj_cat->extractData();

$obj_cli->cod_cli = $diagnosticos['fky_clientes'];
$obj_cli->puntero = $obj_cli->getByCode();
$cliente = $obj_cli->extractData();

$obj_emp->cod_emp = $factura['fky_empleados'];
$obj_emp->puntero = $obj_emp->getByCode();
$empleadoCajero = $obj_emp->extractData();

$obj_emp->cod_emp = $diagnosticos['fky_empleados'];
$obj_emp->puntero = $obj_emp->getByCode();
$empleadoTecnico = $obj_emp->extractData();

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml("

		<html>

			<head>

				<meta charset='UTF-8'>
				<title>Factura N° $cod_fac</title>
				<style>
			.head{background-color:#fff;color:#000;border:none}.footer{font-size:15px;background-color:#fff;color:#000;border:none}table{width:100%;text-align:center;border-collapse:collapse}th{font-size:20px}td{font-size:15px}td,th{border:1px solid #000;padding:7px}.nada{border:none;padding:15px}.espacio{border:none;padding:7px}
		</style>

			</head>

			<body>
				<table>
					<tr class='head'>
						<th class='head' colspan='1' style='text-align: left;'><img src='../img/logo3.png' width='250px'></th>
						<th class='head' colspan='2' style='text-align: center;'><h3>Factura <br> N° $cod_fac</h3></th>
						<th class='head' colspan='2'></th>
					</tr>
					<tr class='nada'>
						<th class='nada' colspan='5'></th>
					</tr>
					</tr>
					<tr class='tr'>
						<th class='th' colspan='1'>Atendió (Cajero)</th>
						<th class='th' colspan='1'>Atendió (Técnico)</th>
						<th class='th' colspan='1'>Categoria</th>
						<th class='th' colspan='1'>Marca</th>
						<th class='th' colspan='1'>Serial</th>
					</tr>
					<tr class='tr'>
						<td class='td' colspan='1'>$empleadoCajero[nom_emp] $empleadoCajero[ape_emp]</td>
						<td class='td' colspan='1'>$empleadoTecnico[nom_emp] $empleadoTecnico[ape_emp]</td>
						<td class='td' colspan='1'>$categoria[nom_cat]</td>
						<td class='td' colspan='1'>$equipo[mar_equ]</td>
						<td class='td' colspan='1'>$equipo[ser_equ]</td>
					</tr>
					<tr class='espacio'>
						<th class='espacio' colspan='5'></th>
					</tr>
					<tr class='tr'>
						<th class='th' colspan='1'>Falla inicial</th>
						<th class='th' colspan='1'>Solución</th>
						<th class='th' colspan='1'>Fecha</th>
						<th class='th' colspan='1'>Precio</th>
						<th class='th' colspan='1'>Divisa</th>
					</tr>
					<tr class='tr'>
						<td class='td' colspan='1'>$diagnosticos[fal_ini_dia]</td>
						<td class='td' colspan='1'>$diagnosticos[sol_dia]</td>
						<td class='td' colspan='1'>$factura[fec_fac]</td>
						<td class='td' colspan='1'>$factura[mon_fac]</td>
						<td class='td' colspan='1'>$factura[div_fac]</td>
					</tr>
					<tr class='espacio'>
						<th class='espacio' colspan='5'></th>
					</tr>
					<tr class='tr'>
						<th class='th' colspan='3'>Descripción</th>
						<th class='th' colspan='2'>Cliente</th>
					</tr>
					<tr class='tr'>
						<td class='td' colspan='3'>$factura[des_fac]</td>
						<td class='td' colspan='2'>$cliente[nom_cli] $cliente[ape_cli]</</td>
					</tr>
				</table>
			</body>

		</html>

	");

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

$nombre = "Factura_$cod_fac.pdf";

// Output the generated PDF to Browser
$dompdf->stream($nombre);
