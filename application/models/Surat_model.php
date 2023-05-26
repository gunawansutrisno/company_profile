<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

    var $table = "mst_surat";
    var $primary_key = "id";
    var $jointTable = "mst_surat";

    public function __construct() {
        parent::__construct();
    }

    public function checkEdit($id = "") {
        $ret = $this->db->select('mst_surat.id,
                                  mst_surat.jenis_surat,
                                  mst_surat.index_id,
                                  mst_surat.tgl,
                                  mst_surat.tgl1,
                                  mst_surat.tgl2,
                                  mst_surat.dari,
                                  mst_surat.dari1,
                                  mst_surat.dari2,
                                  mst_surat.kode,
                                  mst_surat.nomor,
                                  mst_surat.no,
                                  mst_surat.kop_surat,
                                  mst_surat.isi_kop_surat,
                                  mst_surat.isi,
                                  mst_surat.kepada,
                                  mst_surat.kepada1,
                                  mst_surat.kepada2,
                                  mst_users.nama,
                                ')
                        ->from($this->table)
                        ->where('mst_surat.id', $id)
                        ->join('mst_users','mst_users.id= '.$this->table.'.createdby')
                        ->get()->row_array();
        return $ret;
    }
    public function getDataPrint($get = "",$surat="",$tahun="",$kop="") {
         
        $ret = $this->db->select('mst_surat.id,
                                  mst_surat.jenis_surat,
                                  mst_surat.index_id,
                                  mst_surat.tgl,
                                  mst_surat.tgl1,
                                  mst_surat.tgl2,
                                  mst_surat.dari,
                                  mst_surat.dari1,
                                  mst_surat.dari2,
                                  mst_surat.kode,
                                  mst_surat.nomor,
                                  mst_surat.no,
                                  mst_surat.kop_surat,
                                  mst_surat.isi_kop_surat,
                                  mst_surat.isi,
                                  mst_surat.kepada,
                                  mst_surat.kepada1,
                                  mst_surat.kepada2,
                                  mst_users.nama,
                                ')
                        ->from($this->table)
                        ->where('mst_surat.no', $get)
                        ->where('mst_surat.jenis_surat', $surat)
                        ->like('mst_surat.tgl1', $tahun)
                        ->like('mst_surat.kop_surat', $kop)
                        ->join('mst_users','mst_users.id= '.$this->table.'.createdby')
                        ->get()->result_array();
        return $ret;
    }
    public function getDataPasien($surat, $kode_surat = "", $nomor = "", $isi = "", $kategori = "", $kopsurat = "", $tgl = "") {
        if ($surat != "") {
            $this->db->like('jenis_surat', $surat);
        }
        if ($kode_surat != "") {
            $this->db->like('kode', $kode_surat);
        }

        if ($nomor != "") {
            $this->db->like('nomor', $nomor);
        }
        if ($isi != "") {
            $this->db->like('isi', $isi);
        }
        if ($kategori != "") {
            $this->db->like('index_id', $kategori);
        }
        if ($kopsurat != "") {
            $this->db->like('kop_surat', $kopsurat);
        }
        if ($tgl != "") {
            $this->db->where("tgl1 BETWEEN '" . $tgl['start'] . "' AND '" . $tgl['end'] . "'");
        }
//        $this->db->order_by('no DESC');
        $this->db->order_by('tgl1 ASC');
        return $this->db->get_compiled_select($this->table);
    }

    public function update($array, $id) {

        $this->db->where($this->primary_key, $id);
        $query = $this->db->update($this->table, $array);
        if (!$query) {

            $retVal['error_stat'] = "Failed To Insert";
            $retVal['status'] = false;
        } else {
            $retVal['error_stat'] = "Success To Update";
            $retVal['status'] = true;
            $retVal['id'] = $id;
        }

        return $retVal;
    }

    public function getKategori() {

        $ret = $this->db->select('*')
                        ->from('mst_jenis_index')
                        ->get()->result();
        return $ret;
    }

    public function delete($id) {
//        echoPre($id);exit;
        $this->db->where($this->primary_key, $id);
        $q = $this->db->delete($this->table);

        if (!$q) {
            $retVal['error_stat'] = "Failed To Delete";
            $retVal['status'] = false;
        } else {
            $retVal['error_stat'] = "Success To Delete";
            $retVal['status'] = true;
        }

        return $retVal;
    }

}
