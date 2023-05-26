<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JenisIndex_model extends CI_Model {

    var $table = "tr_submenu";
    var $primary_key = "id";
    var $column_order = array('mainmenu', 'mainmenu', null);
//	var $column_search = array('txtProvinsi','txtKabupaten'); 
//    var $order = array('name' => 'desc');

    public function __construct() {
        parent::__construct();
    }
//    public function check(){
//
//        $ret = $this->db->select('*')
//                ->from($this->table)
////                ->where('status =',0)
//                ->get()->result();
//        return $ret;
//    }
    public function getDataIndex($offset = 0, $limit = 10, $search = "") {

        if (!empty($search)) {
            $this->db->like('mainmenu', $search);
        }
        $this->db->select($this->table . '.* ');
        $this->db->from($this->table);
        if ($limit != "all") {
            $this->db->limit($limit);
        }
        $this->db->offset($offset);
        $this->db->order_by($this->table . ".mainmenu ASC");
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
            $this->db->like('mainmenu', $search);
        }
        $this->db->select($this->table . '.* ');
        $this->db->from($this->table);
//        $this->db->where($this->table.".status =",0);
        $data = $this->db->count_all_results();
        return $data;
    }
    function kabupaten($provId) {

        $kabupaten = "<option value='0'>-- Pilih SubMain Menu --</pilih>";
        $this->db->order_by('submenu', 'ASC');
        $kab = $this->db->get_where('tr_menu', array('menu_id' => $provId));
        foreach ($kab->result_array() as $data) {
            $kabupaten.= "<option value='$data[id]'>" . strtoupper($data[submenu]) . "</option>";
        }
        return $kabupaten;
    }
     function getmenu(){
        $this->db->select('*');
        $this->db->from('mst_menu');
        $data = $this->db->get();
        return $data->result();
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
    

    public function updateDetail($array, $id) {

        $this->db->where($this->primary_key, $id);
        $query = $this->db->update($this->table, $array);
        if (!$query) {

            $retVal['error_stat'] = "Failed To Update";
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
        $this->db->select('tr_submenu.id,tr_submenu.mainmenu,mst_menu.name,tr_menu.submenu,tr_submenu.status');
        $this->db->from($this->table);
        $this->db->join('tr_menu','tr_menu.id = tr_submenu.submenu_id','left');
        $this->db->join('mst_menu','tr_submenu.menu_id = mst_menu.id','left');
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
//    function getdataSiswa($idnama = "") {
//        $this->_get_datatabless_query();
//        $this->db->order_by('mst_jenis_index.name ASC');
//        $this->db->where($this->table.".status =",0);
//        if (!empty($nama)) {
//            $this->db->like("mst_jenis_index.name", $nama);
//        }
//        if ($_POST['length'] != -1)
//            $this->db->limit($_POST['length'], $_POST['start']);
//        $query = $this->db->get();
//        return $query->result();
//    }

    function count_filtered($nama = "") {
        $this->_get_datatables_query();
        if (!empty($nama)) {
            $this->db->like("tr_submenu.mainmenu", $nama);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all() {
        $this->db->from($this->table);
//        $this->db->where($this->table.".status =",0);
        return $this->db->count_all_results();
    }
    public function actived($id) {
        $array = array('status' => 1);
        $this->db->where('id', $id);
        $query = $this->db->update('tr_submenu', $array);
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
        $query = $this->db->update('tr_submenu', $array);
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
