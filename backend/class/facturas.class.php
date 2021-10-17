<?php

require_once("utilidad.class.php");

class facturas extends utilidad
{
	public $cod_fac;
	public $fec_fac;
	public $mon_fac;
	public $div_fac;
	public $des_fac;
	public $fky_empleados;
	public $fky_diagnosticos;

	function create()
	{
		$fec_fac = date("Y-m-d");

		$this->que_bda = "INSERT INTO facturas
													(fec_fac, 
													mon_fac, 
													div_fac,
													des_fac,
													fky_empleados,
													fky_diagnosticos) 
												VALUES
													('$fec_fac', 
													'$this->mon_fac', 
													'$this->div_fac',  
													'$this->des_fac',  
													'$this->fky_empleados',  
													'$this->fky_diagnosticos');";

		return $this->run();
	} // fin de create

	function getAll()
	{
		$this->que_bda = "SELECT * FROM facturas;";

		return $this->run();
	} // fin de getAll

	function getByCode()
	{
		$this->que_bda = "SELECT * FROM facturas WHERE cod_fac='$this->cod_fac;'";

		return $this->run();
	} // fin de getByCode

	function delete()
	{
		$this->que_bda = "DELETE FROM facturas
												WHERE
													cod_fac='$this->cod_fac';";

		return $this->run();
	} // fin de delete

}
