<?php

require_once("theme_sesion.php");
require_once("../../backend/class/categorias.class.php");

$obj_cat = new categorias;

$cod_cat = $_REQUEST['cod_cat'];

$obj_cat->assignValue();
$obj_cat->puntero = $obj_cat->getByCode();
$categorias = $obj_cat->extractData();

head("Modificar categorias");

check('Categorias');

?>

<!-- Formulario -->
<div class="container-fluid px-3 pt-3 pb-5 mb-5">
	<a class="btn btn-success btn-lg" href="categorias.php"><i class="fas fa-arrow-circle-left"></i></a>
	<div class="row justify-content-center">
		<div class="col-12 col-xl-6 p-2">
			<div class="card rounded">
				<h2 class="card-title text-center pt-4">Modificar categorias</h2>
				<form action="../../backend/controller/categorias.php" method="POST" class="was-validation mb-0" id="formulario" novalidate>
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-xl-12">
								<div class="form-group">
									<input type="hidden" name="cod_cat" id="cod_cat" value="<?php echo $categorias['cod_cat']; ?>">
									<label for="nombre">Nombre:</label>
									<input type="text" name="nom_cat" id="nombre" placeholder="Nombre:" value="<?php echo $categorias['nom_cat']; ?>" class="form-control">
									<small id="nombreDiv" class="invalid-feedback"></small>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer d-flex justify-content-between">
						<button type="reset" class="btn btn-success">Limpiar</button>
						<button type="submit" class="btn btn-primary" name="run" value="update">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<?php

footer();

?>