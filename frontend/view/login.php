<?php

require_once("theme_login.php");

head("Iniciar sesión");

?>

<!-- Formulario -->
<div class="container p-3">
	<div class="row justify-content-center">
		<div class="col-12 col-xl-4">
			<div class="card rounded">
				<h2 class="card-title text-center pt-4">Iniciar Sesión</h2>
				<div class="card-body">
					<form action="../../backend/controller/sesion.php" method="POST" class="was-validation" novalidate>
						<div class="form-group">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="correo"><i class="fas fa-user"></i></span>
								</div>
								<input type="email" name="cor_emp" id="correo" class="form-control" placeholder="Correo" />
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="contrasena"><i class="fas fa-lock"></i></span>
								</div>
								<input type="password" name="cla_emp" id="contrasena" class="form-control" placeholder="Contraseña" />
							</div>
							<div class="py-1">
								<button class="btn btn-outline-primary btn-block" name="run" value="session">Iniciar sesión</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

footer();

?>