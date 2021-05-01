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
    
}
