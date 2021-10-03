<?php

require_once("utilidad.class.php");

class equipos extends utilidad
{
	public $cod_equ;
	public $ser_equ;
	public $des_equ;
	public $mar_equ;
	public $fky_categorias;
	public $fky_clientes;

	function create()
	{

		$serial = strtoupper($this->ser_equ);

		$this->que_bda = "INSERT INTO equipos
													(ser_equ,
													des_equ,
													mar_equ,
													fky_categorias,
													fky_clientes)
												VALUES
													('$serial',
													'$this->des_equ',
													'$this->mar_equ',
													'$this->fky_categorias',
													'$this->fky_clientes');";

		return $this->run();
	} // fin de create

	function update()
	{

		$this->que_bda = "UPDATE equipos
												SET
													cod_equ='$this->cod_equ',
													ser_equ='$this->ser_equ',
													des_equ='$this->des_equ',
													mar_equ='$this->mar_equ',
													fky_categorias='$this->fky_categorias',
													fky_clientes='$this->fky_clientes',
													
												WHERE
													cod_equ='$this->cod_equ';";

		return $this->run();
	} // fin de update

	function getAll()
	{
		$this->que_bda = "SELECT * FROM equipos;";

		return $this->run();
	} // fin de getAll

	function getByCode()
	{
		$this->que_bda = "SELECT * FROM equipos WHERE cod_equ='$this->cod_equ;'";

		return $this->run();
	} // fin de getByCode

	function getByClient()
	{
		$this->que_bda = "SELECT * FROM equipos WHERE fky_clientes='$this->fky_clientes;'";

		return $this->run();
	} // fin de getByClient

	function delete()
	{
		$this->que_bda = "DELETE FROM equipos
												WHERE
													cod_equ='$this->cod_equ';";

		return $this->run();
	} // fin de delete

	function filter()
	{
		$filter1 = ($this->cod_equ != "") ? "AND cod_equ LIKE '%$this->cod_equ%'" : "";
		$filter2 = ($this->ser_equ != "") ? "AND ser_equ LIKE '%$this->ser_equ%'" : "";
		$filter3 = ($this->des_equ != "") ? "AND des_equ LIKE '%$this->des_equ%'" : "";
		$filter4 = ($this->mar_equ != "") ? "AND mar_equ='$this->mar_equ'" : "";
		$filter5 = ($this->fky_categorias != "") ? "AND fky_categorias='$this->fky_categorias'" : "";
		$filter6 = ($this->fky_clientes != "") ? "AND fky_clientes LIKE '%$this->fky_clientes%'" : "";

		$this->que_bda = "SELECT * FROM equipos WHERE 1=1 $filter1 $filter2 $filter3 $filter4 $filter5 $filter6;";

		return $this->run();
	} // fin de filter

}
