<?php

require_once("theme_sesion.php");
require_once("../../backend/class/empleados.class.php");

$obj_emp = new empleados;

$cod_emp = $_REQUEST['cod_emp'];

$obj_emp->assignValue();
$obj_emp->puntero = $obj_emp->getByCode();
$empleados = $obj_emp->extractData();

head("Modificar Empleado");

// check("Empleados", 1);

?>

<!-- Formulario -->
<div class="container px-3 pt-3 pb-5 mb-5">
	<a class="btn btn-success btn-lg" href="emp_listartodo.php"><i class="fas fa-arrow-circle-left"></i></a>
	<div class="row justify-content-center">
		<div class="col-12 col-md-6 p-2">
			<div class="card rounded">
				<h2 class="card-title text-center pt-4">Modificar Empleado</h2>
				<form action="../../backend/controller/empleados.php" method="POST" class="was-validation" id="formulario" novalidate>
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<input type="hidden" name="cod_emp" id="cod_emp" value="<?php echo $empleados['cod_emp']; ?>">
									<label for="nombre">Nombre:</label>
									<input type="text" name="nom_emp" id="nombre" placeholder="Nombre:" value="<?php echo $empleados['nom_emp']; ?>" class="form-control">
									<small id="nombreDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="apellido">Apellido:</label>
									<input type="text" name="ape_emp" id="apellido" placeholder="Apellido:" value="<?php echo $empleados['ape_emp']; ?>" class="form-control">
									<small id="apellidoDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="cedula">Cédula:</label>
									<input type="text" name="ced_emp" id="cedula" placeholder="Cédula:" pattern="[0-9]+" value="<?php echo $empleados['ced_emp']; ?>" class="form-control">
									<small id="cedulaDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="telefono">Teléfono:</label>
									<input type="text" name="tel_emp" id="telefono" placeholder="Teléfono:" pattern="[0-9]+" value="<?php echo $empleados['tel_emp']; ?>" class="form-control">
									<small id="telefonoDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-md-12">
								<div class="form-group">
									<label for="correo">Correo:</label>
									<input type="email" name="cor_emp" id="correo" placeholder="Correo:" value="<?php echo $empleados['cor_emp']; ?>" class="form-control">
									<small id="correoDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-md-12">
								<div class="form-group">
									<label for="direccion">Dirección:</label>
									<input type="text" name="dir_emp" id="direccion" placeholder="Dirección:" value="<?php echo $empleados['dir_emp']; ?>" class="form-control">
									<small id="direccionDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-md-12">
								<div class="form-group">
									<label for="cargo">Cargo:</label>
									<select name="car_emp" id="cargo" class="form-control">
										<?php $seleccionado = ($empleados["car_emp"] == "Empleado1") ? "selected" : ""; ?>
										<option <?php echo $seleccionado; ?> value="Empleado1">Empleado 1</option>
										<?php $seleccionado = ($empleados["car_emp"] == "Empleado2") ? "selected" : ""; ?>
										<option <?php echo $seleccionado; ?> value="Empleado2">Empleado 2</option>
									</select>
									<small id="cargoDiv" class="invalid-feedback"></small>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer d-flex justify-content-between">
						<button type="reset" class="btn btn-success">Limpiar</button>
						<button type="submit" class="btn btn-primary" name="run" value="update">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="../js/validaciones.js"></script>

<?php

footer();

?>