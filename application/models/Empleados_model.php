<?php
class Empleados_model extends CI_Model{


    public function getEmpleados($id_tienda){
        $query = $this->db->join('usuario', 'usuario.rut_usuario = trabajador_tienda.rut_usuario')
				->where('id_tienda',$id_tienda)
				->order_by("trabajador_tienda.fecha_ingreso","desc")
				->get('trabajador_tienda');
        return $query->result();
    }

		public function getTienda($rut_empleado){
        $query = $this->db->select('id_tienda')
				->where('rut_usuario',$rut_empleado)
				->get('trabajador_tienda');
        return $query->row();
    }

	public function getRutEmpleado($rut_empleado){
		$query = $this->db->select('rut_usuario, rol')
		->where('rut_usuario',$rut_empleado)
		->get('usuario');
		return $query->row();
	}

	public function addEmpleado($empleado){
		$query = $this->db->insert("trabajador_tienda",$empleado);
	}
	
	public function updateRolEmpleado($rut_empleado, $rol){
		$this->db->set('rol', $rol)
				->where('rut_usuario', $rut_empleado)
				->update('usuario');
	}

	public function deleteEmpleado($rut_empleado){
    	$this->db->where('rut_usuario',$rut_empleado);
     	return $this->db->delete('trabajador_tienda');
	}

}
?>
