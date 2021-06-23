<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->model("Ventas_model");
		$this->load->model("User_model");
		if($this->session->userdata("rol") == "0"){
			redirect(base_url()."");
		}
    }
	
	public function index()
	{
		if ($this->session->userdata("login")) {
			$id_tienda = $this->User_model->getTienda($this->session->userdata("rut_usuario"))->id_tienda;
			$path = getcwd();
			$micarpeta =$path.'/assets/img/tiendas/'.$id_tienda;
			if (!file_exists($micarpeta)) {
				mkdir($micarpeta, 0777, true);
			}
			
			$pendientes = $this->Ventas_model->getPendientes($id_tienda)[0]->total_pendientes;
			$aprobados = $this->Ventas_model->getAprobados($id_tienda)[0]->total_aprobados;
			$despachados = $this->Ventas_model->getDespachados($id_tienda)[0]->total_despachados;
			$entregados = $this->Ventas_model->getEntregados($id_tienda)[0]->total_entregados;
			$cancelados = $this->Ventas_model->getCancelados($id_tienda)[0]->total_cancelados;	
			
			$total_pedidos = $aprobados + $despachados + $entregados;
			
			$data = array(
				'usuario' => $this->session->userdata("nombre")." ". $this->session->userdata("apellido_p"),
				'ganancias' => $this->Ventas_model->getGanancias($id_tienda)[0]->ganancias,
				'productos' => $this->Ventas_model->getProductosVenta($id_tienda)[0]->total_productos,
				'pedidos' => $total_pedidos,
				'enviados' => ($despachados + $entregados),
				'cancelados' => $cancelados,
				'despachados' => $despachados,
				'pendientes' => $pendientes,
				'aprobados' => $aprobados,
				'entregados' => $entregados,
				'porcentaje_pedidos' => number_format(100 - ($cancelados * 100 / $total_pedidos), 2)
			);
			
			$this->load->view('vendedor/assets/header');
			$this->load->view('vendedor/assets/sidebar');
			$this->load->view('vendedor/assets/topbar',$data);
			$this->load->view('vendedor/dashboard',$data);
			$this->load->view('vendedor/assets/footer');
		}
		else{
			$this->load->view('login');
		}
	}
}
