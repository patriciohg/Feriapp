<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartController extends CI_Controller {

	function  __construct(){
        parent::__construct();    
		$this->load->model('productos_model');
		$this->load->model('cart_model');
		$this->load->library('cart');
	}

	public function index()
	{

		$usuario = array(
			'usuario' => $this->session->userdata("nombre")." ". $this->session->userdata("apellido_p")
		);
		
		$this->load->view('client/clientHeader', $usuario);
		$this->load->view('client/contentCart');
		$this->load->view('client/clientFooter');

	}

	public function addCarrito($id_prod){
		$nuevoProducto = $this->productos_model->getProducto($id_prod);
		$data = array(
			'id'      => $nuevoProducto["id_prod"],
			'qty'     => 1,
			'price'   => $nuevoProducto["precio_prod_act"],
			'name'    => $nuevoProducto["nombre_prod"],
			'imagen' => $nuevoProducto["arch_multi"],
			'categoria' => $nuevoProducto["nombre_categ"],
			'tienda' => $nuevoProducto["nombre_tienda"]
		);
		if($this->cart->insert($data)){
			redirect('http://localhost/feriapp/'); //ver como hacer que retorne al mismo lugar donde esta el usuario
		}
			
	}

	public function reiniciarCarro(){
		$this->cart->destroy();
		redirect('http://localhost/feriapp/cart');
	}

	public function removeCarrito($id_prod, $cant){
		$update = 0;
        
        // Update item in the cart
        if(!empty($id_prod) && !empty($cant)){
            $data = array(
                'rowid' => $id_prod,
                'qty'   => ($cant - 1)
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        redirect('http://localhost/feriapp/cart');

	}

	public function preCheckout(){
		$data['couriers'] = $this->cart_model->getCouriers();

		$usuario = array(
			'usuario' => $this->session->userdata("nombre")." ". $this->session->userdata("apellido_p")
		);

		$this->load->view('client/clientHeader', $usuario);
		$this->load->view('client/checkoutPage', $data);
		$this->load->view('client/clientFooter');
	}

	public function unique_multidim_array($array, $key) {
		$temp_array = array();
		$i = 0;
		$key_array = array();
	   
		foreach($array as $val) {
			if (!in_array($val[$key], $key_array)) {
				$key_array[$i] = $val[$key];
				$temp_array[$i] = $val;
			}
			$i++;
		}
		return $temp_array;
	}

	public function checkout(){
		//var_dump($this->cart);
		$tiendas = $this->unique_multidim_array($this->cart->contents(),'tienda');
		$i = 0;
		$orden_compra = array();
		$producto_orden = array();
		foreach ($tiendas as $tienda) {
			$subtotal = 0;
			$id_tienda = $this->cart_model->getidTienda($tienda['tienda']);		//get id de la tienda desde BD
			$orden_compra[$i] = array(
				'rut_usuario' => 21381717,
				'id_tienda' => $id_tienda["id_tienda"],
				'id_courier' => $this->input->post('courier'),
				'fecha_compra' => date('Y-m-d H:i:s'),
				'total' => 0
			);
			$id_orden = $this->cart_model->setOrdenCompra($orden_compra[$i]);	//INSERT A LA TABLA ORDEN COMPRA POR CADA TIENDA
			$j = 0;
			foreach ($this->cart->contents() as $producto) {
				if($producto['tienda'] == $tienda['tienda']){
					$subtotal += ($producto['price'] * $producto['qty']);
					$producto_orden[$j] = array(
						'id_orden' => $id_orden,
						'id_prod' => $producto['id'],
						'cantidad' => $producto['qty']
					);

					$result = $this->productos_model->getProducto($producto['id']);
					$venta = array(
						'stock_prod' => ($result['stock_prod'] - $producto['qty']),
						'cant_ventas' => ($result['cant_ventas'] + $producto['qty'])
					);

					$this->productos_model->updateProd($producto['id'], $venta);
					$this->cart_model->setProductoOrden($producto_orden[$j]);	//INSERT A LA TABLA PRODUCTO ORDEN POR CADA PRODUCTO
				}
				$j++;
			}
			$orden_compra[$i]['total'] = $subtotal;
			$this->cart_model->updateSubTotal($id_orden, $orden_compra[$i]);	//UPDATE A LA TABLA ORDEN COMPRA CON EL TOTAL POR TIENDA
			$i++;
		}

		$data = array(
			'tipoDelivery' => $this->input->post('deliveryMethod'),
			'metodoPago' => $this->input->post('paymentMethod'),
			'carrito' => $this->cart->contents(),
			'montoTotal' => $this->cart->total(),
			'courier' => $this->cart_model->getCourier($this->input->post('courier'))
		);

		$usuario = array(
			'usuario' => $this->session->userdata("nombre")." ". $this->session->userdata("apellido_p")
		);
		
		$this->cart->destroy();
		
		$this->load->view('client/clientHeader', $usuario);
		$this->load->view('client/contentBoleta', $data);
		$this->load->view('client/clientFooter');
		//var_dump($data);
		//redirect('http://localhost/feriapp/');

	}

}
