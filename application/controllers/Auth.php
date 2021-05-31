<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->model("User_model");

    }


	public function index()
	{
        if ($this->session->userdata("login")) {
			redirect(base_url());
		}
		else{
			$this->load->view('login');
		}
    }
    public function login(){
        $username = $this->input->post("email");
        $password = $this->input->post("password");
        $res =$this->User_model->ValidarUsuario($username, sha1($password));
        if (!$res) {
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
			redirect(base_url()."auth");
		}
		else{
			$data  = array(
				'rut_usuario' => $res->rut_usuario,
				'nombre' => $res->nombre_usuario,
				'apellido_p' => $res->apellido_pat,
				'apellido_m' => $res->apellido_mat,
				'rol' => $res->rol,
				'login' => TRUE
			);
			$this->session->set_userdata($data);
			if($res->rol == $this->session->userdata("rol")){
				redirect(base_url()."vendedor");
			}else{
				redirect(base_url()."");
			}
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."auth");
	}
}
