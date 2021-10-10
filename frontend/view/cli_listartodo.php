<?php

require_once("theme_sesion.php");
require_once("../../backend/class/clientes.class.php");

$obj_cli = new clientes;
$obj_cli->puntero = $obj_cli->getAll();

head("Lista de Clientes");

check('Clientes');

?>

<!-- Lista -->
<div class="container-fluid px-3 pt-3 pb-5 mb-5">
	<a class="btn btn-success btn-lg" href="cli_menu.php"><i class="fas fa-arrow-circle-left"></i></a>
	<h2 class="text-center p-3">Lista de Clientes</h2>
	<div class="row justify-content-center">
		<div class="col-12 py-2">
			<div class="card-header">
				<div class="row">
					<div class="col-12">
						<a class="btn btn-danger" href="cli_reportes/cli_reportepdf_enlace.php"><i class="fas fa-file-pdf mr-1"></i> Descargar listado
							por PDF</i></a>
					</div>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover text-center">
					<thead>
						<tr>
							<th>Código</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Cédula</th>
							<th>Teléfono</th>
							<th>Dirección</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while (($clientes = $obj_cli->extractData()) > 0) {

							echo "<form action='../../backend/controller/clientes.php' method='POST'>
												<tr>
													<input type='hidden' name='cod_cli' value='$clientes[cod_cli]'>
													<td>$clientes[cod_cli]</td>
													<td>$clientes[nom_cli]</td>
													<td>$clientes[ape_cli]</td>
													<td>$clientes[ced_cli]</td>
													<td>$clientes[tel_cli]</td>
													<td>$clientes[dir_cli]</td>
													<td><a class='btn btn-warning' href='cli_modificar.php?cod_cli=$clientes[cod_cli]'><i class='fas fa-edit'></i></a></td>
													<td><button type='button' data-toggle='modal' class='btn btn-danger' data-target='#modalDelete$clientes[cod_cli]'><i class='fas fa-trash'></i></button></td>
													<div class='modal fade' id='modalDelete$clientes[cod_cli]' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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


<?php

footer();

?>