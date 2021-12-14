<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Empleados_model");
		if($this->session->userdata("rol") == "0"){
			redirect(base_url()."");
		}

    }

	public function index()
	{
        $res = $this->User_model->getTienda($this->session->userdata("rut_usuario"));
        $data = array(
            'empleados' => $this->Empleados_model->getEmpleados($res->id_tienda)
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
		$this->load->view('vendedor/assets/topbar',$datatop);
		$this->load->view('vendedor/empleados/empleados', $data);
		$this->load->view('vendedor/assets/footer');
    }

	public function add(){	

		$datatop = array(
			'usuario' => $this->session->userdata("nombre")." ". $this->session->userdata("apellido_p")
		);

		$rol = $this->User_model->getRolUsuario($this->session->userdata("rut_usuario"))[0]->rol;

		$rol = array (
			'rol' => $rol
		);
		
		$this->load->view('vendedor/assets/header');
		$this->load->view('vendedor/assets/sidebar', $rol);
		$this->load->view('vendedor/assets/topbar',$datatop);
		$this->load->view('vendedor/empleados/add');
		$this->load->view('vendedor/assets/footer');

	}

	public function store(){

		$res = $this->User_model->getTienda($this->session->userdata("rut_usuario"));
		$id_tienda = $res->id_tienda;
		$rut_empleado = $this->input->post("rut_usuario");

		$empleado = array(
			'rut_usuario'=> $rut_empleado,
			'id_tienda' => $id_tienda,
			'fecha_ingreso' => date('y-m-d')	//fecha actual del sistema
		);

		$empleadoValido = $this->Empleados_model->getRutEmpleado($rut_empleado);

		if($empleadoValido == null){
			$this->session->set_flashdata("empleado-error","El usuario ingresado no existe. Recuerde que su empleado debe poseer una cuenta en Ezmart Buy.");
			redirect(base_url()."vendedor/empleados/add");
		}else{
			if($empleadoValido->rol == 0){
				$this->Empleados_model->addEmpleado($empleado);	//se agrega el empleado a la tabla
				$this->Empleados_model->updateRolEmpleado($rut_empleado, 2);	//se actualiza el rol del usuario
				$this->session->set_flashdata("empleado-success","El usuario ha sido agregado como su empleado con éxito.");
				redirect(base_url()."vendedor/empleados/add");
			}else{
				$this->session->set_flashdata("empleado-error","El usuario ingresado no se encuentra disponible para contratar.");
				redirect(base_url()."vendedor/empleados/add");
			}
		}
	}

	public function delete($rut_empleado){

		$this->Empleados_model->updateRolEmpleado($rut_empleado, 0);
		$delete = $this->Empleados_model->deleteEmpleado($rut_empleado);

		if($delete){
            $this->session->set_flashdata("empleado-success","Se han quitado los permisos de empleado al usuario con éxito.");
			redirect(base_url()."vendedor/empleados");
        }else{
            $this->session->set_flashdata("empleado-error","Error al quitar los permisos del usuario.");
            redirect(base_url()."vendedor/empleados");
        }
	}

/*
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
*/
}
