<?php

require_once("theme_sesion.php");
require_once("../../backend/class/clientes.class.php");

$obj_cli = new clientes;

$cod_cli = $_REQUEST['cod_cli'];

$obj_cli->assignValue();
$obj_cli->puntero = $obj_cli->getByCode();
$clientes = $obj_cli->extractData();

head("Modificar clientes");

check('Clientes');

?>

<!-- Formulario -->
<div class="container px-3 pt-3 pb-5 mb-5">
	<a class="btn btn-success btn-lg" href="cli_listartodo.php"><i class="fas fa-arrow-circle-left"></i></a>
	<div class="row justify-content-center">
		<div class="col-12 col-xl-6 p-2">
			<div class="card rounded">
				<h2 class="card-title text-center pt-4">Modificar clientes</h2>
				<form action="../../backend/controller/clientes.php" method="POST" class="was-validation" id="formulario" novalidate>
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<input type="hidden" name="cod_cli" id="cod_cli" value="<?php echo $clientes['cod_cli']; ?>">
									<label for="nombre">Nombre:</label>
									<input type="text" name="nom_cli" id="nombre" placeholder="Nombre:" value="<?php echo $clientes['nom_cli']; ?>" class="form-control">
									<small id="nombreDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<label for="apellido">Apellido:</label>
									<input type="text" name="ape_cli" id="apellido" placeholder="Apellido:" value="<?php echo $clientes['ape_cli']; ?>" class="form-control">
									<small id="apellidoDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<label for="cedula">Cédula:</label>
									<input type="text" name="ced_cli" id="cedula" placeholder="Cédula:" pattern="[0-9]+" value="<?php echo $clientes['ced_cli']; ?>" class="form-control">
									<small id="cedulaDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-xl-6">
								<div class="form-group">
									<label for="telefono">Teléfono:</label>
									<input type="text" name="tel_cli" id="telefono" placeholder="Teléfono:" pattern="[0-9]+" value="<?php echo $clientes['tel_cli']; ?>" class="form-control">
									<small id="telefonoDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-xl-12">
								<div class="form-group">
									<label for="direccion">Dirección:</label>
									<input type="text" name="dir_cli" id="direccion" placeholder="Dirección:" value="<?php echo $clientes['dir_cli']; ?>" class="form-control">
									<small id="direccionDiv" class="invalid-feedback"></small>
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