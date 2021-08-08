<?php

require_once("theme_login.php");

head("Iniciar sesión");

?>

<!-- Formulario -->
<div class="container p-3">
	<div class="row justify-content-center">
		<div class="col-12 col-md-4">
			<div class="card rounded">
				<h2 class="card-title text-center pt-4">Iniciar Sesión</h2>
				<div class="card-body">
					<form action="../../backend/controller/session.php" method="POST" class="was-validation" novalidate>
						<div class="form-group">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="correo"><i class="fas fa-user"></i></span>
								</div>
								<input type="email" name="cor_ado" id="correo" class="form-control" placeholder="Correo" />
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="contrasena"><i class="fas fa-lock"></i></span>
								</div>
								<input type="password" name="cla_ado" id="contrasena" class="form-control" placeholder="Contraseña" />
							</div>
							<div class="py-1">
								<button class="btn btn-outline-primary btn-block" name="run" value="session">Iniciar sesión</button>
							</div>
						</div>
					</form>
				</div>
				<!-- <div class="card-footer text-right">
					<a class="text-primary" href="ado_olvido_contrasena.php"><small>¿Olvido su contraseña?</small></a>
				</div> -->
			</div>
			<!-- <div class="py-3 text-center">
				<small>
					<a href="ado_finalizar_registro.php">Si ya te registro un administrador y es la primera vez que vas a ingresar, termina de
						configurar tu cuenta aqui.</a>
				</small>
			</div> -->
		</div>
	</div>
</div>

<?php

footer();

?>