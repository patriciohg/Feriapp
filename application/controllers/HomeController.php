<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	function  __construct(){
        parent::__construct();
        
        $this->load->model('productos_model');
	}
	
	public function index()
	{
		$data['productos'] = $this->productos_model->getRows();

		$this->load->view('client/clientHeader');
		$this->load->view('client/contentHomepage', $data);
		$this->load->view('client/clientFooter');

	}
}
