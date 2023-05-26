<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    var $table = "mst_diagnostik";
    var $primary_key = "id";
    var $jointTable = "mst_pasien";
    var $jointTableDokter = "mst_siswa";

    public function __construct() {
        parent::__construct();
    }

    public function getDataIndex($offset = 0, $limit = 10, $status_pembayaran = "", $tanggal = array()) {
       
            if ($status_pembayaran != "") {
                $this->db->where($this->table.'.status', $status_pembayaran);
            }
          
            if (!empty($tanggal) && isset($tanggal['start']) && isset($tanggal['end'])) {
                $this->db->where($this->table.'.tgl_tindakan BETWEEN "' . $tanggal['start'] . '" AND "' .$tanggal['end'].'"');
           }
        $this->db->select($this->table . '.*, DATE_FORMAT(tgl_tindakan,"%d %b %y") AS tanggal, mst_siswa.nama_siswa AS pasien, mst_pasien.nama AS pasien, '
                . 'mst_pasien.noka ');
        $this->db->join('mst_pasien','mst_pasien.id = '.$this->table.'.pasien_id','left');
        $this->db->join('mst_siswa','mst_siswa.id = '.$this->table.'.dokter_id','left');
        $this->db->from($this->table);
        if($limit != 'all'){
            $this->db->limit($limit);
        
        }
        $this->db->offset($offset);
        $this->db->order_by($this->table . ".tgl_tindakan ASC");
        $this->db->where('mst_diagnostik.type =',1);
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
//        }
        $this->db->select($this->table . '.* ');
        $this->db->from($this->table);
        $this->db->where('mst_diagnostik.type =',1);
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
            DATE_FORMAT(mst_diagnostik.tgl_tindakan,'%d %b %y') AS tanggal,
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
             mst_jenis_tindakan_op.name as jenis,
        ");
        $this->db->join("mst_siswa" , "mst_siswa.id = mst_diagnostik.dokter_id","left");
        $this->db->join("mst_pasien" , "mst_pasien.id = mst_diagnostik.pasien_id","left");
        $this->db->join("mst_pemeriksaan" , "mst_pemeriksaan.pasien_id = mst_pasien.id","left");
        $this->db->join("mst_jenis_tindakan_op" , "mst_jenis_tindakan_op.id = mst_diagnostik.jenis_tindakan","left");
        $this->db->from($this->table);
        $this->db->order_by($this->table . ".tgl_tindakan DESC");
        $this->db->where('mst_diagnostik.type =',1);
        $data = $this->db->get();
        return $data;
    }
   

   public function getDataTrans( $status_pembayaran = "",  $tanggal =""){
         $this->db->select("
            mst_diagnostik.id,
            mst_diagnostik.status,
            mst_diagnostik.jenis_tindakan,
            DATE_FORMAT(mst_diagnostik.tgl_tindakan,'%d %b %y') AS tanggal,
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
            mst_jenis_tindakan_op.name as jenis,
        ");
        $this->db->join("mst_siswa" , "mst_siswa.id = mst_diagnostik.dokter_id","left");
        $this->db->join("mst_pasien" , "mst_pasien.id = mst_diagnostik.pasien_id","left");
        $this->db->join("mst_pemeriksaan" , "mst_pemeriksaan.pasien_id = mst_pasien.id","left");
        $this->db->join("mst_jenis_tindakan_op" , "mst_jenis_tindakan_op.id = mst_diagnostik.jenis_tindakan","left");
        if($status_pembayaran !=""){
              $this->db->where("mst_diagnostik.status" , $status_pembayaran);           
        } 
          
        if($tanggal !=""){
                $this->db->where("mst_diagnostik.tgl_tindakan BETWEEN '".$tanggal['start']."' AND '".$tanggal['end']."'");
        }
        $this->db->order_by("mst_diagnostik.tgl_tindakan ASC"); 
        $this->db->where('mst_diagnostik.type =',1);
        return $this->db->get_compiled_select($this->table);
    }
   
}
