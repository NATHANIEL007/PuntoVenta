<?php

class Delete extends CI_Model
{

	function __construct()
    {
		parent::__construct();
    }
    //Eliminar un usuario de la tabla de usuarios :O

   function delUser($id)
    {
        return $this->db->delete('tb_usuarios', array('id' => $id));
    }
    //Eliminar una venta
    function delMovimiento($idVenta,$idItem)
    {
        return $this->db->delete('tb_movimientosventas', array('idVenta' => $idVenta,'idInventario'=>$idItem));
    }

}
?>
