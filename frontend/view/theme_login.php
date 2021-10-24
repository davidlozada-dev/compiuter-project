<?php

function head($titulo)
{
	$posicion1 = '';

	if ($titulo === 'Iniciar sesión') $posicion1 = 'active';


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
					<nav class='navbar navbar-expand-lg navbar-dark bg-primary'>
						<!-- Nombre de la App -->
						<a href='ado_inicio.php' class='navbar-brand px-5'>
							<img src='../img/logo.png' width='150'>
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
								<a class='nav-link $posicion1' href='login.php'>Iniciar sesión</a>
							</div>
						</div>
					</nav>
				</header>
		";
}


function footer()
{
	echo "
				<script src='../js/jquery-3.5.1.min.js'></script>
				<script src='../css/bootstrap/js/bootstrap.bundle.min.js'></script>
			</body>
				
		</html>
		";
}
