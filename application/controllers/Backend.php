<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        //$this->output->clear_all_cache();
        $this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
       $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
       $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
       $this->output->set_header('Pragma: no-cache');
        // Disable caching
       
    }
    
    public function index(){
       $this->load->view('spa');
    }

    public function get_products() {

        sleep(1);

        $products = $this->db->select('*')
            ->order_by('id', 'DESC')
          ->get('products')->result_array();
  
          echo json_encode($products);
  
    }

    public function get_product($id){

        $product = $this->db->select('*')
        ->where('id', $id)
        ->get('products')->row_array();

        echo json_encode($product);

    }

    public function update_product(){

        $post = $this->input->post();

        if($post['id'] == 0){
            $insert_array['product_name_tr'] = $post['name'];
            $insert_array['description_tr'] = $post['description'];
            $insert_array['price'] = $post['price'];

            $this->db->insert('products', $insert_array);
        }else{
            
            $update_array['product_name_tr'] = $post['name'];
            $update_array['description_tr'] = $post['description'];
            $update_array['price'] = $post['price'];
            $where = ['id' => $post['id']];
    
            $this->db->update('products', $update_array, $where);
        }

        //debug($post);

        if($this->db->affected_rows() > 0){
            echo "success";
        }else{
            echo "error";
        }

    }

    public function delete_product($id){
        $this->db->delete('products', array('id' => $id));
        
        if($this->db->affected_rows() > 0){
            echo "success";
        }else{
            echo "error";
        }
    }


}