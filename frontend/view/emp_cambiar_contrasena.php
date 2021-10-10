<?php

require_once("theme_sesion.php");

head("Cambiar contraseña");

?>

<!-- Formulario -->
<div class="container p-3 p-xl-2">
	<a class="btn btn-success btn-lg" href="emp_inicio.php"><i class="fas fa-arrow-circle-left"></i></a>
	<div class="row justify-content-center">
		<div class="col-12 col-xl-6 p-2">
			<div class="card rounded">
				<h2 class="card-title text-center pt-4">Cambiar contraseña</h2>
				<form action="../../backend/controller/empleados.php" method="POST" class="was-validation" id="formulario" novalidate>
					<input type="hidden" name="cod_emp" value="<?php echo $_SESSION['codigo']; ?>">
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<label for="contrasena">Nueva contraseña:</label>
									<input type="password" name="cla_emp" id="contrasena" class="form-control" placeholder="Contraseña" />
									<small id="contrasenaDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<label for="repetirContrasena">Repite la nueva contraseña:</label>
									<input type="password" id="repetirContrasena" class="form-control" placeholder="Repite la contraseña" />
									<small id="repetirContrasenaDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12">
								<div class="alert alert-success">
									<b>La contraseña debe de cumplir con estos requisitos minimos:</b>
									<br>
									- Debe de tener entre 8-20 caracteres.
									<br>
									- Un carácter en mayúscula.
									<br>
									- Un carácter en miniscula.
									<br>
									- Un carácter especial. Permitidos <strong>.*/#$%&amp;¡!_\-,@:;?¿</strong>
									<br>
									- Al menos un digito.
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer d-flex justify-content-between">
						<button type="reset" class="btn btn-success">Limpiar</button>
						<button type="submit" class="btn btn-primary" name="run" value="changePassword">Cambiar contraseña</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<?php

footer();

?>