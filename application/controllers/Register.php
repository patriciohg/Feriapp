<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    
    
    public function __construct(){

        parent::__construct();
        $this->load->model("User_model");

    }
	public function index(){
        $data = array(
            'comunas' => $this->User_model->getComunas()
        );
		$this->load->view('register',$data);
    }
    public function register(){
		
		$rut_usuario = $this->input->post("rut_usuario");

        $data_usuario  = array(
            'rut_usuario' => $rut_usuario,
            'nombre_usuario' => $this->input->post("nombre_usuario"),
            'apellido_pat' => $this->input->post("apellido_p"),
            'apellido_mat' => $this->input->post("apellido_m"),
            'email' => $this->input->post("email"),
            'password' => sha1($this->input->post("password")),
            'telefono' => $this->input->post("telefono"),
            'rol' => 0,//vendedor 1, comprador 0, trabajador 2
        );
        $data_direccionUsuario  = array(
            'id_direccion' => null,
            'rut_usuario' => $rut_usuario,
            'id_comuna' => $this->input->post("comuna"),
            'nombre_direccion' => $this->input->post("nombre_direccion"),
            'calle' => $this->input->post("calle"),
            'departamento' => $this->input->post("departamento"),
        );
        $res = $this->User_model->crear_usuario($data_usuario,$data_direccionUsuario);
        if(!$res){
            $this->session->set_flashdata("success","Se ha registrado con exito al nuevo usuario");
			redirect(base_url()."vendedor");
        }else{
            $this->session->set_flashdata("error","error al crear el nuevo usuario.");
            redirect(base_url()."vendedor");
        }
    }
    public function registerTienda(){
        $data = array(
            'comunas' => $this->User_model->getComunas()
        );
        $this->load->view('register-tienda',$data);
    }
    
	public function register_tienda(){
        $data_usuario  = array(
            'rut_usuario' =>$this->input->post("rut_usuario"),
            'nombre_usuario' => $this->input->post("nombre_usuario"),
            'apellido_pat' => $this->input->post("apellido_p"),
            'apellido_mat' => $this->input->post("apellido_m"),
            'email' => $this->input->post("email"),
            'password' => sha1($this->input->post("password")),
            'telefono' => $this->input->post("telefono"),
            'rol' => 1,//vendedor 1, comprador 0, trabajador 2
        );
        $data_direccionUsuario  = array(
            'id_direccion' =>null,
            'rut_usuario' =>$this->input->post("rut_usuario"),
            'id_comuna' => $this->input->post("comuna"),
            'nombre_direccion' => $this->input->post("nombre_direccion"),
            'calle' => $this->input->post("calle"),
            'departamento' => $this->input->post("departamento"),
        );
        $data_tienda = array(
            'id_tienda' =>null,
            'rut_usuario' =>$this->input->post("rut_usuario"),
            'id_comuna' => $this->input->post("comuna"),
            'nombre_tienda' => $this->input->post("nombre_tienda"),
            'desc_tienda' => $this->input->post("descripcion_tienda"),
        );
        $res = $this->User_model->crear_tienda($data_usuario,$data_direccionUsuario,$data_tienda);
        if(!$res){
            $this->session->set_flashdata("success","Se ha registrado con exito su cuenta.");
            $id_tienda = $this->User_model->getTienda($data_tienda->rut_usuario)->id_tienda;  
            $path = getcwd();
            $micarpeta =$path.'/assets/img/tiendas/'.$id_tienda;
            if (!file_exists($micarpeta)) {
                mkdir($micarpeta, 0777, true);
            }
			redirect(base_url()."vendedor");
        }else{
            $this->session->set_flashdata("error","Error al crear su usuario.");
            redirect(base_url()."vendedor");
        }

        
    }
}
