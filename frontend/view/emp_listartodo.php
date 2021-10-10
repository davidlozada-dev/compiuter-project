<?php

require_once("theme_sesion.php");
require_once("../../backend/class/empleados.class.php");

$obj_emp = new empleados;
$obj_emp->puntero = $obj_emp->getAll();

head("Lista de Empleados");

check('Empleados');


?>

<!-- Lista -->
<div class="container-fluid px-3 pt-3 pb-5 mb-5">
	<a class="btn btn-success btn-lg" href="emp_menu.php"><i class="fas fa-arrow-circle-left"></i></a>
	<h2 class="text-center p-3">Lista de Empleados</h2>
	<div class="row justify-content-center">
		<div class="col-12 py-2">
			<div class="card-header">
				<div class="row">
					<div class="col-12">
						<a class="btn btn-danger" href="emp_reportes/emp_reportepdf_enlace.php"><i class="fas fa-file-pdf mr-1"></i> Descargar listado
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
							<th>Correo</th>
							<th>Dirección</th>
							<th>Teléfono</th>
							<th>Cargo</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while (($empleados = $obj_emp->extractData()) > 0) {

							echo "<form action='../../backend/controller/empleados.php' method='POST'>
											<tr>
												<input type='hidden' name='cod_emp' value='$empleados[cod_emp]'>
												<td>$empleados[cod_emp]</td>
												<td>$empleados[nom_emp]</td>
												<td>$empleados[ape_emp]</td>
												<td>$empleados[ced_emp]</td>
												<td>$empleados[cor_emp]</td>
												<td>$empleados[dir_emp]</td>
												<td>$empleados[tel_emp]</td>
												<td>$empleados[car_emp]</td>
												<td><a class='btn btn-warning' href='emp_modificar.php?cod_emp=$empleados[cod_emp]'><i class='fas fa-edit'></i></a></td>
												
												";

							if ($empleados['car_emp'] !== 'Administrador') {
								echo "
												<td><button type='button' data-toggle='modal' class='btn btn-danger' data-target='#modalDelete$empleados[cod_emp]'><i class='fas fa-trash'></i></button></td>
												<div class='modal fade' id='modalDelete$empleados[cod_emp]' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
										";
							} else {
								echo "<td></td>";
							}
							echo "	
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