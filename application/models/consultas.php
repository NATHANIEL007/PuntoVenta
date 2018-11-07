<?php

class Consultas extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	//Consulta de tabla de usuarios y de tabla de inventarios
	public function consultasIniciales()
	{
		$sqlUsuarios = "SELECT id FROM tb_usuarios";
		$queryUsuarios = $this->db->query($sqlUsuarios);
		$usuarios=$queryUsuarios->num_rows();

		$sqlArticulos = "SELECT id FROM tb_inventario";
		$queryArticulos = $this->db->query($sqlArticulos);
		$articulos=$queryArticulos->num_rows();

		$hoy=date('Y-m-d');
		$sqlRecaudado = "SELECT sum(Total) as suma FROM tb_ventas WHERE Fecha >= '$hoy'";
		$queryRecaudado = $this->db->query($sqlRecaudado);
		$recaudado=$queryRecaudado->row();
		$recaudado=$recaudado->suma;
		$valores=array(
			'articulos'=>$articulos,
			'recaudado'=>$recaudado,
			'usuarios'=>$usuarios,
			'creditos'=>0
		);
		return $valores;
	}
	//Consulta para validar el inicio de sesión
	function isUser($user, $pass)
	{
		$sql = "SELECT * FROM tb_usuarios WHERE username = ? ";
		$query = $this->db->query( $sql, array($user) );
		if ($query->num_rows() > 0) {
			$sql = "SELECT * FROM tb_usuarios WHERE username = ? and pass = ? ";
			$query = $this->db->query($sql, array($user,$pass) );
			if ($query->num_rows() > 0) {
				return '1';
			} else {
				return 'Contraseña incorrecta';
			}
		} else {
			return 'Usuario no encontrado';
		}
	}

	//Consulta para buscar un usuario dentro de la base de datos

	function findIdUser($user, $pass)
	{
		$sql = "SELECT * FROM tb_usuarios WHERE username = ? AND pass= ? ";
		$query = $this->db->query($sql,array($user,$pass));
		return $query->row();
	}
	//Consulta para verificar si existe un usuario
	function existeUsername($user)
	{
		$sql = "SELECT id FROM tb_usuarios WHERE username = ? ";
		$query = $this->db->query($sql,array($user));
		if ($query->num_rows() == 0) {
			return false;
		}
		return true;
	}


	//Es otra consulta para ver las configuraciones
	function getConfigs()
	{
		$sql = "SELECT * FROM tb_config limit 1";
		$query = $this->db->query($sql);
		return $r=$query->row();
	}
	//////////////////////////////////////////////NO SE QUE HACE ESTA COSA
	function configImpuesto()
	{
		$sql = "SELECT tema FROM tb_config limit 1";
		$query = $this->db->query($sql);
		$r=$query->row();
		return $r->tema;
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
