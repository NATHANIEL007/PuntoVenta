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

	/*******************************************************
	Agregar usuarios, ventas, configuraciones, productos
	*******************************************************/
	function newProveedor($data)
	{
		return $this->db->insert('tb_proveedores', $data);
	}

	function newProducto($data)
	{
		return $this->db->insert('tb_inventario', $data);
	}
	function setProducto($data,$where)
	{
		return $this->db->update('tb_inventario', $data,$where);
	}

	function newUser($data)
	{
		return $this->db->insert('tb_usuarios', $data);
	}

	function newDepartamento($data)
	{
		$this->db->insert('tb_departamentos', $data);
		return $this->db->insert_id();
	}


	function setUser($data,$where)
	{
		return $this->db->update('tb_usuarios', $data,$where);
	}
	function newVenta($data)
	{
		$this->db->insert('tb_ventas', $data);
		return $this->db->insert_id();
	}



	public function setConfig($data)
	{
		return $this->db->update('tb_config', $data);
	}


	}
	?>
