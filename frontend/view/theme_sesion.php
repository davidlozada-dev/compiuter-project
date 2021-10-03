<?php

function checkAdmin()
{
	// if ($_SESSION['cargo'] == 'Administrador') {
	// } else {
	// 	header("Location: ado_inicio.php");
	// }
}

function head($titulo)
{
	// ini_set("session.cookie_lifetime", "36000");

	// session_start();

	// if ($_SESSION['activo'] == true) {
	// 	if (time() - $_SESSION["time"] < 28800) {
	// 	} else {
	// 		session_destroy();
	// 	}
	// } else {
	// 	header('Location: login.php');
	// }

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

				<!-- screenUp -->
				<span class='screenUp' id='screenUp'><i class='fas fa-arrow-circle-up'></i></span>

				<!-- Nav -->
				<header>
					<nav class='navbar navbar-expand-lg navbar-dark bg-primary'>
						<!-- Nombre de la App -->
						<a href='ado_inicio.php' class='navbar-brand px-5'>
							Logo <!-- <img src='../img/logo2.png' width='150'><img src='../img/logo2.png' width='150'> -->
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
								<a class='nav-link active' href='ado_inicio.php'>Inicio</a>
								";

	// if ($_SESSION['cargo'] == 'Administrador') {
		echo "
								<a href='emp_menu.php' class='nav-link active'>Empleados</a>
								<a href='categorias.php' class='nav-link active'>Categorias</a>
								<a href='cli_menu.php' class='nav-link active'>Clientes</a>
								<a href='equipos.php' class='nav-link active'>Equipos</a>
								<a href='ped_menu.php' class='nav-link active'>Pedidos</a>
				";
	// }

	echo "
								<a href='cerrar_sesion.php' class='nav-link text-light btn btn-sesion'><i class='fas fa-power-off'></i></a>
							</div>
						</div>
					</nav>
				</header>";
}

function footer()
{
	echo "
				<script src='../js/jquery-3.5.1.min.js'></script>
				<script src='../css/bootstrap/js/bootstrap.bundle.min.js'></script>
				<script src='../js/screenUp.js'></script>

			</body>
				
		</html>
		";
}
