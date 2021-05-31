<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model{
    
    function __construct() {
		  $this->productos = 'producto';	//$this->nombrearray = 'nombretabla'
		  $this->tiendas = 'tienda';
		  $this->couriers = 'courier';
    }
    
	public function getidTienda($tienda){
		$this->db->select('id_tienda');
		$this->db->from($this->tiendas);
		$this->db->where('nombre_tienda', $tienda);
		$query = $this->db->get();
		$result = $query->row_array();	
		// Return fetched data
		return $result;
	}

<<<<<<< Updated upstream
=======
	public function get_cant($id_producto, $cantidad){
		$this->db->select('stock_prod');
		$this->db->from($this->productos);
		$this->db->where('id_prod',$id_producto);
		$cant = $this->db->get()->row_array()['stock_prod'];
		$cant=$cant-$cantidad;
		return $cant;


	}
	public function updateProducto($id_producto, $cantidad){
		$this->db->where("id_prod",$id_producto);
		$this->db->set("stock_prod",$this->get_cant($id_producto,$cantidad));
		$this->db->update("producto");
	}

>>>>>>> Stashed changes
	public function setOrdenCompra($orden_compra){
		$this->db->insert('orden_compra', $orden_compra);
		$id_orden = $this->db->insert_id();
		return $id_orden;
	}

	public function updateSubTotal($id_orden, $orden_compra){
		$this->db->where('id_orden', $id_orden);
		$this->db->update('orden_compra', $orden_compra);
	}

	public function setProductoOrden($producto_orden){
		$this->db->insert('producto_orden', $producto_orden);
	}

	public function getCouriers(){
		$this->db->select('*');
		$this->db->from($this->couriers);

		$query = $this->db->get();
		$result = $query->result_array();	

		return $result;
	}

	public function getCourier($id_courier){
		$this->db->select('nombre_courier, logo_courier');
		$this->db->from($this->couriers);
		$this->db->where('id_courier', $id_courier);

		$query = $this->db->get();
		$result = $query->row_array();

		return $result;
	}
}
