<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {

    var $table = "mst_surat";
    var $primary_key = "id";
    

    public function __construct() {
        parent::__construct();
    }

    public function getdata(){
      
       $result =$this->db->select('*')
                ->from('mst_surat')
                
                ->get()->row_array();
        return $result;
    }
    public function getcountsuratmasuk(){
        $date=date('Y-m-d');
         $this->db->select('COUNT(id) as jumlah', FALSE);
         
        $this->db->where('tgl1',$date);
        $this->db->where('jenis_surat','surat masuk');
        $this->db->order_by('id','DESC'); 
        $query = $this->db->get('mst_surat'); 
        $t = $query->row();
        return $t->jumlah;  
    }
    public function getcountsuratkeluar(){
        $date=date('Y-m-d');
         $this->db->select('COUNT(id) as jumlah', FALSE);
         
        $this->db->where('tgl1',$date);
        $this->db->where('jenis_surat','surat Keluar');
        $this->db->order_by('id','DESC'); 
        $query = $this->db->get('mst_surat'); 
        $t = $query->row();
        return $t->jumlah;  
    }
    public function getcountsurat(){
        $date=date('Y-m-d');
         $this->db->select('COUNT(id) as jumlah', FALSE);
         
//        $this->db->where('tgl',$date);
//        $this->db->where('jenis_surat','surat Keluar');
        $this->db->order_by('id','DESC'); 
        $query = $this->db->get('mst_surat'); 
        $t = $query->row();
        return $t->jumlah;  
    }
   
}
