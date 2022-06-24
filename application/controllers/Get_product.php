<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Get_product extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        // $this->load->model('Mod_product');
        $this->load->database();
    }
     
    public function index_get(){
        // $response = $this->Mod_product->get_product();
        // $this->response($response);

        $id = $this->get('id_customer');
        $id="Env00013";
        if ($id == '') {
            $kontak = $this->db->get('ms_customer')->result();
        } else {
            $this->db->where('id_customer', $id);
            $kontak = $this->db->get('ms_customer')->result();
        }
        $this->response($kontak, 200);

    }


    
    function index_post() {
        $data = array(
                    'id'           => $this->post('id'),
                    'nama'          => $this->post('nama'),
                    'nomor'    => $this->post('nomor'));
        $insert = $this->db->insert('telepon', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'id'       => $this->put('id'),
                    'nama'          => $this->put('nama'),
                    'nomor'    => $this->put('nomor'));
        $this->db->where('id', $id);
        $update = $this->db->update('telepon', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    	//Menghapus salah satu data kontak
	function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('telepon');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
} 
?>