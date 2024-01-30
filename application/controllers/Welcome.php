<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    public $data = array();
    
	public function index()
	{	
		$this->load->view('home', $data);
	}
	
}
