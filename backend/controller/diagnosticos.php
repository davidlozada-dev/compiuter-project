<?php

require_once("../class/diagnosticos.class.php");

$obj_dia = new diagnosticos;

$obj_dia->assignValue();

switch ($_REQUEST["run"]) {
	case 'create':
		$obj_dia->resultado = $obj_dia->create();

		if ($obj_dia->resultado == false) {
			$message = "El diagnotico que intenta registrar ya existe o puede que algunos datos ya esten registrados en el sistema, por favor ingrese otro";
			$obj_dia->message($message) == false;
			header("refresh:3; url=../../frontend/view/dia_registrar.php");
		} else {
			$message = "Diagnostico registrado exitosamente";
			$obj_dia->message($message) == true;
			header("refresh:1; url=../../frontend/view/dia_registrar.php");
		}
		break;

	case 'delete':
		$obj_dia->resultado = $obj_dia->delete();

		if ($obj_dia->resultado == false) {
			$message = "Problemas para eliminar el diagnotico";
			$obj_dia->message($message) == false;
		} else {
			$message = "Diagnostico eliminado exitosamente";
			$obj_dia->message($message) == true;
		}
		header("refresh:1; url=../../frontend/view/dia_listartodo.php");
		break;
}
