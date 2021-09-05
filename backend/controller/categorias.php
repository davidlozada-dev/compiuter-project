<?php

require_once("../class/categorias.class.php");

$obj_cat = new categorias;

$obj_cat->assignValue();

switch ($_REQUEST["run"]) {
	case 'create':
		$obj_cat->resultado = $obj_cat->create();

		if ($obj_cat->resultado == false) {
			$message = "la categoria que intenta registrar ya existe o puede que algunos datos ya esten registrados en el sistema, por favor ingrese otro";
			$obj_cat->message($message) == false;
			header("refresh:3; url=../../frontend/view/categorias.php");
		} else {
			$message = "Categoria registrado exitosamente";
			$obj_cat->message($message) == true;
			header("refresh:1; url=../../frontend/view/categorias.php");
		}
		break;

	case 'update':
		$obj_cat->resultado = $obj_cat->update();

		if ($obj_cat->resultado == false) {
			$message = "la categoria que intenta actualizar puede que tenga información registrada en otra categoria en el sistema, por favor verifique";
			$obj_cat->message($message) == false;
			header("refresh:3; url=../../frontend/view/categorias.php");
		} else {
			$message = "Categoria actualizado exitosamente";
			$obj_cat->message($message) == true;
			header("refresh:1; url=../../frontend/view/categorias.php");
		}
		break;

	case 'delete':
		$obj_cat->resultado = $obj_cat->delete();

		if ($obj_cat->resultado == false) {
			$message = "Problemas para eliminar la categoria";
			$obj_cat->message($message) == false;
		} else {
			$message = "Categoria eliminado exitosamente";
			$obj_cat->message($message) == true;
		}
		header("refresh:1; url=../../frontend/view/categorias.php");
		break;
}
