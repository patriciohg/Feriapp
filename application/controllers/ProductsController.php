<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductsController extends CI_Controller {

	function  __construct(){
        parent::__construct();    
		$this->load->model('productos_model');
		$this->load->library('cart');
	}

	public function producto($id_prod)
	{
		
		$producto = $this->productos_model->getProducto($id_prod);
		$data = array(
            'producto' => $producto,
            'productosTienda' => $this->productos_model->getProductosTienda($producto["id_tienda"], $producto["id_prod"])
        );
		
		$this->load->view('client/clientHeader');
		$this->load->view('client/contentProductPage', $data);
		$this->load->view('client/clientFooter');

	}
	
}
