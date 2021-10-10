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

	function filter()
	{
		$filter1 = ($this->cod_fac != "") ? "AND cod_fac LIKE '%$this->cod_fac%'" : "";
		$filter2 = ($this->fec_fac != "") ? "AND fec_fac LIKE '%$this->fec_fac%'" : "";
		$filter3 = ($this->mon_fac != "") ? "AND mon_fac LIKE '%$this->mon_fac%'" : "";
		$filter4 = ($this->div_fac != "") ? "AND div_fac='$this->div_fac'" : "";
		$filter5 = ($this->des_fac != "") ? "AND des_fac='$this->des_fac'" : "";

		$this->que_bda = "SELECT * FROM facturas WHERE 1=1 $filter1 $filter2 $filter3 $filter4 $filter5;";

		return $this->run();
	} // fin de filter

}
