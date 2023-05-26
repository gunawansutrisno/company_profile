<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    var $table = "mst_surat";
    var $primary_key = "id";
//    var $jointTable = "mst_pasien";
//    var $jointTableDokter = "mst_siswa";

    public function __construct() {
        parent::__construct();
    }

    public function getDataIndex($offset = 0, $limit = 10, $status_pembayaran = "", $tanggal = array()) {
       
            if ($status_pembayaran != "") {
                $this->db->where($this->table.'.status', $status_pembayaran);
            }
          
            if (!empty($tanggal) && isset($tanggal['start']) && isset($tanggal['end'])) {
                $this->db->where($this->table.'.tgl BETWEEN "' . $tanggal['start'] . '" AND "' .$tanggal['end'].'"');
           }
        $this->db->from($this->table);
        if($limit != 'all'){
            $this->db->limit($limit);
        
        }
        $this->db->offset($offset);
        $this->db->order_by($this->table . ".tgl ASC");
        $data = $this->db->get();
        return $data->result();
    }
    public function getCountDataIndex( $status = "",$tanggal = array()) {

            if ($status != "") {
                $this->db->where('status', $status_pembayaran);
            }
            
            if (!empty($tanggal) && isset($tanggal['start']) && isset($tanggal['end'])) {
                $this->db->where('tgl_tindakan BETWEEN "' . $tanggal['start'] . '" AND "' .$tanggal['end'].'"');
         
            }
        $this->db->select($this->table . '.* ');
        $this->db->from($this->table);
        $this->db->order_by("mst_diagnostik.tgl_tindakan DESC");
        $data = $this->db->count_all_results();
        return $data;
    }
    public function getDataIndexexport($status_pembayaran = "", $tanggal = array()) {
       
       
           
            if ($status_pembayaran != "") {
                $this->db->where('mst_diagnostik.status', $status_pembayaran);
            }
          
            if (!empty($tanggal) && isset($tanggal['start']) && isset($tanggal['end'])) {
                $this->db->where('tgl_tindakan BETWEEN "' . $tanggal['start'] . '" AND "' .$tanggal['end'].'"');
            }
            
        $this->db->select("
            mst_diagnostik.id,
            mst_diagnostik.status,
            mst_diagnostik.jenis_tindakan,
            DATE_FORMAT(mst_diagnostik.tgl_tindakan,'%d %b %Y') AS tanggal,
            mst_diagnostik.createdby,
            mst_diagnostik.createddate,
            mst_diagnostik.notes,
            mst_diagnostik.updatedate,
            mst_diagnostik.jk,
            mst_siswa.nama_siswa AS dokter,
            mst_siswa.kode_dokter,
            mst_pasien.noka,
            mst_pasien.nama AS pasien,
            mst_pemeriksaan.nosep,
            mst_pemeriksaan.jenis_rawat,
            mst_jenis_tindakan_op.name
        ");
        $this->db->join("mst_siswa" , "mst_siswa.id = mst_diagnostik.dokter_id","left");
        $this->db->join("mst_pasien" , "mst_pasien.id = mst_diagnostik.pasien_id","left");
        $this->db->join("mst_pemeriksaan" , "mst_pemeriksaan.pasien_id = mst_pasien.id","left"); 
        $this->db->join("mst_jenis_tindakan_op" , "mst_diagnostik.jenis_tindakan = mst_jenis_tindakan_op.id","left"); 
        $this->db->from($this->table);
        $this->db->order_by($this->table . ".tgl_tindakan DESC");
        $data = $this->db->get();
        return $data;
    }
    public function getCountDataIndexexport( $status_pembayaran = "",$tanggal = array(), $id_agen = "") {
        
         if(!empty($id_agen)){
                 $this->db->where('id_agen', $id_agen);
               
        }else {
           
            if ($status_pembayaran != "") {
                $this->db->where('status_pembayaran', $status_pembayaran);
            }
            
            if (!empty($tanggal) && isset($tanggal['start']) && isset($tanggal['end'])) {
                $this->db->where('tanggal_transaksi BETWEEN "' . $tanggal['start'] . '" AND "' .$tanggal['end'].'"');
         
            }
        }
        $this->db->select($this->table . '.*, master_agen.nama_agen ');
        $this->db->join('master_agen','master_agen.id_agen = '.$this->table.'.id_agen');
        $this->db->from($this->table);
        $data = $this->db->count_all_results();
        return $data;
    }
    public function getBarangDetail($id) {
        
        $this->db->select( $this->jointTable .' .*, master_barang.*');
        $this->db->from( $this->jointTable);
        $this->db->join('master_barang', 'master_barang.id_barang = '.$this->jointTable.'.id_barang');
        if(is_array($id)){
            $this->db->where_in($this->jointTable.".id_trans_barang", $id);
            $this->db->order_by($this->jointTable.".id_trans_barang", "asc");
        }
        else{
            $this->db->where($this->jointTable.".id_trans_barang", $id);
        }
        
        $query = $this->db->get();
        $resVal = "";
        if ($query->num_rows() > 0) {
            $resVal = $query->result_array();
        } else {
            $resVal = false;
        }
        return $resVal;
    }

   public function getDataTrans($kode = "", $nomor = "",$isi_ringkasan="", $tanggal=""){
       
        if($kode !=""){
              $this->db->like("kode" , $kode);           
        } 
        if($nomor !=""){
              $this->db->like("nomor" , $nomor);           
        }           
         if($isi_ringkasan !=""){
              $this->db->like("isi" , $isi_ringkasan);           
        } 
        if($tanggal !=""){
                $this->db->where("tgl1 BETWEEN '".$tanggal['start']."' AND '".$tanggal['end']."'");
        }
        $this->db->order_by("tgl ASC"); 
        return $this->db->get_compiled_select($this->table);
    }
   
}
