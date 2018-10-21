<?php

class Consultas extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}


	//
	// function miConsulta($valor)
	// {
	// 	$query = $this->db->query("SELECT * FROM tabla WHERE columna = '$valor' ");
	//
	// 	if ($query->num_rows() > 0):
	// 		return $query->result_array();
	// 		return $query->row_array();
	// 		return $query->row();
	// 	else:
	// 		return FALSE;
	// 	endif;
	// }

	function consultaGral($tabla,$columna,$valor,$tipo)
	// tipo 1: puede obtener muchas filas
	// tipo 2: obtendra solo una fila en un arreglo
	// tipo 3: obtendra solo una fila
	{
		$query = $this->db->query("SELECT * FROM $tabla WHERE $columna = '$valor' ");

		if ($query->num_rows() > 0){
			switch ($tipo) {
				case '1':
				return $query->result_array();
				break;
				case '2':
				return $query->row_array();
				break;
				case '3':
				return $query->row();
				break;
			}
		}
		else{
			return FALSE;
		}
	}


}

?>
