<?php
class Ventas_model extends CI_Model{


    public function getOrdenes($id_tienda){
        $query = $this->db->join('courier', 'courier.id_courier = orden_compra.id_courier')
				->where('id_tienda',$id_tienda)
				->order_by("orden_compra.id_orden","desc")
				->get('orden_compra');
        return $query->result();
    }

	function updateOrden($id,$estado){
    	$this->db->where('id_orden',$id);
     	return $this->db->update('orden_compra',$estado);
	}

    public function getProductosOrden($id_orden){

        $query = $this->db->join('producto', 'producto_orden.id_prod = producto.id_prod')
				->join('categoria', 'producto.id_categ = categoria.id_categ')
				->join('multimedia_producto', 'multimedia_producto.id_prod = producto.id_prod')
				->where('producto_orden.id_orden',$id_orden)
				->get('producto_orden');
        return $query->result();
    }

	public function getGanancias($id_tienda){
        $query = $this->db->select_sum('total','ganancias')
				->where('id_tienda',$id_tienda)
				->where('estado !=', 0)
				->where('estado !=', 1)
				->get('orden_compra');
        return $query->result();
    }

	public function getProductosVenta($id_tienda){

        $query = $this->db->select('count(id_prod) as total_productos')
				->where('id_tienda',$id_tienda)
				->where('estado','1')
				->get('producto');
        return $query->result();
    }

	//ESTADOS DE LOS PEDIDOS

	public function getPedidos($id_tienda){
        $query = $this->db->select('count(id_orden) as total_pedidos')
				->where('id_tienda',$id_tienda)
				->where('estado !=', 0)
				->get('orden_compra');
        return $query->result();
    }

	public function getCancelados($id_tienda){

        $query = $this->db->select('count(id_orden) as total_cancelados')
				->where('id_tienda',$id_tienda)
				->where('estado','0')
				->get('orden_compra');
        return $query->result();
    }

	public function getPendientes($id_tienda){

        $query = $this->db->select('count(id_orden) as total_pendientes')
				->where('id_tienda',$id_tienda)
				->where('estado','1')
				->get('orden_compra');
        return $query->result();
    }

	public function getAprobados($id_tienda){

        $query = $this->db->select('count(id_orden) as total_aprobados')
				->where('id_tienda',$id_tienda)
				->where('estado','2')
				->get('orden_compra');
        return $query->result();
    }

	public function getDespachados($id_tienda){

        $query = $this->db->select('count(id_orden) as total_despachados')
				->where('id_tienda',$id_tienda)
				->where('estado','3')
				->get('orden_compra');
        return $query->result();
    }

	public function getEntregados($id_tienda){

        $query = $this->db->select('count(id_orden) as total_entregados')
				->where('id_tienda',$id_tienda)
				->where('estado','4')
				->get('orden_compra');
        return $query->result();
    }
}

?>
