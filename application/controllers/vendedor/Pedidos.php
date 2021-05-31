<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Ventas_model");
		if($this->session->userdata("rol") == "0"){
			redirect(base_url()."");
		}

    }

	public function index()
	{
        $res = $this->User_model->getTienda($this->session->userdata("rut_usuario"));
        $data = array(
            'pedidos' => $this->Ventas_model->getOrdenes($res->id_tienda)

        );
		$datatop = array(
			'usuario' => $this->session->userdata("nombre")." ". $this->session->userdata("apellido_p")
		);
		$this->load->view('vendedor/assets/header');
		$this->load->view('vendedor/assets/sidebar');
		$this->load->view('vendedor/assets/topbar',$datatop);
		$this->load->view('vendedor/ventas/pedidos', $data);
		$this->load->view('vendedor/assets/footer');
    }
    public function ver($id_orden){

        $data = array(
            'productos' => $this->Ventas_model->getProductosOrden($id_orden),
            'orden_compra' => $id_orden
        );
        $datatop = array(
			'usuario' => $this->session->userdata("nombre")." ". $this->session->userdata("apellido_p")
		);
		$this->load->view('vendedor/assets/header');
		$this->load->view('vendedor/assets/sidebar');
		$this->load->view('vendedor/assets/topbar', $datatop);
		$this->load->view('vendedor/ventas/pedidos-detalle', $data);
		$this->load->view('vendedor/assets/footer');


    }




}
