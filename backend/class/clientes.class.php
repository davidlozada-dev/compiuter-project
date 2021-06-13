<?php

require_once("utilidad.class.php");

class clientes extends utilidad
{
	public $cod_cli;
	public $nom_cli;
	public $ape_cli;
	public $ced_cli;
	public $dir_cli;
	public $tel_cli;

	function create()
	{
		$this->que_bda = "INSERT INTO clientes
												(cod_cli, 
												nom_cli, 
												ape_cli, 
												ced_cli,
												dir_cli, 
												tel_cli, 
											VALUES
												('$this->cod_cli', 
												'$this->nom_cli', 
												'$this->ape_cli', 
												'$this->ced_cli',  
												'$this->dir_cli',  
												'$this->tel_cli');";

		return $this->run();
	} // fin de create

	function update()
	{
		$this->que_bda = "UPDATE clientes
												SET
													cod_cli='$this->cod_cli',
													nom_cli='$this->nom_cli',
													ape_cli='$this->ape_cli',
													ced_cli='$this->ced_cli',
													dir_cli='$this->dir_cli',
													tel_cli='$this->tel_cli',
												WHERE
													cod_cli='$this->cod_cli';";

		return $this->run();
	} // fin de update

	function getAll()
	{
		$this->que_bda = "SELECT * FROM clientes;";

		return $this->run();
	} // fin de getAll

	function getByCode()
	{
		$this->que_bda = "SELECT * FROM clientes
												WHERE cod_cli='$this->cod_cli;'";

		return $this->run();
	} // fin de getByCode

	function delete()
	{
		$this->que_bda = "DELETE FROM clientes
												WHERE
													cod_cli='$this->cod_cli';";

		return $this->run();
	} // fin de delete

	function filter()
	{
		$filter1 = ($this->cod_cli != "") ? "AND cod_cli LIKE '%$this->cod_cli%'" : "";
		$filter2 = ($this->nom_cli != "") ? "AND nom_cli LIKE '%$this->nom_cli%'" : "";
		$filter3 = ($this->ape_cli != "") ? "AND ape_cli LIKE '%$this->ape_cli%'" : "";
		$filter4 = ($this->ced_cli != "") ? "AND ced_cli='$this->ced_cli'" : "";
		$filter5 = ($this->dir_cli != "") ? "AND dir_cli='$this->dir_cli'" : "";
		$filter6 = ($this->tel_cli != "") ? "AND tel_cli LIKE '%$this->tel_cli%'" : "";

		$this->que_bda = "SELECT * FROM clientes WHERE 1=1 $filter1 $filter2 $filter3 $filter4 $filter5 $filter6;";

		return $this->run();
	} // fin de filter

}
