<?php

require_once("utilidad.class.php");

class diagnosticos extends utilidad
{
	public $cod_dia;
	public $fal_cli_dia;
	public $fal_ini_dia;
	public $sol_dia;
	public $fec_ent_dia;
	public $fec_sal_dia;
	public $est_dia;
	public $fky_empleados;
	public $fky_equipos;
	public $fky_clientes;

	function create()
	{
		$fec_ent_dia = date("Y-m-d");

		$this->que_bda = "INSERT INTO diagnosticos
												(fal_cli_dia, 
												fal_ini_dia, 
												fec_ent_dia, 
												fec_sal_dia, 
												est_dia, 
												fky_empleados,
												fky_equipos,
												fky_clientes)
											VALUES
												('$this->fal_cli_dia', 
												'$this->fal_ini_dia', 
												'$fec_ent_dia', 
												'$this->fec_sal_dia', 
												'A', 
												'$this->fky_empleados',
												'$this->fky_equipos',
												'$this->fky_clientes');";

		return $this->run();
	} // fin de create

	function update()
	{
		$this->que_bda = "UPDATE diagnosticos
												SET
													sol_dia='$this->sol_dia',
													est_dia='R'
												WHERE
													cod_dia='$this->cod_dia';";

		return $this->run();
	} // fin de update

	function getAll()
	{
		$this->que_bda = "SELECT * FROM diagnosticos WHERE est_dia='A';";

		return $this->run();
	} // fin de getAll

	function getByCode()
	{
		$this->que_bda = "SELECT * FROM diagnosticos WHERE cod_dia='$this->cod_dia;'";

		return $this->run();
	} // fin de getByCode	

	function getByClient()
	{
		$this->que_bda = "SELECT * FROM diagnosticos WHERE fky_clientes='$this->fky_clientes' AND est_dia='A';";

		return $this->run();
	} // fin de getByClient	

	function delete()
	{
		$this->que_bda = "DELETE FROM diagnosticos WHERE cod_dia='$this->cod_dia';";

		return $this->run();
	} // fin de delete

}
