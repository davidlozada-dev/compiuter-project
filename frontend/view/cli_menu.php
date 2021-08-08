<?php

require_once('theme_sesion.php');

head('Menú de Clientes');

checkAdmin();

?>

<!-- Menu -->
<div class="container px-3 pt-3 pb-5 mb-5">
	<div class="row justify-content-center p-3">
		<!-- Cargos -->
		<div class="col-12 col-md-4 p-1">
			<div class="card rounded px-3 py-4">
				<h3 class="card-title text-center">Clientes</h3>
				<div class="card-body">
					<a class="btn btn-outline-primary btn-block" href="cli_registrar.php">Registrar</a>
					<a class="btn btn-outline-primary btn-block" href="cli_listartodo.php">Listar</a>
					<!-- <a class="btn btn-outline-primary btn-block" href="cli_filtrar.php">Filtrar</a>
					<a class="btn btn-outline-primary btn-block" href="cli_listarpapelera.php">Papelera</a> -->
				</div>
			</div>
		</div>
	</div>
</div>

<?php

footer();

?>