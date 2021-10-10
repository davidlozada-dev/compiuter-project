<?php

require_once('theme_sesion.php');

head('Menú de facturas');

check('Facturas');

?>

<!-- Menu -->
<div class="container px-3 pt-3 pb-5 mb-5">
	<div class="row justify-content-center p-3">
		<!-- Cargos -->
		<div class="col-12 col-xl-4 p-1">
			<div class="card rounded px-3 py-4">
				<h3 class="card-title text-center">Facturas</h3>
				<div class="card-body">
					<a class="btn btn-outline-primary btn-block" href="fac_registrar.php">Registrar</a>
					<a class="btn btn-outline-primary btn-block" href="fac_listartodo.php">Listar</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

footer();

?>