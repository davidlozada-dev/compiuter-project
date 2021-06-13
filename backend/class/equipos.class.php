<?php

require_once("utilidad.class.php");

class equipos extends utilidad
{
	public $cod_equ;
	public $ser_equ;
	public $des_equ;
	public $mar_equ;
	public $fky_categorias;
	public $fky_diagnosticos;

	function create()
	{

		$this->que_bda = "INSERT INTO equipos
													(cod_equ, 
													ser_equ, 
													des_equ, 
													mar_equ,
													fky_categorias, 
													fky_diagnosticos, 
												VALUES
													('$this->cod_equ', 
													'$this->ser_equ', 
													'$this->des_equ', 
													'$this->mar_equ',  
													'$this->fky_categorias',  
													'$this->fky_diagnosticos');";

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
													fky_diagnosticos='$this->fky_diagnosticos',
													
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
		$filter6 = ($this->fky_diagnosticos != "") ? "AND fky_diagnosticos LIKE '%$this->fky_diagnosticos%'" : "";

		$this->que_bda = "SELECT * FROM equipos WHERE 1=1 $filter1 $filter2 $filter3 $filter4 $filter5 $filter6;";

		return $this->run();
	} // fin de filter

}
