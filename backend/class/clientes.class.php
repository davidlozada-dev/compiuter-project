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
												(nom_cli, 
												ape_cli, 
												ced_cli,
												dir_cli, 
												tel_cli)
											VALUES
												('$this->nom_cli', 
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
													nom_cli='$this->nom_cli',
													ape_cli='$this->ape_cli',
													ced_cli='$this->ced_cli',
													dir_cli='$this->dir_cli',
													tel_cli='$this->tel_cli'
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
		$this->que_bda = "SELECT * FROM clientes WHERE cod_cli='$this->cod_cli';";

		return $this->run();
	} // fin de getByCode

	function getByCedula()
	{
		$this->que_bda = "SELECT * FROM clientes WHERE ced_cli='$this->ced_cli';";

		return $this->run();
	} // fin de getByCedula

	function delete()
	{
		$this->que_bda = "DELETE FROM clientes WHERE cod_cli='$this->cod_cli';";

		return $this->run();
	} // fin de delete

}
