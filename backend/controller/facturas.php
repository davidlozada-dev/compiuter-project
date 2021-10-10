<?php

require_once("../class/facturas.class.php");
require_once("../class/diagnosticos.class.php");

$obj_fac = new facturas;
$obj_dia = new diagnosticos;

$obj_fac->assignValue();

$obj_dia->cod_dia = $_REQUEST['fky_diagnosticos'];
$obj_dia->sol_dia = $_REQUEST['sol_dia'];

switch ($_REQUEST["run"]) {
	case 'create':
		$obj_fac->resultado = $obj_fac->create();
		$obj_dia->resultado = $obj_dia->update();

		if ($obj_fac->resultado == false) {
			$message = "la factura que intenta registrar ya existe o puede que algunos datos ya esten registrados en el sistema, por favor ingrese otro";
			$obj_fac->message($message) == false;
			header("refresh:3; url=../../frontend/view/fac_registrar.php");
		} else {
			$message = "factura registrado exitosamente";
			$obj_fac->message($message) == true;
			header("refresh:1; url=../../frontend/view/fac_registrar.php");
		}
		break;

	case 'delete':
		$obj_fac->resultado = $obj_fac->delete();
		$obj_dia->resultado = $obj_dia->delete();

		if ($obj_fac->resultado == false) {
			$message = "Problemas para eliminar la factura";
			$obj_fac->message($message) == false;
		} else {
			$message = "factura eliminado exitosamente";
			$obj_fac->message($message) == true;
		}
		header("refresh:1; url=../../frontend/view/fac_listartodo.php");
		break;
}
