<?php
class Ventas_model extends CI_Model{


    public function getOrdenes($id_tienda){
        $query = $this->db->join('courier', 'courier.id_courier = orden_compra.id_courier');
        $query = $this->db->where('id_tienda',$id_tienda);
        $query = $this->db->order_by("orden_compra.id_orden","desc");
        $query = $this->db->get('orden_compra');        
        return $query->result();
    }

	function updateOrden($id,$estado){
    	$this->db->where('id_orden',$id);
     	return $this->db->update('orden_compra',$estado);
	}

    public function getProductosOrden($id_orden){

        $query = $this->db->join('producto', 'producto_orden.id_prod = producto.id_prod');
        $query = $this->db->join('categoria', 'producto.id_categ = categoria.id_categ');
        $query = $this->db->join('multimedia_producto', 'multimedia_producto.id_prod = producto.id_prod');
        $query = $this->db->where('producto_orden.id_orden',$id_orden);
        $query = $this->db->get('producto_orden');
        return $query->result();
    }
}

?>
