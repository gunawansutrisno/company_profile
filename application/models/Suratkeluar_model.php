<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeluar_model extends CI_Model {

    var $table = "mst_surat";
    var $primary_key = "id";

    public function __construct() {
        parent::__construct();
    }
    public function getDataSearch($sep=""){
        $result =$this->db->select('*')
                ->from('mst_pemeriksaan')
                ->where('nosep =',$sep)
                ->join('mst_pasien','mst_pasien.id = mst_pemeriksaan.pasien_id','left')
                ->get()->row_array();
        return $result;
    }

    public function JenisPerusahaan(){

        $ret = $this->db->select('*')
                ->from('mst_company')
                ->get()->result();
        return $ret;
    }
    public function checkIND(){

        $ret = $this->db->select('*')
                ->from('mst_jenis_index')
                ->get()->result();
        return $ret;
    }
   
   
    public function saveData($arrData = array(), $debug = false) {

        $this->db->set($arrData);
            if ($debug) {
                $retVal = $this->db->get_compiled_insert($this->table);
            } else {
                $res = $this->db->insert($this->table);
                if (!$res) {
                    $retVal['error_stat'] = "Failed To Insert";
                    $retVal['status'] = false;
                } else {
                    $retVal['error_stat'] = "Success To Insert";
                    $retVal['status'] = true;
                    $retVal['id'] = $this->db->insert_id();
                }
            }
        return $retVal;
    }
    public function getKode(){
         $this->db->select('MAX(no) as no');
        $this->db->order_by('id','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('mst_surat'); 
       
        if($query->num_rows() <> 0){       
         $data = $query->row(); 
         $kode = intval($data->no) + 1;    
        }
//         echoPre($kode);exit;
//        $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); 
//        $kodejadi = "No: ".$kodemax." B ";    
        return $kode;  
    }
    public function CekData($kode_surat="", $no="", $nomor="", $index_id="", $isi_ringkasan) {
       
        if ($kode_surat != "") {
            $this->db->like('kode', $kode_surat);
        }

        if ($nomor != "") {
            $this->db->like('nomor', $nomor);
        }
      
        if ($no != "") {
            $this->db->like('no', $no);
        }
        if ($index_id != "") {
            $this->db->like('index_id', $index_id);
        }
        if ($isi_ringkasan != "") {
            $this->db->like('isi', $isi_ringkasan);
        }
        $this->db->from($this->table);
        $data = $this->db->get();
        return $data->result_array();
    }
   
   
}
