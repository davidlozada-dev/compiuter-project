<?php

require_once("theme_sesion.php");
require_once("../../backend/class/categorias.class.php");

$obj_cat = new categorias;
$obj_cat->puntero = $obj_cat->getAll();

head("Categorias");

check('Categorias');

?>

<!-- Formulario -->
<div class="container-fluid pt-5 pb-5 mb-5">
	<h2 class="text-center pb-4">Categorias</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-xl-4 mb-5">
			<div class="card rounded">
				<h2 class="card-title text-center pt-4">Registrar</h2>
				<form action="../../backend/controller/categorias.php" method="POST" class="was-validation mb-0" id="formulario" novalidate>
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="alfanumerico">Nombre:</label>
									<input type="text" name="nom_cat" id="alfanumerico" class="form-control" placeholder="Nombre" />
									<small id="alfanumericoDiv" class="invalid-feedback"></small>
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
		<div class="col-12 col-xl-8">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="card-header">
						<div class="row">
							<div class="col-12">
								<a class="btn btn-danger" href="./cat_reportes/cat_reportepdf_enlace.php"><i class="fas fa-file-pdf mr-1"></i> Descargar listado
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
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<?php
								while (($categorias = $obj_cat->extractData()) > 0) {
									echo "<form action='../../backend/controller/categorias.php' method='POST'>
											<tr>
												<input type='hidden' name='cod_cat' value='$categorias[cod_cat]'>
												<td>$categorias[cod_cat]</td>
												<td>$categorias[nom_cat]</td>
									
												<td><a class='btn btn-warning' href='cat_modificar.php?cod_cat=$categorias[cod_cat]'><i class='fas fa-edit'></i></a></td>
												<td><button type='button' data-toggle='modal' class='btn btn-danger' data-target='#modalDelete$categorias[cod_cat]'><i class='fas fa-trash'></i></button></td>
													<div class='modal fade' id='modalDelete$categorias[cod_cat]' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
</div>



<?php

footer();

?>