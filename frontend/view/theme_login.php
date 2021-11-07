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
