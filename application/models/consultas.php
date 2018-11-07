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
	//Tampoco se que hace pero selecciona el atributo de nombreEmpresa
	function configNombreEmpresa()
	{
		$sql = "SELECT nombreEmpresa FROM tb_config limit 1";
		$query = $this->db->query($sql);
		$r=$query->row();
		return $r->nombreEmpresa;
	}
	//Aqui hace una consulta de la misma tabla pero con el atributo logo

	function configLogo()
	{
		$sql = "SELECT logo FROM tb_config limit 1";
		$query = $this->db->query($sql);
		$r=$query->row();
		return $r->logo;
	}


	//Aquí supongo que obtiene el id del inventario que se esta seleccionando para consultarlo
	function getInventariobyId($id)
	{
		$sql = "SELECT  *
		FROM tb_inventario
		WHERE id = ?";
		$query = $this->db->query( $sql, array($id) );
		return $query->row_array();
	}
	//Aquí supongo que muestra la consulta de todas las ventas junto con sus llaves foraneas
	function getVentas()
	{
		$sql = "SELECT  vts.id,vts.idUsuario,vts.Total,vts.Fecha,u.nombre as nombreUsuario
		FROM tb_ventas vts
		inner join tb_usuarios u on vts.idUsuario = u.id
		WHERE vts.Total>0";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	//Obtiene los ids de las ventasy la junta con la tabla inventario
	public function getItemsDeVentas($idVenta)
	{
		$sql = "SELECT mv.*, inv.descripcion
		FROM  tb_movimientosventas	mv
		inner join tb_inventario inv on inv.id = mv.idInventario
		WHERE mv.idVenta = ? ";
		$query = $this->db->query( $sql,array($idVenta) );
		return $query->result_array();
	}

	///NO SE PARA QUE TANTO :\

	
	function getDepartamentos($idDepartamento=0)
	{
		if($idDepartamento>0){
			$sql = "SELECT * FROM tb_departamentos WHERE id= ? ";
			$query = $this->db->query($sql , array($idDepartamento) );
			return $query->row_array();
		}
		else {
			$sql = "SELECT * FROM tb_departamentos ORDER BY id ASC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}


	function getTipoVenta()
	{
		$sql = "SELECT * FROM tb_tipos ORDER BY id ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function comprobarCodigo($codigo="")
	{
		$sql = "SELECT * FROM tb_inventario WHERE codigo = ? ";
		$query = $this->db->query($sql , array($codigo));
		if ($query->num_rows() == 0) {
			return false;
		}
		return true;
	}

	public function getUsers($id=0)
	{
		if($id!=0)
		{
			$sql = "SELECT u.*,r.rol
			FROM tb_usuarios u
			inner join tb_roles r on u.idRol = r.id
			Where u.id= ?
			ORDER BY u.nombre ASC";
			$query = $this->db->query( $sql, array($id) );
			return $query->row_array();
		}
		$sql = "SELECT u.*,r.rol
		FROM tb_usuarios u
		inner join tb_roles r on u.idRol = r.id
		ORDER BY u.nombre ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getClientes($id=0)
	{
		if($id!=0)
		{
			$sql = "SELECT * FROM tb_clientes Where id= ?	ORDER BY nombre ASC";
			$query = $this->db->query($sql, array($id) );
			return $query->row_array();
		}
		$sql = "SELECT * FROM tb_clientes ORDER BY nombre ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getRoles()
	{
		$sql = "SELECT * FROM tb_roles";
		$query = $this->db->query($sql);
		return $query->result_array();
	}



	public function comprobarItemEnVenta($idVenta,$idItem)
	{
		$sql = "SELECT * FROM tb_movimientosventas WHERE idVenta = ? AND idInventario = ? ";
		$query = $this->db->query($sql, array($idVenta,$idItem) );
		if ($query->num_rows() == 0) {
			return false;
		}
		return true;
	}

	


	function getMaxIdVentasByUser($idUsuario)
	{
		$sql = "SELECT * FROM tb_ventas WHERE idUsuario = ? ORDER BY id DESC limit 1";
		$query = $this->db->query($sql,array($idUsuario) );
		if ($query->num_rows() == 0) {
			return 0;
		}
		else{
			return $query->row_array();
		}
	}



	public function recaudacionByUserHoy($idUser=0)
	{
		if($idUser!=0){
			$hoy=date('Y-m-d');
			$sqlRecaudado = "SELECT sum(Total) as suma FROM tb_ventas WHERE Fecha >= ? and idUsuario = ? ";
			$queryRecaudado = $this->db->query($sqlRecaudado,array($hoy,$idUser) );
			$recaudado=$queryRecaudado->row();
			$recaudado=$recaudado->suma;
			if($recaudado<=0)$recaudado=0;
			return $recaudado;
		}
	}




	function getVentasPeriodo($fecha1="",$fecha2="")
	{
		$sql = "SELECT  vts.id,vts.idUsuario,vts.Total,vts.Fecha,u.nombre as nombreUsuario
		FROM tb_ventas vts
		inner join tb_usuarios u on vts.idUsuario = u.id
		WHERE vts.Total>0
		and  vts.Fecha > ?
		and vts.Fecha <= ?";
		$query = $this->db->query($sql,array($fecha1." 00:00:00",$fecha2." 23:59:59") );
		return $query->result_array();
	}



	public function recaudacionByUser($fecha1,$fecha2,$idUser=0)
	{
		if($idUser!=0){
			$hoy=date('Y-m-d');
			$sqlRecaudado = "SELECT sum(Total) as suma
			FROM tb_ventas
			WHERE idUsuario = ?
			and  Fecha > ?
			and Fecha<= ? ";
			$queryRecaudado = $this->db->query($sqlRecaudado,array($idUser,$fecha1." 00:00:00",$fecha2." 23:59:59") );
			$recaudado=$queryRecaudado->row();
			$recaudado=$recaudado->suma;
			if($recaudado<=0)$recaudado=0;
			return $recaudado;
		}
	}


	public function getCantidadByProducto($idProducto=0)
	{
		$sql = "SELECT cantidad FROM tb_inventario
		WHERE id = ? ";
		$query = $this->db->query($sql,array($idProducto));
		$r=$query->row();
		return $r->cantidad;
	}

	public function getMonedaString()
	{
		$sql = "SELECT monedaString FROM tb_config";
		$query = $this->db->query($sql);
		$r=$query->row();
		return $r->monedaString;
	}

	public function getTiketera()
	{
		$sql = "SELECT tiketera FROM tb_config";
		$query = $this->db->query($sql);
		$r=$query->row();
		return $r->tiketera;
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
