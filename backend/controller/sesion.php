<?php

require_once("../class/empleados.class.php");

$obj_emp = new empleados;

$correo = $_POST['cor_emp'];
$clave = $_POST['cla_emp'];

$obj_emp->puntero = $obj_emp->getSession($correo, $clave);

switch ($_REQUEST["run"]) {
	case 'session':
		$empleados = $obj_emp->extractData();

		if ($empleados['cor_emp'] == $correo && $empleados['cla_emp'] == sha1($clave)) {
			session_start();
			$_SESSION['activo'] = true;
			$_SESSION['codigo'] = $empleados['cod_emp'];
			$_SESSION['cargo'] = $empleados['car_emp'];
			$_SESSION["time"] = time();

			header('Location: ../../frontend/view/emp_inicio.php');
		} else {
			header('Location: ../../frontend/view/login.php');
		}
		break;
}