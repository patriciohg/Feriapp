<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos_model extends CI_Model{
    
    function __construct() {
		  $this->productos = 'producto';	//$this->nombrearray = 'nombretabla'
		  $this->categorias = 'categoria';
		  $this->tiendas = 'tienda';
		  $this->imagenes = 'multimedia_producto';
    }
    
    /*
     * Fetch products data from the database
     * @param id returns a single record if specified, otherwise all records
     */
	public function getRows(){
		$this->db->select('p.*, c.nombre_categ, t.nombre_tienda, i.arch_multi');
		$this->db->from($this->productos.' as p');
		$this->db->join($this->categorias.' as c', 'c.id_categ = p.id_categ', 'left');
		$this->db->join($this->tiendas.' as t', 't.id_tienda = p.id_tienda', 'left');
		$this->db->join($this->imagenes.' as i', 'i.id_prod = p.id_prod', 'left');
		$this->db->where('p.estado',"1");
		$this->db->where('p.stock_prod >',"0");
		
		$this->db->order_by('nombre_prod', 'asc');
		$query = $this->db->get();
		$result = $query->result_array();
		// Return fetched data
		return $result;
	}

	public function getProducto($id_prod){
		$this->db->select('p.*, c.nombre_categ, t.nombre_tienda, t.desc_tienda, i.arch_multi');
		$this->db->from($this->productos.' as p');
		$this->db->join($this->categorias.' as c', 'c.id_categ = p.id_categ', 'left');
		$this->db->join($this->tiendas.' as t', 't.id_tienda = p.id_tienda', 'left');
		$this->db->join($this->imagenes.' as i', 'i.id_prod = p.id_prod', 'left');
		$this->db->where('p.estado',"1");
		$this->db->where('p.id_prod', $id_prod);
		$query = $this->db->get();
		$result = $query->row_array();	
		// Return fetched data
		return $result;
	}

	public function getProductosTienda($id_tienda, $id_prod){
		$this->db->select('p.*, c.nombre_categ, i.arch_multi');
		$this->db->from($this->productos.' as p');
		$this->db->join($this->categorias.' as c', 'c.id_categ = p.id_categ', 'left');
		$this->db->join($this->tiendas.' as t', 't.id_tienda = p.id_tienda', 'left');
		$this->db->join($this->imagenes.' as i', 'i.id_prod = p.id_prod', 'left');
		$this->db->where('t.id_tienda', $id_tienda);
		$this->db->where('p.id_prod !=', $id_prod);
		$this->db->order_by('nombre_prod', 'asc');
		$query = $this->db->get();
		$result = $query->result_array();
		// Return fetched data
		return $result;
	}
    
   	function getProductos($id_tienda){//función que obtiene los productos
        $query = $this->db->select('*');
        $query = $this->db->join('categoria', 'producto.id_categ = categoria.id_categ');
        $query = $this->db->join('multimedia_producto', 'producto.id_prod = multimedia_producto.id_prod');
        $query = $this->db->where('producto.id_tienda',$id_tienda);
        $query = $this->db->where('producto.estado',"1");
        $res = $this->db->get('producto');
        return $res->result();
   	}
   
 	function storeProd($producto){//función que guarda los nuevos productos
        $query = $this->db->insert("producto",$producto);
        return $this->db->insert_id();
  	}
   
 	function getProductoById($id_prod){
		$query = $this->db->select('*');
		$query = $this->db->join('categoria', 'producto.id_categ = categoria.id_categ');
		$query = $this->db->join('multimedia_producto', 'producto.id_prod = multimedia_producto.id_prod');
		$query = $this->db->where('producto.id_prod',$id_prod);
		$res = $this->db->get('producto');
		return $res->row();
	}
	   
   	function updateProd($id,$prod){
    	$this->db->where('id_prod',$id);
     	return $this->db->update('producto',$prod);
	}
	   
   	function storeImgProd($imgProd){
    	$query = $this->db->insert("multimedia_producto",$imgProd);
    	return $query;
   	}

}

?>
