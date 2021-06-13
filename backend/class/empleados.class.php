<?php

require_once("utilidad.class.php");

class empleados extends utilidad
{
	public $cod_emp;
	public $nom_emp;
	public $ape_emp;
	public $ced_emp;
	public $dir_emp;
	public $tel_emp;
	public $car_emp;

	function create()
	{
		$this->que_bda = "INSERT INTO empleados
												(cod_emp, 
												nom_emp, 
												ape_emp, 
												ced_emp,
												dir_emp, 
												tel_emp, 
												car_emp, 
											VALUES
												('$this->cod_emp', 
												'$this->nom_emp', 
												'$this->ape_emp', 
												'$this->ced_emp',  
												'$this->dir_emp',  
												'$this->tel_emp', 
												'$this->car_emp');";

		return $this->run();
	} // fin de create

	function update()
	{
		$this->que_bda = "UPDATE empleados
												SET
													cod_emp='$this->cod_emp',
													nom_emp='$this->nom_emp',
													ape_emp='$this->ape_emp',
													ced_emp='$this->ced_emp',
													dir_emp='$this->dir_emp',
													tel_emp='$this->tel_emp',
													car_emp='$this->car_emp',
												WHERE
													cod_emp='$this->cod_emp';";

		return $this->run();
	} // fin de update

	/* function updatePassword()
	{
		$clave = sha1($this->cla_emp);

		$this->que_bda = "UPDATE empleados
												SET 
													cla_emp='$clave',
													act_emp='$act_emp'
												WHERE
													cor_emp='$this->cor_emp';";

		return $this->run();
	} // fin de updatePassword */

	/* function changePassword()
	{
		$clave = sha1($this->cla_emp);

		$this->que_bda = "UPDATE empleados
												SET 
													cla_emp='$clave',
													act_emp='$act_emp'
												WHERE
													cod_emp='$this->cod_emp';";

		return $this->run();
	} // fin de changePassword */

	function getAll()
	{
		$this->que_bda = "SELECT * FROM empleados;";

		return $this->run();
	} // fin de getAll

	function getByCode()
	{
		$this->que_bda = "SELECT * FROM empleados WHERE cod_emp='$this->cod_emp;'";

		return $this->run();
	} // fin de getByCode

	/* function getSession($cor_emp, $cla_emp)
	{
		$clave = sha1($cla_emp);

		$this->que_bda = "SELECT cod_emp, cor_emp, cla_emp, cod_car, est_emp, bas_emp 
												FROM 
													empleados 
												WHERE 
													cor_emp='$cor_emp' AND 
													cla_emp='$clave' AND 
													est_emp='A' AND 
													bas_emp='A';";

		return $this->run();
	} // fin de getSession */

	function delete()
	{
		$this->que_bda = "DELETE FROM empleados
												WHERE
													cod_emp='$this->cod_emp';";

		return $this->run();
	} // fin de delete

	function filter()
	{
		$filter1 = ($this->cod_emp != "") ? "AND cod_emp LIKE '%$this->cod_emp%'" : "";
		$filter2 = ($this->nom_emp != "") ? "AND nom_emp LIKE '%$this->nom_emp%'" : "";
		$filter3 = ($this->ape_emp != "") ? "AND ape_emp LIKE '%$this->ape_emp%'" : "";
		$filter4 = ($this->ced_emp != "") ? "AND ced_emp='$this->ced_emp'" : "";
		$filter5 = ($this->dir_emp != "") ? "AND dir_emp='$this->dir_emp'" : "";
		$filter6 = ($this->tel_emp != "") ? "AND tel_emp LIKE '%$this->tel_emp%'" : "";
		$filter7 = ($this->car_emp != "") ? "AND car_emp LIKE '%$this->car_emp%'" : "";

		$this->que_bda = "SELECT * FROM empleados WHERE 1=1 $filter1 $filter2 $filter3 $filter4 $filter5 $filter6 $filter7 ;";

		return $this->run();
	} // fin de filter

}
