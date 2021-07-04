<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tiendas_model extends CI_Model{
        
	public function getDataTienda($id_tienda){
		$query = $this->db->select('t.nombre_tienda, t.desc_tienda, c.nombre_comuna, r.nombre_region, t.logo_tienda')
							->join('comuna as c', 't.id_comuna = c.id_comuna', 'left')
							->join('region as r', 'r.id_region = c.id_region', 'left')
							->where('t.id_tienda', $id_tienda)
							->get('tienda as t');
		// Return fetched data
		return $query->row();
	}

}

?>
