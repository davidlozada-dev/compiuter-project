<?php

require_once("../class/empleados.class.php");

$obj_emp = new empleados;

$obj_emp->assignValue();

switch ($_REQUEST["run"]) {
	case 'create':
		$obj_emp->resultado = $obj_emp->create();

		if ($obj_emp->resultado == false) {
			$message = "El empleado que intenta registrar ya existe o puede que algunos datos ya esten registrados en el sistema, por favor ingrese otro";
			$obj_emp->message($message) == false;
			header("refresh:3; url=../../frontend/view/emp_registrar.php");
		} else {
			$message = "Empleado registrado exitosamente";
			$obj_emp->message($message) == true;
			header("refresh:1; url=../../frontend/view/emp_registrar.php");
		}
		break;

	case 'update':
		$obj_emp->resultado = $obj_emp->update();

		if ($obj_emp->resultado == false) {
			$message = "El empleado que intenta actualizar puede que tenga información registrada en otro empleado en el sistema, por favor verifique";
			$obj_emp->message($message) == false;
			header("refresh:3; url=../../frontend/view/emp_listartodo.php");
		} else {
			$message = "Usuario actualizado exitosamente";
			$obj_emp->message($message) == true;
			header("refresh:1; url=../../frontend/view/emp_listartodo.php");
		}
		break;

	case 'changePassword':
		$obj_emp->resultado = $obj_emp->changePassword();

		if ($obj_emp->resultado == false) {
			$message = "Hubo un error al actualizar la contraseña";
			$obj_emp->message($message) == false;
		} else {
			$message = "Contraseña actualizada exitosamente";
			$obj_emp->message($message) == true;
		}
		header("refresh:1; url=../../frontend/view/emp_inicio.php");
		break;

	case 'delete':
		$obj_emp->resultado = $obj_emp->delete();

		if ($obj_emp->resultado == false) {
			$message = "Problemas para eliminar el empleado";
			$obj_emp->message($message) == false;
		} else {
			$message = "Usuario eliminado exitosamente";
			$obj_emp->message($message) == true;
		}
		header("refresh:1; url=../../frontend/view/emp_listartodo.php");
		break;
}
