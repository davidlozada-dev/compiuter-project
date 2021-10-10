<?php

require_once("theme_sesion.php");
require_once("../../backend/class/clientes.class.php");
require_once("../../backend/class/equipos.class.php");
require_once("../../backend/class/categorias.class.php");

head("Equipos");

check("Equipos");

$obj_cli = new clientes();

if (isset($_POST['ced_cli'])) {

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
<div class="container-fluid pt-5 pb-5 mb-5">
	<h2 class="text-center pb-4">Equipos</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-xl-4 mb-5">
			<div class="card rounded">
				<h2 class="card-title text-center pt-4">Registrar</h2>
				<div class="card-body">
					<?php if (isset($alertNoExiste)) {
						echo $alertNoExiste;
					} ?>
					<form action="equipos.php" id="formulario1" method="POST" class="was-validation" novalidate>
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
						<form action="../../backend/controller/equipos.php" method="POST" class="was-validation" id="formulario" novalidate>
							<input type="hidden" name="fky_clientes" value="<?php if (!isset($cliente['cod_cli'])) {
																																echo '';
																															} else {
																																echo $cliente['cod_cli'];
																															}	?>">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="alfanumerico">Serial:</label>
										<input type="text" name="ser_equ" id="alfanumerico" class="form-control text-uppercase" placeholder="Serial" />
										<small id="alfanumericoDiv" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="marca">Marca:</label>
										<input type="text" name="mar_equ" id="marca" class="form-control" placeholder="Marca" />
										<small id="marcaDiv" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="descripcion">Descripcion:</label>
										<textarea class="form-control" id="descripcion" name="des_equ" rows="3" placeholder="Descripcion" maxlength="100"></textarea>
										<small id="descripcionDiv" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="col-12" id="categoriaCaja">
									<div class="form-group">
										<label for="categoria">Categoria:</label>
										<select name="fky_categorias" id="categoria" class="form-control">
											<option value="">Seleccione...</option>
											<?php
											$obj_cat = new categorias;
											$obj_cat->puntero = $obj_cat->getAll();
											while (($categoria = $obj_cat->extractData()) > 0) {
												echo "
												<option value='$categoria[cod_cat]'>$categoria[nom_cat]</option>
												";
											}
											?>
										</select>
										<small id="categoriaDiv" class="invalid-feedback"></small>
									</div>
									<div class="d-flex justify-content-between mt-4">
										<button type="reset" class="btn btn-success">Limpiar</button>
										<button type="submit" class="btn btn-primary" name="run" value="create">Guardar</button>
									</div>
								</div>
							</div>
						</form>
					<?php

					}

					?>
				</div>
			</div>
		</div>

		<div class="col-12 col-xl-8">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="card-header">
						<div class="row">
							<div class="col-12">
								<a class="btn btn-danger" href="equ_reportes/equ_reportepdf_enlace.php"><i class="fas fa-file-pdf mr-1"></i> Descargar listado
									por PDF</i></a>
							</div>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered table-hover text-center">
							<thead>
								<tr>
									<th>Código</th>
									<th>Serial</th>
									<th>Marca</th>
									<th>Descripcion</th>
									<th>Categoria</th>
									<th>Cliente</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$obj_equ = new equipos;
								$obj_equ->puntero = $obj_equ->getAll();

								$obj_cat = new categorias;

								while (($equipos = $obj_equ->extractData()) > 0) {

									$obj_cat->cod_cat = $equipos['fky_categorias'];
									$obj_cat->puntero = $obj_cat->getByCode();
									$categoria = $obj_cat->extractData();

									$obj_cli->cod_cli = $equipos['fky_clientes'];
									$obj_cli->puntero = $obj_cli->getByCode();
									$cliente = $obj_cli->extractData();

									echo "<form action='../../backend/controller/equipos.php' method='POST'>
											<tr>
												<input type='hidden' name='cod_equ' value='$equipos[cod_equ]'>
												<td>$equipos[cod_equ]</td>
												<td>$equipos[ser_equ]</td>
												<td>$equipos[mar_equ]</td>
												<td>$equipos[des_equ]</td>
												<td>$categoria[nom_cat]</td>
												<td>$cliente[nom_cli] $cliente[ape_cli]</td>
												<td><button type='button' data-toggle='modal' class='btn btn-danger' data-target='#modalDelete$equipos[cod_equ]'><i class='fas fa-trash'></i></button></td>
													<div class='modal fade' id='modalDelete$equipos[cod_equ]' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
														<div class='modal-dialog modal-sm'>
															<div class='modal-content'>
																<div class='modal-header'>
																	<h5 class='modal-title' id='exampleModalLabel'>¿Estas seguro de enviar a la papelera?</h5>
																	<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
																		<span aria-hidden='true'>&times;</span>
																	</button>
																</div>
																<div class='modal-body d-flex justify-content-around'>
																	<button type='submit' name='run' value='delete' class='btn btn-light'>Eliminar</button>
																	<button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
																</div>
															</div>
														</div>
													</div>
												</tr>
										</form>
									";
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>



	<?php

	footer();

	?>