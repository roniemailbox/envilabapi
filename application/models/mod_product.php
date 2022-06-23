<?php
  
Class Mod_product extends CI_Model
{
   public function get_product()
   {
      $this->db->order_by('id_customer', 'ASC');
      $query = $this->db->get('ms_customer');
 
      if ($query->num_rows() > 0) {
         $response = array();
         $response['error'] = false;
         $response['message'] = 'Success get Customer';
 
         foreach ($query->result() as $row) {
            //$harga = $row->catalog_harga;
            $tempArray = array();
            $tempArray['id_customer'] = $row->id_customer;
            $tempArray['nama'] = $row->nama;
            $tempArray['alamt'] = $row->alamat;
            $response['data'][] = $tempArray;
         }
         return $response;
      }
      return false;
   }
}