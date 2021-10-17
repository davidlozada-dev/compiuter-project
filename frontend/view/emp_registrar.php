<?php

require_once('theme_sesion.php');

head('Registrar empleado');

check('Empleados');

?>

<!-- Formulario -->
<div class="container px-3 pt-3 pb-5 mb-5">
	<a class="btn btn-success btn-lg" href="emp_menu.php"><i class="fas fa-arrow-circle-left"></i></a>
	<div class="row justify-content-center">
		<div class="col-12 col-xl-6 p-2">
			<div class="card rounded">
				<h2 class="card-title text-center pt-4">Registrar empleado</h2>
				<form action="../../backend/controller/empleados.php" method="POST" class="was-validation" id="formulario" novalidate>
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<label for="nombre">Nombre:</label>
									<input type="text" name="nom_emp" id="nombre" class="form-control" placeholder="Nombre" />
									<small id="nombreDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<label for="apellido">Apellido:</label>
									<input type="text" name="ape_emp" id="apellido" class="form-control" placeholder="Apellido" />
									<small id="apellidoDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<label for="cedula">Cédula:</label>
									<input type="text" name="ced_emp" id="cedula" class="form-control" placeholder="Cédula" />
									<small id="cedulaDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<label for="telefono">Teléfono:</label>
									<input type="text" name="tel_emp" id="telefono" class="form-control" placeholder="Teléfono" />
									<small id="telefonoDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="correo">Correo:</label>
									<input type="email" name="cor_emp" id="correo" class="form-control" placeholder="Correo" />
									<small id="correoDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="contrasena">Contraseña:</label>
									<input type="password" name="cla_emp" id="contrasena" class="form-control" placeholder="Contraseña" />
									<small id="contrasenaDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="direccion">Dirección:</label>
									<input type="text" name="dir_emp" id="direccion" class="form-control" placeholder="Dirección" />
									<small id="direccionDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="cargo">Carga:</label>
									<select class="custom-select" name="car_emp" id="cargo">
										<option value="" selected>Seleccione un cargo</option>
										<option value=" Administrador">Administrador</option>
										<option value="Cajero">Cajero</option>
										<option value="Tecnico">Técnico</option>
									</select>
									<small id="cargoDiv" class="invalid-feedback"></small>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer d-flex justify-content-between">
						<button type="reset" class="btn btn-success">Limpiar</button>
						<button type="submit" class="btn btn-primary" name="run" value="create">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<?php

footer();

?>