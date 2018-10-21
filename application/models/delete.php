<?php

class Delete extends CI_Model
{

	function __construct()
    {
		parent::__construct();
    }


    function eliminar($tabla,$where)
    {
        return $this->db->delete($tabla, $where);
    }

		function eliminarId($tabla,$id)
    {
        return $this->db->delete($tabla, array('id'=>$id));
    }

    function truncar($tabla)
    {
        $this->db->truncate($tabla);
    }

}
?>
