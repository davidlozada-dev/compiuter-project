<?php

function check($menu)
{
	if ($_SESSION['cargo'] == 'Administrador') {
	} else if ($_SESSION['cargo'] == 'Cajero' && ($menu == 'Clientes' || $menu == 'Diagnosticos' || $menu == 'Facturas')) {
	} else if ($_SESSION['cargo'] == 'Tecnico' && ($menu == 'Categorias' || $menu == 'Clientes' || $menu == 'Equipos' || $menu == 'Diagnosticos')) {
	} else {
		header("Location: emp_inicio.php");
	}
}

function head($titulo)
{
	ini_set("session.cookie_lifetime", "36000");

	session_start();

	if ($_SESSION['activo'] == true) {
		if (time() - $_SESSION["time"] < 28800) {
		} else {
			session_destroy();
		}
	} else {
		header('Location: login.php');
	}

	echo "
		<!DOCTYPE html>
		<html lang='es'>
			<head>
				<meta charset='UTF-8' />
				<meta name='viewport' content='width=device-width, initial-scale=1.0' />
				<title>$titulo</title>
				<link rel='shortcut icon' href='' type='image/x-icon' />
				<link rel='stylesheet' href='../css/bootstrap/css/bootstrap.min.css' />
				<link rel='stylesheet' href='../css/fontawesome-free-5.15.0/css/all.min.css' />
				<link rel='stylesheet' href='../css/estilos.css' />
			</head>

			<body class='m-0 p-0'>

				<!-- Nav -->
				<header>
					<nav class='navbar navbar-expand-lg navbar-light shadow-lg mb-5'>
						<!-- Nombre de la App -->
						<a href='emp_inicio.php' class='navbar-brand px-5'>
							<img src='../img/logo-sin-fondo.png' width='250'>
						</a>

						<!-- Menu de hamburguesa -->
						<button
							class='navbar-toggler'
							type='button'
							data-toggle='collapse'
							data-target='#navbarNavAltMarkup'
							aria-controls='navbarNavAltMarkup'
							aria-expanded='false'
							aria-label='Toggle navigation'
						>
							<span class='navbar-toggler-icon'></span>
						</button>

						<!-- Menu -->
						<div class='collapse navbar-collapse justify-content-end text-center' id='navbarNavAltMarkup'>
							<div class='navbar-nav'>
								<a class='nav-link active' href='emp_inicio.php'>Inicio</a>
								";

	if ($_SESSION['cargo'] == 'Administrador') {
		echo "
								<a href='emp_menu.php' class='nav-link active'>Empleados</a>
								<a href='categorias.php' class='nav-link active'>Categorias</a>
								<a href='cli_menu.php' class='nav-link active'>Clientes</a>
								<a href='equipos.php' class='nav-link active'>Equipos</a>
								<a href='dia_menu.php' class='nav-link active'>Diagnosticos</a>
								<a href='fac_menu.php' class='nav-link active'>Facturas</a>
				";
	} else if ($_SESSION['cargo'] == 'Cajero') {
		echo "
								<a href='cli_menu.php' class='nav-link active'>Clientes</a>
								<a href='dia_listartodo.php' class='nav-link active'>Diagnosticos</a>
								<a href='fac_menu.php' class='nav-link active'>Facturas</a>
				";
	} else if ($_SESSION['cargo'] == 'Tecnico') {
		echo "
								<a href='categorias.php' class='nav-link active'>Categorias</a>
								<a href='cli_menu.php' class='nav-link active'>Clientes</a>
								<a href='equipos.php' class='nav-link active'>Equipos</a>
								<a href='dia_menu.php' class='nav-link active'>Diagnosticos</a>
				";
	}

	echo "
								<a href='cerrar_sesion.php' class='nav-link btn btn-sesion'><i class='fas fa-power-off'></i></a>
							</div>
						</div>
					</nav>
				</header>";
}

function footer()
{
	echo "
				<script src='../js/validaciones.js'></script>
				<script src='../js/jquery-3.5.1.min.js'></script>
				<script src='../css/bootstrap/js/bootstrap.bundle.min.js'></script>

			</body>
				
		</html>
		";
}
