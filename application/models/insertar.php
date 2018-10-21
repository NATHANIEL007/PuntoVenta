<?php

class Insertar extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	/***************************************************
	INSERTAR
	**************************************************/

	function insertar($tabla,$data)
	{
		$this->db->insert($tabla, $data);
		return $this->db->insert_id();
	}

	/***************************************************
	ACTUALIZAR
	***************************************************/
	function actualizar($tabla,$data,$where){
		return $this->db->update($tabla,$data,$where);
	}

	/***************************************************
	REMPLAZAR
	***************************************************/
	function remplazar($tabla,$data)
	{
		return $this->db->replace($tabla, $data);
	}

	}
	?>
