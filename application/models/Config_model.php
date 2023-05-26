<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model {

    var $table = "konfigurasi";
    var $primary_key = "id_konfigurasi";

    public function __construct() {
        parent::__construct();
    }

    public function checkSiswa() {
        $ret = $this->db->from($this->table)
                        ->get()->row_array();
        return $ret;
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
}
