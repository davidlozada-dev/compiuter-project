<?php

require_once('theme_sesion.php');
require_once("../../backend/class/clientes.class.php");
require_once("../../backend/class/equipos.class.php");

head('Registrar pedido');

if (isset($_POST['ced_cli'])) {
	$obj_cli = new clientes();

	$obj_cli->ced_cli = $_POST['ced_cli'];
	$obj_cli->contador = $obj_cli->getByCedula();

	if ($obj_cli->count() == 0) {
		$alertNoExiste = "<div class='alert alert-danger'><b>El cliente ingresado no existe.</b> Si desea registrarlo haga <a href='cli_registrar.php' class='text-danger'><b>click aqui</b></a></div>";
	} else {
		$obj_cli->puntero = $obj_cli->getByCedula();
		$cliente = $obj_cli->extractData();
	}
}

?>

<!-- Formulario -->
<div class="container px-3 pt-3 pb-5 mb-5">
	<a class="btn btn-success btn-lg" href="ped_menu.php"><i class="fas fa-arrow-circle-left"></i></a>
	<div class="row justify-content-center">
		<div class="col-12 col-md-6 p-2">
			<div class="card rounded">
				<h2 class="card-title text-center pt-4">Registrar pedido</h2>
				<div class="card-body">
					<?php if (isset($alertNoExiste)) {
						echo $alertNoExiste;
					} ?>
					<form action="ped_registrar.php" id="formulario1" method="POST" class="was-validation" novalidate>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="cedula">Cedula:</label>
									<input type="text" name="ced_cli" id="cedula" class="form-control" placeholder="Cedula" value="<?php if (isset($cliente['ced_cli'])) {
																																																										echo $cliente['ced_cli'];
																																																									} ?>" maxlength="10" />
									<small id="cedulaDiv" class="invalid-feedback"></small>
								</div>
							</div>

							<div class="col-12 mb-3 d-flex justify-content-between">
								<a href="des_registrar.php" class="btn btn-success">Limpiar</a>
								<button type="submit" class="ml-3 btn btn-primary btn-block">Buscar Cedula</button>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="nombre">Nombre:</label>
									<input type="text" id="nombre" class="form-control" placeholder="Nombre" value="<?php echo $cliente['nom_cli']; ?>" readonly />
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="apellido">Apellido:</label>
									<input type="text" id="apellido" class="form-control" placeholder="Apellido" value="<?php echo $cliente['ape_cli']; ?>" readonly />
								</div>
							</div>
						</div>
					</form>
					<?php

					if (isset($cliente['cod_cli'])) {

					?>
						<form action="../../backend/controller/pedidos.php" method="POST" class="was-validation" id="formulario" novalidate>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="equipo">Equipo asociado al cliente:</label>
										<select name="fky_equipos" id="equipo" class="form-control">
											<option value="">Seleccione...</option>
											<?php
											$obj_equ = new equipos();
											$obj_equ->fky_clientes = $cliente['cod_cli'];
											$obj_equ->puntero = $obj_equ->getByClient();

											while (($equipo = $obj_equ->extractData()) > 0) {
												echo "
														<option value='$equipo[cod_equ]'>$equipo[ser_equ] - $equipo[mar_equ]</option>
													";
											}
											?>
										</select>
										<small id="equipoDiv" class="invalid-feedback"></small>
									</div>
								</div>
							</div>
				</div>
				<div class="card-footer d-flex justify-content-between">
					<button type="reset" class="btn btn-success">Limpiar</button>
					<button type="submit" class="btn btn-primary" name="run" value="create">Guardar</button>
				</div>
			</div>
			</form>
		<?php

					}

		?>
		</div>
	</div>
</div>

<!-- <script src="../js/validaciones.js"></script> -->

<?php

footer();

?>