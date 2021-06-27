<?php

require_once("../class/facturas.class.php");

$obj_fac = new facturas;

$obj_fac->assignValue();

switch ($_REQUEST["run"]) {
	case 'create':
		$obj_fac->resultado = $obj_fac->create();

		if ($obj_fac->resultado == false) {
			$message = "la factura que intenta registrar ya existe o puede que algunos datos ya esten registrados en el sistema, por favor ingrese otro";
			$obj_fac->message($message) == false;
			header("refresh:3; url=../../frontend/view/ado_registrar.php");
		} else {
			$message = "factura registrado exitosamente";
			$obj_fac->message($message) == true;
			header("refresh:1; url=../../frontend/view/ado_registrar.php");
		}
		break;

	case 'delete':
		$obj_fac->resultado = $obj_fac->delete();

		if ($obj_fac->resultado == false) {
			$message = "Problemas para eliminar la factura";
			$obj_fac->message($message) == false;
		} else {
			$message = "factura eliminado exitosamente";
			$obj_fac->message($message) == true;
		}
		header("refresh:1; url=../../frontend/view/ado_listartodo.php");
		break;
}
