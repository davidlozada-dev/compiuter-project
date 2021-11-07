<?php

require_once("../class/clientes.class.php");

$obj_cli = new clientes;

$obj_cli->assignValue();

switch ($_REQUEST["run"]) {
	case 'create':
		$obj_cli->resultado = $obj_cli->create();

		if ($obj_cli->resultado == false) {
			$message = "El cliente que intenta registrar ya existe o puede que algunos datos ya esten registrados en el sistema, por favor ingrese otro";
			$obj_cli->message($message) == false;
			header("refresh:3; url=../../frontend/view/cli_registrar.php");
		} else {
			$message = "Cliente registrado exitosamente";
			$obj_cli->message($message) == true;
			header("refresh:1; url=../../frontend/view/cli_registrar.php");
		}
		break;

	case 'update':
		$obj_cli->resultado = $obj_cli->update();

		if ($obj_cli->resultado == false) {
			$message = "El cliente que intenta actualizar puede que tenga información registrada en otro cliente en el sistema, por favor verifique";
			$obj_cli->message($message) == false;
			header("refresh:3; url=../../frontend/view/cli_listartodo.php");
		} else {
			$message = "Cliente actualizado exitosamente";
			$obj_cli->message($message) == true;
			header("refresh:1; url=../../frontend/view/cli_listartodo.php");
		}
		break;

	case 'delete':
		$obj_cli->resultado = $obj_cli->delete();

		if ($obj_cli->resultado == false) {
			$message = "Problemas para eliminar el cliente";
			$obj_cli->message($message) == false;
		} else {
			$message = "Cliente eliminado exitosamente";
			$obj_cli->message($message) == true;
		}
		header("refresh:1; url=../../frontend/view/cli_listartodo.php");
		break;
}
