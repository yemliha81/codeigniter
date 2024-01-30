<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    
    public $data = array();
    
	public function create_product()
	{	
		$this->load->view('create_product'); //views/create_product.php dosyasını göstermeye yarar.
	}

    public function new_product()
	{	
		$this->load->view('new_product'); //views/new_product.php dosyasını göstermeye yarar.
	}
	
}
