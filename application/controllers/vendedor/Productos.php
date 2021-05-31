<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata("rol") == "0"){
			redirect(base_url()."");
		}
		$this->load->helper('url');
		$this->load->model("Productos_model");
		$this->load->model("Categorias_model");
		$this->load->model("User_model");
		//$this->session->userdata("rut_usuario");
	}
	public function index(){	
		$res = $this->User_model->getTienda($this->session->userdata("rut_usuario"));
		$data = array(
			'productos'=>$this->Productos_model->getProductos($res->id_tienda)
		);

		//
		$datatop = array(
			'usuario' => $this->session->userdata("nombre")." ". $this->session->userdata("apellido_p")
		);
		$this->load->view('vendedor/assets/header');
		$this->load->view('vendedor/assets/sidebar');
		$this->load->view('vendedor/assets/topbar',$datatop);
		$this->load->view('vendedor/productos/productos',$data);
		$this->load->view('vendedor/assets/footer');

	}
	public function add(){	
		$data = array(
			'categorias' => $this->Categorias_model->getCategorias(),
		);
		$datatop = array(
			'usuario' => $this->session->userdata("nombre")." ". $this->session->userdata("apellido_p")
		);
		$this->load->view('vendedor/assets/header');
		$this->load->view('vendedor/assets/sidebar');
		$this->load->view('vendedor/assets/topbar',$datatop);
		$this->load->view('vendedor/productos/add',$data);
		$this->load->view('vendedor/assets/footer');

	}

	public function store(){
		$res = $this->User_model->getTienda($this->session->userdata("rut_usuario"));
		$id_tienda = $res->id_tienda;
		$producto = array(
			'id_prod'=> null,
			'id_tienda' => $id_tienda,
			'nombre_prod'=> $this->input->post("nombre"),
			'desc_prod'=> $this->input->post("descripcion"),
			'id_categ'=> $this->input->post("categoria"),
			'precio_prod_act'=> $this->input->post("precio"),
			'stock_prod'=> $this->input->post("stock"),
			'precio_prod_ant'=> $this->input->post("precio"),
			'cant_ventas'=> 0,
			'oferta'=> 0,
			'estado' => 1

		);
		/* Guardar la imagen */
		$id_prod = $this->Productos_model->storeProd($producto);
		if($id_prod != null){
			$imagen = $this->input->post('nombre').".jpg";
			$imagen = str_replace(" ", "_", $imagen);
			$imgProd = array(
				'id_multi' => null,
				'id_prod' => $id_prod,
				'nombre_multi'=> $imagen,
				'desc_multi' =>$this->input->post("descripcion"),
				'arch_multi' =>"/".$id_tienda."/".$imagen
	
			);
			if($this->Productos_model->storeImgProd($imgProd)){
				$config= array(
					'upload_path' => FCPATH."assets/img/imgTiendas/".$id_tienda,
					'file_name' => $imagen,
					'allowed_types' => "jpg|jpeg",
					'overwrite' => TRUE, 
					'max_size' => "2048000",
					'max_height' => "2000",
					'max_width' => "2000"
				);
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('userfile')){
					$this->session->set_flashdata("producto-success","Se ha guardado con exito el nuevo producto");
					redirect(base_url(). "vendedor/productos");
				}else{
					$this->session->set_flashdata("error","No se pudo cargar la imagen<br>".$this->upload->display_errors() );
					redirect(base_url(). "vendedor/productos");
				}
			}	
		}else{	
            $this->session->set_flashdata("error","No se pudo ingresar lo datos a la base de datos. <br>");
			redirect(base_url(). "vendedor/productos/add");
		}

	}
	public function edit($id_prod){
		$data = array(
			'producto' => $this->Productos_model->getProductoById($id_prod),
			'categorias' => $this->Categorias_model->getCategorias()
		);
		$datatop = array(
			'usuario' => $this->session->userdata("nombre")." ". $this->session->userdata("apellido_p")
		);
		$this->load->view('vendedor/assets/header');
		$this->load->view('vendedor/assets/sidebar');
		$this->load->view('vendedor/assets/topbar',$datatop);
		$this->load->view('vendedor/productos/edit',$data);
		$this->load->view('vendedor/assets/footer');
	}
	public function update($id_prod){
		$prod = $this->Productos_model->getProductoById($id_prod);
		$data = array(
			'id_prod' => $id_prod,
			'id_tienda' => $prod->id_tienda,
			'id_categ'=> $this->input->post("categoria"),
			'nombre_prod'=> $this->input->post("nombre"),
			'desc_prod'=> $this->input->post("descripcion"),
			'precio_prod_act'=> $this->input->post("precio_act"),
			'precio_prod_ant'=> $prod->precio_prod_act,
			'stock_prod'=> $this->input->post("stock"),
			'cant_ventas'=> $prod->cant_ventas,
			'oferta'=> $prod->oferta,
			'estado' => $prod->estado
		);
		$res = $this->Productos_model->updateProd($id_prod,$data);
		if($res){
            $this->session->set_flashdata("producto-success","Se ha guardado con exito el cambio en el producto");
			redirect(base_url()."vendedor/productos");
        }else{
            $this->session->set_flashdata("producto-error","error al actualizar el producto.");
            redirect(base_url()."vendedor/productos");
        }
	}
	public function delete($id_prod){
		$prod = array(
			'estado' => "0"
		);
		$res = $this->Productos_model->updateProd($id_prod,$prod);
		if($res){
            $this->session->set_flashdata("producto-success","Se ha guardado con exito el cambio en el producto");
			redirect(base_url()."vendedor/productos");
        }else{
            $this->session->set_flashdata("producto-error","error al actualizar el producto.");
            redirect(base_url()."vendedor/productos");
        }

	}
	public function oferta($id_prod){
		$data = array(
			'producto' => $this->Productos_model->getProductoById($id_prod),
			'categorias' => $this->Categorias_model->getCategorias()
		);
		$datatop = array(
			'usuario' => $this->session->userdata("nombre")." ". $this->session->userdata("apellido_p")
		);
		$this->load->view('vendedor/assets/header');
		$this->load->view('vendedor/assets/sidebar');
		$this->load->view('vendedor/assets/topbar',$datatop);
		$this->load->view('vendedor/productos/oferta',$data);
		$this->load->view('vendedor/assets/footer');
	}

	public function crear_oferta($id_prod){
		$prod = $this->Productos_model->getProductoById($id_prod);
		$data = array(
			'id_prod' => $id_prod,
			'id_tienda' => $prod->id_tienda,
			'id_categ'=> $prod->id_categ,
			'nombre_prod'=> $prod->nombre_prod,
			'desc_prod'=> $prod->desc_prod,
			'precio_prod_act'=> $this->input->post("precio_act"),
			'precio_prod_ant'=> $prod->precio_prod_act,
			'stock_prod'=> $prod->stock_prod,
			'cant_ventas'=> $prod->cant_ventas,
			'oferta'=> 1,
			'estado' => $prod->estado
		);
		$res = $this->Productos_model->updateProd($id_prod,$data);
		if($res){
            $this->session->set_flashdata("producto-success","Se ha guardado con la oferta del producto");
			redirect(base_url()."vendedor/productos");
        }else{
            $this->session->set_flashdata("producto-error","error al actualizar el producto.");
            redirect(base_url()."vendedor/productos");
        }


	}

}
