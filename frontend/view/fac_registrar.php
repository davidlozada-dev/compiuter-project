<?php

require_once('theme_sesion.php');
require_once("../../backend/class/clientes.class.php");
require_once("../../backend/class/diagnosticos.class.php");
require_once("../../backend/class/equipos.class.php");
require_once("../../backend/class/clientes.class.php");
require_once("../../backend/class/categorias.class.php");

head('Registrar fractura');

check('Facturas');

if (isset($_POST['ced_cli'])) {
	$obj_cli = new clientes();

	$obj_cli->ced_cli = $_POST['ced_cli'];
	$obj_cli->contador = $obj_cli->getByCedula();

	if ($obj_cli->count() == 0) {
		$alertNoExiste = "<div class='alert alert-danger'><b>El cliente ingresado no existe.</b> Si desea registrarlo haga <a href='cli_registrar.php' class='text-danger'><b>click aqui</b></a></div>";
	} else {
		$obj_cli->puntero = $obj_cli->getByCedula();
		$cliente = $obj_cli->extractData();

		$obj_equ = new equipos;
		$obj_cli = new clientes;
		$obj_cat = new categorias;
	}
}

?>

<!-- Formulario -->
<div class="container px-3 pt-3 pb-5 mb-5">
	<a class="btn btn-success btn-lg" href="fac_menu.php"><i class="fas fa-arrow-circle-left"></i></a>
	<div class="row justify-content-center">
		<div class="col-12 col-xl-6 p-2">
			<div class="card rounded">
				<h2 class="card-title text-center pt-4">Registrar factura</h2>
				<div class="card-body">
					<?php if (isset($alertNoExiste)) {
						echo $alertNoExiste;
					} ?>
					<form action="fac_registrar.php" id="formulario1" method="POST" class="was-validation" novalidate>
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
								<a href="des_registrar.php" class="btn btn-success">Limpiar</a>
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
						<form action="../../backend/controller/facturas.php" method="POST" class="was-validation" id="formulario" novalidate>
							<input type="hidden" name="fky_empleados" value="<?php echo $_SESSION['codigo']; ?>">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="diagnosticos">Diagnosticos asociado al cliente:</label>
										<select name="fky_diagnosticos" id="diagnosticos" class="form-control">
											<option value="">Seleccione...</option>
											<?php
											$obj_dia = new diagnosticos();
											$obj_dia->fky_clientes = $cliente['cod_cli'];
											$obj_dia->puntero = $obj_dia->getByClient();

											while (($diagnosticos = $obj_dia->extractData()) > 0) {

												$obj_equ->cod_equ = $diagnosticos['fky_equipos'];
												$obj_equ->puntero = $obj_equ->getByCode();
												$equipo = $obj_equ->extractData();

												$obj_cat->cod_cat = $equipo['fky_categorias'];
												$obj_cat->puntero = $obj_cat->getByCode();
												$categoria = $obj_cat->extractData();

												echo "
														<option value='$diagnosticos[cod_dia]'>$diagnosticos[fec_ent_dia] | $categoria[nom_cat] | $equipo[ser_equ] - $equipo[mar_equ]</option>
													";
											}
											?>
										</select>
										<small id="diagnosticosDiv" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="solucion">Solución:</label>
										<textarea class="form-control" id="solucion" name="sol_dia" rows="3" placeholder="Solución" maxlength="100"></textarea>
										<small id="solucionDiv" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="col-12 col-xl-6">
									<div class="form-group">
										<label for="precio">Precio:</label>
										<input type="number" id="precio" name='mon_fac' class="form-control" placeholder="Precio" />
										<small id="precioDiv" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="col-12 col-xl-6">
									<div class="form-group">
										<label for="divisa">Divisa:</label>
										<select class="custom-select" name="div_fac" id="divisa">
											<option value="" selected>Seleccione una divisa</option>
											<option value="Dolares">Dolares</option>
											<option value="Pesos Colombianos">Pesos Colombianos</option>
											<option value="Euros">Euros</option>
											<option value="Bolivares">Bolivares</option>
										</select>
										<small id="divisaDiv" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="descripcion">Descripción:</label>
										<textarea class="form-control" id="descripcion" name="des_fac" rows="3" placeholder="Descripción" maxlength="100"></textarea>
										<small id="descripcionDiv" class="invalid-feedback"></small>
									</div>
								</div>
							</div>
							<div class="d-flex mt-3 justify-content-between">
								<button type="reset" class="btn btn-success">Limpiar</button>
								<button type="submit" class="btn btn-primary" name="run" value="create">Guardar</button>
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