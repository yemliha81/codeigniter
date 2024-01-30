<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    
    public $data = array();
    
	public function index()
	{	
		$data['users'] = $this->db->select('username, password')->get('users')->result_array();

        /* echo "<pre>";
        print_r($data);
        die(); */
        
        $this->load->view('users', $data); //views/users.php dosyasını göstermeye yarar.
	}

    public function form_post(){

        $post = $this->input->post();

        echo "<pre>";
        print_r($post);
        die();

    }
	
}