<?php

require_once("utilidad.class.php");

class diagnosticos extends utilidad
{
	public $cod_dia;
	public $fal_cli_dia;
	public $fal_ini_dia;
	public $sol_dia;
	public $fky_equipos;

	function create()
	{
		$this->que_bda = "INSERT INTO diagnosticos
												(cod_dia, 
												fal_cli_dia, 
												fal_ini_dia, 
												sol_dia,
												fky_equipos,
											VALUES
												('$this->cod_dia', 
												'$this->fal_cli_dia', 
												'$this->fal_ini_dia', 
												'$this->sol_dia', 
												'$this->fky_equipos');";

		return $this->run();
	} // fin de create

	function update()
	{
		$this->que_bda = "UPDATE diagnosticos
												SET
													cod_dia='$this->cod_dia',
													fal_cli_dia='$this->fal_cli_dia',
													fal_ini_dia='$this->fal_ini_dia',
													sol_dia='$this->sol_dia',
													fky_equipos='$this->fky_equipos',
												WHERE
													cod_dia='$this->cod_dia';";

		return $this->run();
	} // fin de update

	function getAll()
	{
		$this->que_bda = "SELECT * FROM diagnosticos;";

		return $this->run();
	} // fin de getAll

	function getByCode()
	{
		$this->que_bda = "SELECT * FROM diagnosticos
												WHERE cod_dia='$this->cod_dia;'";

		return $this->run();
	} // fin de getByCode	

	function delete()
	{
		$this->que_bda = "DELETE FROM diagnosticos
												WHERE
													cod_dia='$this->cod_dia';";

		return $this->run();
	} // fin de delete

	function filter()
	{
		$filter1 = ($this->cod_dia != "") ? "AND cod_dia LIKE '%$this->cod_dia%'" : "";
		$filter2 = ($this->fal_cli_dia != "") ? "AND fal_cli_dia LIKE '%$this->fal_cli_dia%'" : "";
		$filter3 = ($this->fal_ini_dia != "") ? "AND fal_ini_dia LIKE '%$this->fal_ini_dia%'" : "";
		$filter4 = ($this->sol_dia != "") ? "AND sol_dia='$this->sol_dia'" : "";
		$filter4 = ($this->fky_equipos != "") ? "AND fky_equipos='$this->fky_equipos'" : "";

		$this->que_bda = "SELECT * FROM diagnosticos WHERE 1=1 $filter1 $filter2 $filter3 $filter4;";

		return $this->run();
	} // fin de filter

}
