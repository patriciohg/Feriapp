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

		$id_tienda = $this->User_model->getTienda($this->session->userdata("rut_usuario"))->id_tienda;
		$path = getcwd();
		$micarpeta =$path.'/assets/img/tiendas/'.$id_tienda;
		if (!file_exists($micarpeta)) {
			mkdir($micarpeta, 0777, true);
		}
		$data = array(
			'usuario' => $this->session->userdata("nombre")." ". $this->session->userdata("apellido_p")
		);
		
		$this->load->view('vendedor/assets/header');
		$this->load->view('vendedor/assets/sidebar');
		$this->load->view('vendedor/assets/topbar',$data);
		$this->load->view('vendedor/assets/footer');
		/*
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');*/
	}
}
