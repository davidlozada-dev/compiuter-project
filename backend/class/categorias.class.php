<?php

require_once("utilidad.class.php");

class categorias extends utilidad
{
	public $cod_cat;
	public $nom_cat;

	function create()
	{
		$this->que_bda = "INSERT INTO categorias (nom_cat) VALUES('$this->nom_cat');";

		return $this->run();
	} // fin de create

	function update()
	{
		$this->que_bda = "UPDATE categorias
												SET
													nom_cat='$this->nom_cat'
												WHERE
													cod_cat='$this->cod_cat';";

		return $this->run();
	} // fin de update

	function getAll()
	{
		$this->que_bda = "SELECT * FROM categorias;";

		return $this->run();
	} // fin de getAll

	function getByCode()
	{
		$this->que_bda = "SELECT * FROM categorias WHERE cod_cat='$this->cod_cat;'";

		return $this->run();
	} // fin de getByCode

	function delete()
	{
		$this->que_bda = "DELETE FROM categorias WHERE cod_cat='$this->cod_cat';";

		return $this->run();
	} // fin de delete

}
