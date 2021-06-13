<?php

require_once("utilidad.class.php");

class pedidos extends utilidad
{
	public $cod_ped;
	public $fec_ped;
	public $fky_clientes;
	public $fky_equipos;
	public $fky_empleados;

	function create()
	{
		$this->que_bda = "INSERT INTO pedidos
													(cod_ped, 
													fec_ped, 
													fky_clientes, 
													fky_equipos,
													fky_empleados,
												VALUES
													('$this->cod_ped', 
													'$this->fec_ped', 
													'$this->fky_clientes', 
													'$this->fky_equipos',  
													'$this->fky_empleados';";

		return $this->run();
	} // fin de create

	function update()
	{
		$this->que_bda = "UPDATE pedidos
												SET
													cod_ped='$this->cod_ped',
													fec_ped='$this->fec_ped',
													fky_clientes='$this->fky_clientes',
													fky_equipos='$this->fky_equipos',
													fky_empleados='$this->fky_empleados',
												WHERE
													cod_ped='$this->cod_ped';";

		return $this->run();
	} // fin de update

	function getAll()
	{
		$this->que_bda = "SELECT * FROM pedidos;";

		return $this->run();
	} // fin de getAll

	function getByCode()
	{
		$this->que_bda = "SELECT * FROM pedidos WHERE cod_ped='$this->cod_ped;'";

		return $this->run();
	} // fin de getByCode

	function delete()
	{
		$this->que_bda = "DELETE FROM pedidos
												WHERE
													cod_ped='$this->cod_ped';";

		return $this->run();
	} // fin de delete

	function filter()
	{
		$filter1 = ($this->cod_ped != "") ? "AND cod_ped LIKE '%$this->cod_ped%'" : "";
		$filter2 = ($this->fec_ped != "") ? "AND fec_ped LIKE '%$this->fec_ped%'" : "";
		$filter3 = ($this->fky_clientes != "") ? "AND fky_clientes LIKE '%$this->fky_clientes%'" : "";
		$filter4 = ($this->fky_equipos != "") ? "AND fky_equipos='$this->fky_equipos'" : "";
		$filter5 = ($this->fky_empleados != "") ? "AND fky_empleados='$this->fky_empleados'" : "";

		$this->que_bda = "SELECT * FROM pedidos WHERE 1=1 $filter1 $filter2 $filter3 $filter4 $filter5 ;";

		return $this->run();
	} // fin de filter

}
