<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jenisbarang_model extends CI_Model {

    var $table = "tr_menu";
    var $primary_key = "id";
    var $column_order = array('menu_id', 'menu_id', null);
    var $order = array('tr_menu.id' => 'desc');

    public function __construct() {
        parent::__construct();
    }

    public function getDataIndex($offset = 0, $limit = 10, $search = "") {

        if (!empty($search)) {
            $this->db->like('submenu', $search);
        }
        $this->db->select($this->table . '.* ');
        $this->db->from($this->table);
        if ($limit != "all") {
            $this->db->limit($limit);
        }
        $this->db->offset($offset);
//        $this->db->order_by($this->table . ".in_bahasa ASC");
        $data = $this->db->get();
        return $data->result();
    }

    public function getDetail($id) {
        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table, 1);
        $resVal = "";
        if ($query->num_rows() > 0) {
            $resVal = $query->result_array();
        } else {
            $resVal = false;
        }
        return $resVal;
    }

    public function getCountDataIndex($search = "") {
        if (!empty($search)) {
            $this->db->like('submenu', $search);
        }
        $this->db->select($this->table . '.* ');
        $this->db->from($this->table);
        $data = $this->db->count_all_results();
        return $data;
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
    public function saveDatapelanggaran($arrData = array(), $debug = false) {

        $this->db->set($arrData);
        if ($debug) {
            $retVal = $this->db->get_compiled_insert('mst_detail_pelanggaran');
        } else {
            $res = $this->db->insert('mst_detail_pelanggaran');
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

    public function updateDetail($array, $id) {

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
     public function delete($id) {
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
    private function _get_datatables_query() {
        $this->db->select('tr_menu.id,tr_menu.menu_id,tr_menu.submenu,mst_menu.name,tr_menu.status');
        $this->db->from($this->table);
        $this->db->join('mst_menu','tr_menu.menu_id = mst_menu.id','left');
        $i = 0;
        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($nama = "") {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->result();
    }
    function getmenu(){
        $this->db->select('*');
        $this->db->from('mst_menu');
        $data = $this->db->get();
        return $data->result();
    }
    function count_filtered($nama = "") {
        $this->_get_datatables_query();
        if (!empty($nama)) {
            $this->db->like("tr_menu.submenu", $nama);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    public function actived($id) {
        $array = array('status' => 1);
        $this->db->where('id', $id);
        $query = $this->db->update('tr_menu', $array);
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
        $query = $this->db->update('tr_menu', $array);
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
