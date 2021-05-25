<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vendedor extends CI_Controller {
    
    
    public function index()
    {
        $this->load->view('vendedor/header');
        $this->load->view('vendedor/sidebar');
        $this->load->view('vendedor/index');
        $this->load->view('vendedor/footer');
    }

    
}