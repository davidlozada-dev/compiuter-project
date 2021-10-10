<?php

require_once("theme_sesion.php");
require_once("../../backend/class/empleados.class.php");

$obj_emp = new empleados;

head("Menú principal");

$obj_emp->cod_emp = $_SESSION['codigo'];
$obj_emp->puntero = $obj_emp->getByCode();
$empleados = $obj_emp->extractData();

?>

<div class="container-fluid p-3">
	<h2 class="text-center p-3">Cuenta</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-xl-4">
			<div class="card rounded px-3 py-4">
				<h3 class="card-title text-center">Información</h3>
				<div class="card-body">
					<?php echo "
						<p><b>Nombre:</b> $empleados[nom_emp]</p>
						<p><b>Apellido:</b> $empleados[ape_emp]</p>
						<p><b>Teléfono:</b> $empleados[tel_emp]</p>
						<p><b>Correo:</b> $empleados[cor_emp]</p>
						<p><b>Cargo:</b> $empleados[car_emp]</p>
						<p><b>Dirección:</b> $empleados[dir_emp]</p>
					"; ?>
				</div>
			</div>
		</div>
		<div class="col-12 col-xl-4">
			<div class="card rounded px-3 py-4">
				<h3 class="card-title text-center">Configuración</h3>
				<div class="card-body">
					<a class="btn btn-outline-primary btn-block" href="emp_cambiar_contrasena.php">Cambiar contraseña</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

footer();

?>