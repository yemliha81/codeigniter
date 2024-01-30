<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public $data = array();
    
	public function index()
	{	
		$this->load->view('login'); //views/login.php dosyasını göstermeye yarar.
	}

    public function login_post()
	{	
		$post = $this->input->post();

        $db_check = $this->db->select('*')
            ->where('username', $post['username'])
            ->where('password', md5($post['password']))
            ->get('users')->row_array();
        
        if(!empty($db_check)){
            //Sonuç bulundu
            $_SESSION['logged_in'] = 1;
            $_SESSION['username'] = $post['username'];

            redirect(PRODUCTS_PAGE);
        } else{
            echo "Hata";
        }   
        
        //$this->load->view('login'); //views/login.php dosyasını göstermeye yarar.
	}

    public function signup(){
        $this->load->view('signup');
    }

    public function signup_post()
	{	
		$post = $this->input->post();

        $insert_array = [];

        $insert_array['username'] = $post['username'];
        $insert_array['full_name'] = $post['full_name'];
        $insert_array['password'] = md5($post['password']);

        $insert = $this->db->insert('users', $insert_array);

        if($this->db->affected_rows() > 0){
           $_SESSION['logged_in'] = 1;
           $_SESSION['username'] = $post['username'];

            redirect(PRODUCTS_PAGE);

        }else{
            echo "Kayıt başarısız";
        }
        
        //$this->load->view('login'); //views/login.php dosyasını göstermeye yarar.
	}
	
}
