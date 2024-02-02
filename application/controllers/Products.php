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
        $data['products'] = $this->db->select('*')
            ->get('products')->result_array();


		$this->load->view('new_product', $data); 
	}

    public function save()
	{	
        require $_SERVER['DOCUMENT_ROOT'] . '/simpleImage/SimpleImage.php';

        //debug($_SERVER['DOCUMENT_ROOT']);


		$post = $this->input->post();

        $insert_array = [];

        //Validasyon eklenebilir
        $insert_array['product_name'] = $post['product_name'];
        $insert_array['product_volume'] = $post['product_volume'];

        foreach($_FILES as $key => $file){
            $file = $_FILES[$key];
            if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
                $img_name = img_seo_name( uniqid().'-'.$post['product_name']).'.jpg';
                $from_file = $file['tmp_name'];
                $to_file = $_SERVER['DOCUMENT_ROOT'] . '/files/' .$img_name;
                $save_image = $this->save_image($from_file,$to_file, 300);
                
                if($save_image == true){
                    $insert_array[$key] = $img_name;
                }
            }
        }

        //debug($insert_array);

        $insert = $this->db->insert('products', $insert_array);

        if($this->db->affected_rows() > 0){
            echo "Kayıt başarılı!";
        }else{
            die("Error");
        }

        

	}

    private function save_image($from_file, $to_file, $width, $height=null){
		try {
		  // Create a new SimpleImage object
		  $image = new \claviska\SimpleImage();

		  // Magic! âœ¨
		  $image
			->fromFile($from_file)                     // load image.jpg
			->autoOrient()                              // adjust orientation based on exif data
			->resize($width, $height)                          // resize to 320x200 pixels
			//->thumbnail($width, $height, 'center')        // resize to 320x200 pixels
			//->flip('x')                                 // flip horizontally
			//->colorize('DarkBlue')                      // tint dark blue
			//->border('black', 10)                       // add a 10 pixel black border
			//->overlay('watermark.png', 'bottom right')  // add a watermark image
			->toFile($to_file, 'image/jpeg') ;     // convert to PNG and save a copy to new-image.png
			//->toScreen();                               // output to the screen
			return true;
		  // And much more! ðŸ’ª
		} catch(Exception $err) {
		  // Handle errors
		  echo $err->getMessage();
		  return false;
		  die();
		}
	}
	
}
