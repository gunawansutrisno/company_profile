<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

    var $table = "mst_edocument_iso";
    var $primary_key = "id";

    public function __construct() {
        parent::__construct();
    }

    public function checkSiswa($id){
        $ret = $this->db->where($this->table.'.id', $id)
                ->from($this->table)
                ->get()->result();
        return $ret;
    }
     public function getCek($code){

        $ret = $this->db->select('*')
                ->from($this->table)
                ->where('code',$code)
                ->get()->row();
        return $ret;
    }
     public function check($id){

        $ret = $this->db->select('*')
                ->from($this->table)
                ->where('id',$id)
                ->get()->row();
        return $ret;
    }
    public function getDataAgen(){
       $this->db->order_by('mst_edocument_iso.code ASC');
       
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
        $query = $this->db->update('mst_edocument_iso', $array);
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
        $query = $this->db->update('mst_edocument_iso', $array);
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
        $query =  $this->db->get($this->table);
        $row = $query->row();
        unlink("./assets/file/iso/$row->file");
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
}
