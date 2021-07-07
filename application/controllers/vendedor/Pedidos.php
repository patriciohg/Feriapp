<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Ventas_model");
		$this->load->model("Empleados_model");
		if($this->session->userdata("rol") == "0"){
			redirect(base_url()."");
		}

    }

	public function index()
	{
		$rol = $this->User_model->getRolUsuario($this->session->userdata("rut_usuario"))[0]->rol;
			if( $rol == '2'){	//SI LAA CUENTA ES DE EMPLEADO
				$id_tienda = $this->Empleados_model->getTienda($this->session->userdata("rut_usuario"))->id_tienda;	//SE OBTIENE LA TIENDA A LA CUAL TRABAJA
			}else{
				$id_tienda = $this->User_model->getTienda($this->session->userdata("rut_usuario"))->id_tienda;	//SI NO SE INGRESA COMO DUEÑO
		}

        $data = array(
            'pedidos' => $this->Ventas_model->getOrdenes($id_tienda)
        );

		$datatop = array(
			'usuario' => $this->session->userdata("nombre")." ". $this->session->userdata("apellido_p")
		);

		$rol = array (
			'rol' => $rol
		);

		$this->load->view('vendedor/assets/header');
		$this->load->view('vendedor/assets/sidebar', $rol);
		$this->load->view('vendedor/assets/topbar', $datatop);
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
		$rol = $this->User_model->getRolUsuario($this->session->userdata("rut_usuario"))[0]->rol;

		$rol = array (
			'rol' => $rol
		);
		$this->load->view('vendedor/assets/header');
		$this->load->view('vendedor/assets/sidebar', $rol);
		$this->load->view('vendedor/assets/topbar', $datatop);
		$this->load->view('vendedor/ventas/pedidos-detalle', $data);
		$this->load->view('vendedor/assets/footer');


    }

	public function delete($id_orden){
		$estado = array(
			'estado' => "0"
		);
		$res = $this->Ventas_model->updateOrden($id_orden,$estado);
		if($res){
            $this->session->set_flashdata("pedido-success","Se ha cancelado el pedido con éxito.");
			redirect(base_url()."vendedor/pedidos");
        }else{
            $this->session->set_flashdata("pedido-error","Error al actualizar el pedido.");
            redirect(base_url()."vendedor/pedidos");
        }
	}

}
