<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Document_model extends CI_Model {

    var $table = "mst_document";
    var $primary_key = "id";

    public function __construct() {
        parent::__construct();
    }

    public function checkSiswa($id) {
        $ret = $this->db->where($this->table . '.id', $id)
                        ->from($this->table)
                        ->get()->row_array();
        return $ret;
    }

    public function getDataMainMenu() {
        $ret = $this->db->select('*')
                        ->from('mst_menu')
                        ->get()->result();
        return $ret;
    }

    function kabupaten($provId) {

        $kabupaten = "<option value='0'>-- Pilih --</pilih>";
        $this->db->order_by('submenu', 'ASC');
        $kab = $this->db->get_where('tr_menu', array('menu_id' => $provId));
        foreach ($kab->result_array() as $data) {
            $kabupaten.= "<option value='$data[id]'>" . strtoupper($data[submenu]) . "</option>";
        }
        return $kabupaten;
    }
    function kecamatan($kabId){
        $kecamatan="<option value='0'>--pilih--</pilih>";

        $this->db->order_by('mainmenu','ASC');
        $kec= $this->db->get_where('tr_submenu',array('submenu_id'=>$kabId));

        foreach ($kec->result_array() as $data ){
        $kecamatan.= "<option value='$data[id]'>$data[mainmenu]</option>";
        }

        return $kecamatan;
    }
    public function getCek($code) {

        $ret = $this->db->select('*')
                        ->from($this->table)
                        ->where('code', $code)
                        ->get()->row();
        return $ret;
    }

    public function check($id) {

        $ret = $this->db->select('*')
                        ->from($this->table)
                        ->where('id', $id)
                        ->get()->row();
        return $ret;
    }

    public function getDataAgen() {
		 $this->db->select("
            mst_document.id,
            mst_document.judul,
            mst_document.revisi,
            mst_document.status,
            mst_document.createddate,
            mst_document.updateddate,
            tr_submenu.mainmenu as jenis,
            tr_menu.submenu as kategori
        ");
        
        $this->db->join('tr_submenu','tr_submenu.id = mst_document.jenis','left');
        $this->db->join('tr_menu', 'tr_menu.id = mst_document.subkategori','left');
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

    public function updateDetail($array, $id) {
        $this->db->where('id_siswa', $id);
        $query = $this->db->update('detail_tr_siswa', $array);
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

    public function actived($id) {
        $array = array('status' => 1);
        $this->db->where('id', $id);
        $query = $this->db->update('mst_document', $array);
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

    public function deactived($id) {
        $array = array('status' => 0);
        $this->db->where('id', $id);
        $query = $this->db->update('mst_document', $array);
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

    public function saveDataSiswa($arrData = array(), $debug = false) {

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

    public function delete($id) {
        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table);
        $row = $query->row();
        unlink("./assets/file/document/$row->file");
        $q = $this->db->delete($this->table, array($this->primary_key => $id));
        if (!$q) {
            $retVal['error_stat'] = "Failed To Delete";
            $retVal['status'] = false;
        } else {
            $retVal['error_stat'] = "Success To Delete";
            $retVal['status'] = true;
        }
        return $retVal;
    }
     public function getDataSubMenu()
        {
            // kita joinkan tabel kota dengan provinsi
            $this->db->order_by('submenu', 'asc');
            $this->db->join('mst_menu', 'tr_menu.menu_id = mst_menu.id');
            return $this->db->get('tr_menu')->result();
        }

        public function getDataChildMenu()
        {
            // kita joinkan tabel kecamatan dengan kota
            $this->db->order_by('mainmenu', 'asc');
            $this->db->join('tr_menu', 'tr_submenu.submenu_id = tr_menu.id');
            return $this->db->get('tr_submenu')->result();
        }
}
