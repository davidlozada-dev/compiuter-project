<?php

require_once("../class/pedidos.class.php");

$obj_ped = new pedidos;

$obj_ped->assignValue();

switch ($_REQUEST["run"]) {
	case 'create':
		$obj_ped->resultado = $obj_ped->create();

		if ($obj_ped->resultado == false) {
			$message = "El pedido que intenta registrar ya existe o puede que algunos datos ya esten registrados en el sistema, por favor ingrese otro";
			$obj_ped->message($message) == false;
			header("refresh:3; url=../../frontend/view/ado_registrar.php");
		} else {
			$message = "Pedido registrado exitosamente";
			$obj_ped->message($message) == true;
			header("refresh:1; url=../../frontend/view/ado_registrar.php");
		}
		break;

	case 'update':
		$obj_ped->resultado = $obj_ped->update();

		if ($obj_ped->resultado == false) {
			$message = "El pedido que intenta actualizar puede que tenga información registrada en otro pedido en el sistema, por favor verifique";
			$obj_ped->message($message) == false;
			header("refresh:3; url=../../frontend/view/ado_listartodo.php");
		} else {
			$message = "Pedido actualizado exitosamente";
			$obj_ped->message($message) == true;
			header("refresh:1; url=../../frontend/view/ado_listartodo.php");
		}
		break;

	case 'delete':
		$obj_ped->resultado = $obj_ped->delete();

		if ($obj_ped->resultado == false) {
			$message = "Problemas para eliminar el pedido";
			$obj_ped->message($message) == false;
		} else {
			$message = "Pedido eliminado exitosamente";
			$obj_ped->message($message) == true;
		}
		header("refresh:1; url=../../frontend/view/ado_listartodo.php");
		break;
}
