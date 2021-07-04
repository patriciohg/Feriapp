<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TiendasController extends CI_Controller {

	public function __construct(){

        parent::__construct();
        $this->load->model("Tiendas_model");
		$this->load->model("Productos_model");

    }

	public function tienda($id_tienda)
	{

		$tienda = $this->Tiendas_model->getDataTienda($id_tienda);

		$usuario = array(
			'usuario' => $this->session->userdata("nombre")." ". $this->session->userdata("apellido_p")
		);

		if(empty($tienda)){
			$data = array(
				'heading' => "Tienda no encontrada.",
				'message' => "La tienda que busca no existe."
			);

			$this->load->view('client/clientHeader', $usuario);
			$this->load->view('errors/html/error_404', $data);
			$this->load->view('client/clientFooter');
		}else{
			$data = array(
				'tienda' => $tienda,
				'productosTienda' => $this->Productos_model->getProductos($id_tienda)
			);
			$this->load->view('client/clientHeader', $usuario);
			$this->load->view('client/contentTienda', $data);
			$this->load->view('client/clientFooter');
		}
	
	}
	
}
