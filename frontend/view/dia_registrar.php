<?php

require_once('theme_sesion.php');
require_once("../../backend/class/clientes.class.php");
require_once("../../backend/class/equipos.class.php");

head('Registrar diagnostico');

check('Diagnosticos');


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
	<a class="btn btn-success btn-lg" href="dia_menu.php"><i class="fas fa-arrow-circle-left"></i></a>
	<div class="row justify-content-center">
		<div class="col-12 col-xl-6 p-2">
			<div class="card rounded">
				<h2 class="card-title text-center pt-4">Registrar diagnostico</h2>
				<div class="card-body">
					<?php if (isset($alertNoExiste)) {
						echo $alertNoExiste;
					} ?>
					<form action="dia_registrar.php" method="POST" class="was-validation" id="formulario1" novalidate>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="cedula2">Cedula:</label>
									<input type="text" name="ced_cli" id="cedula2" class="form-control" placeholder="Cedula" value="<?php if (isset($cliente['ced_cli'])) {
																																																										echo $cliente['ced_cli'];
																																																									} ?>" maxlength="10" />
									<small id="cedulaDiv2" class="invalid-feedback"></small>
								</div>
							</div>

							<div class="col-12 mb-3 d-flex justify-content-between">
								<a href="dia_registrar.php" class="btn btn-success">Limpiar</a>
								<button type="submit" class="ml-3 btn btn-primary btn-block">Buscar Cedula</button>
							</div>
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<label for="nombreNada">Nombre:</label>
									<input type="text" id="nombreNada" class="form-control" placeholder="Nombre" value="<?php echo $cliente['nom_cli']; ?>" readonly />
								</div>
							</div>
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<label for="apellidoNada">Apellido:</label>
									<input type="text" id="apellidoNada" class="form-control" placeholder="Apellido" value="<?php echo $cliente['ape_cli']; ?>" readonly />
								</div>
							</div>
						</div>
					</form>
					<?php
					if (isset($cliente['cod_cli'])) {
					?>

						<form action="../../backend/controller/diagnosticos.php" method="POST" class="was-validation" id="formulario" novalidate>
							<input type="hidden" name="fky_clientes" value="<?php if (!isset($cliente['cod_cli'])) {
																																echo '';
																															} else {
																																echo $cliente['cod_cli'];
																															}	?>">
							<input type="hidden" name="fky_empleados" value="<?php echo $_SESSION['codigo']; ?>">
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
								<div class="col-12">
									<div class="form-group">
										<label for="fallaCliente">Falla del cliente:</label>
										<textarea class="form-control" id="fallaCliente" name="fal_cli_dia" rows="3" placeholder="Falla del cliente" maxlength="100"></textarea>
										<small id="fallaClienteDiv" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="fallaInicial">Falla inicial:</label>
										<textarea class="form-control" id="fallaInicial" name="fal_ini_dia" rows="3" placeholder="Falla inicial" maxlength="100"></textarea>
										<small id="fallaInicialDiv" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="fechaSalida">Fecha de salida:</label>
										<input type="date" id="fechaSalida" name='fec_sal_dia' class="form-control" />
										<small id="fechaSalidaDiv" class="invalid-feedback"></small>
									</div>
								</div>
							</div>
							<div class="d-flex mt-3 justify-content-between">
								<button type="reset" class="btn btn-success">Limpiar</button>
								<button type="submit" class=" btn btn-primary" name="run" value="create">Guardar</button>
							</div>
						</form>
					<?php

					}

					?>
				</div>
			</div>
		</div>

		<?php

		footer();

		?>