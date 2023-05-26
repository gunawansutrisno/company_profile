<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

    var $meta_title = "MOLINDO INCORPORATED | ChildMenu Utama";
    var $meta_desc = "MOLINDO INCORPORATED";
    var $main_title = "ChildMenu Utama";
    var $base_url = "";
    var $upload_dir = "";
    var $upload_url = "";
    var $limit = "10";

    public function __construct() {
        parent::__construct();
        $this->base_url = $this->base_url_site . "menu/";
        $this->load->model("jenisindex_model");
    }
    public function index() {
       
        $user_data =  $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        $status_session = $user_data['user_status'];
        if(empty($id_session || $status_session)){
             redirect();
        }
        $dt = array(
            "title" => $this->meta_title,
            "description" => $this->meta_desc,
            "container" => $this->_home(),
            "custom_js" => array(
                ASSETS_JS_URL . "form/menu.js",
                ASSETS_URL . "plugins/datatables/jquery.dataTables.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.min.js",
                ASSETS_URL . "plugins/datepicker/bootstrap-datepicker.js",
                ASSETS_URL . "plugins/daterangepicker/moment.min.js",
                ASSETS_URL . "plugins/daterangepicker/daterangepicker.js",
                ASSETS_URL . "plugins/select2/select2.full.min.js",
            ),
            "custom_css" => array(
                ASSETS_URL . "plugins/datepicker/datepicker3.css",
                ASSETS_URL . "plugins/daterangepicker/daterangepicker.css",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.css",
                 ASSETS_URL . "plugins/select2/select2.min.css",
            ),
        );
        $this->_render("default", $dt);
    }

    private function _home() {
        $page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : 1;
        $search = isset($_REQUEST["search"]) ? $_REQUEST["search"] : "";
        $start = ($page - 1) * $this->limit;
        $provinsi = isset($_REQUEST["code"]) ? $_REQUEST["code"] : "";
        $data = $this->jenisindex_model->getDataIndex($start, $this->limit, $search);
        $countTotal = $this->jenisindex_model->getCountDataIndex($search);
        $arrBreadcrumbs = array(
            "Master Data" => base_url(),
            "SubMenu Utama" => $this->base_url,
            "List" => "#",
        );
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = $this->main_title;
        $dt["data"] = $data;
        $dt['menu'] = $this->jenisindex_model->getmenu();
        $dt["pagination"] = $this->_build_pagination($this->base_url, $countTotal, $this->limit, true, "&search=" . $search);
        $dt["base_url"] = $this->base_url;
        $ret = $this->load->view("jenisindex/content", $dt, true);
        return $ret;
    }
    public function getambil_data(){

        $modul=$this->input->post('modul');
        $id=$this->input->post('id');
       
        if($modul=="kabupaten"){
             echo $this->jenisindex_model->kabupaten($id);
        }
//        else if($modul=="kecamatan"){
//
//        }
//        else if($modul=="kelurahan"){
//
//        }
   }
    public function ajax_list() {
        $post = $this->input->post();
        $nama = $post['IDprovinsi'] ? $post['IDprovinsi'] : '';
        $list = $this->jenisindex_model->get_datatables($nama);
//        echoPre($this->db->last_query());
        $data = array();
        foreach ($list as $dt) {
            $row = array();
            $row[] = $dt->name;
            $row[] = $dt->submenu;
            $row[] = '<a href="#" onclick="loadData(' . "'" . $this->base_url . 'edit/' . $dt->id . "'" . ')">' . $dt->mainmenu . '</a>';
            if($dt->status == 0){
            
                $row[] = '<a href="" data-id="' . $dt->id . '"  class="btn btn-danger btn-flat" data-toggle="modal" data-target="#active-data" title="Published"><span class="glyphicon glyphicon-remove"></span></a>'
                    . '<a href="javascript:void(0)" onclick="deleteData(' . "'" . $dt->id . "'" . ')" class="btn btn-danger btn-flat" title="Delete" data-toggle="modal" data-target="#delete-data"><span class="glyphicon glyphicon-trash"></span></a>';
            } else {
                $row[] = '<a href="" data-id="' . $dt->id . '"  class="btn btn-success btn-flat" data-toggle="modal" data-target="#deactive-data" title="Unpublished"><span class="glyphicon glyphicon-ok"></span></a>'
                    . '<a href="javascript:void(0)" onclick="deleteData(' . "'" . $dt->id . "'" . ')" class="btn btn-danger btn-flat" title="Delete" data-toggle="modal" data-target="#delete-data"><span class="glyphicon glyphicon-trash"></span></a>';
           
            }
//            $row[] = '<a href="javascript:void(0)" onclick="deleteData(' . "'" . $dt->id . "'" . ')" class="btn btn-danger btn-flat" title="Delete" data-toggle="modal" data-target="#delete-data"><span class="glyphicon glyphicon-trash"></span></a>';
            $data[] = $row;
        }
        $output = array(
            "recordsTotal" => $this->jenisindex_model->count_all(),
//            "recordsFiltered" => $this->jenisindex_model->count_filtered($nama),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
    public function edit($term_id="") {
        header('Content-Type: application/json');
        $data = $this->jenisindex_model->getDetail($term_id);
        $resData = $data[0];
        echo json_encode($resData);
    }
     public function save() {
        $id = isset($_POST["id"]) ? trim($_POST["id"]) : '';
        $alert = $this->_saveData($id);
        $this->session->set_flashdata("alert_pelanggaran", $alert);
        redirect($this->base_url);
    }
     
    private function _saveData($id = '') {
       
        $menu_id = isset($_POST["menu_id"]) ? trim($_POST["menu_id"]) : '';
        $submenu_id = isset($_POST["submenu_id"]) ? trim($_POST["submenu_id"]) : '';
        $code = isset($_POST["name"]) ? trim($_POST["name"]) : '';
        $return = array(
            "status" => "failed",
            "message" => "Failed to save Data Sub Menu. Please try again."
        );
        // update category
        if (!empty($code)) {
            if (!empty($id)) {
                
                $edit = array(
                    "url" => url_title($code),
                    "menu_id" => $menu_id,
                    "submenu_id" => $submenu_id,
                    "mainmenu" => $code,
                );
                if(empty($submenu_id)){
                    unset($edit['submenu_id']);
                }
                $res = $this->jenisindex_model->updateDetail($edit, $id);
                if ($res['status'] == true) {
                    $return = array(
                        "status" => "success",
                        "message" => "Success to update Data ChildMenu $code."
                    );
                }
            }
            // insert category
            else {
                $insert = array(
                    "url" => url_title($code),
                    "menu_id" => $menu_id,
                    "submenu_id" => $submenu_id,
                    "mainmenu" => $code,
                );
                $res = $this->jenisindex_model->saveData($insert);
                if ($res['status'] == true) {
                    $return = array(
                        "status" => "success",
                        "message" => "Success to save ChildMenu $code."
                    );
                }
            }
        }
        return $return;
    }
 public function delete($id) {
        $del_author = $this->jenisindex_model->delete($id);
        $del_author['status'];
        if ($del_author['status']) {
            $alert = array(
                "status" => "success",
                "message" => "Success to Delete Data."
            );
        } else {
            $alert = array(
                "status" => "failed",
                "message" => "Failed to Delete Data."
            );
        }
        $this->session->set_flashdata("alert_pelanggaran", $alert);
        redirect($this->base_url);
    }
    public function active($id) {
        $alert = array(
               "status" => "failed",
               "message" => "Failed to Published. Please try again."
           );
        $res = $this->jenisindex_model->actived($id);
        if ($res['status'] == true) {
            $alert = array(
                "status" => "success",
                "message" => "Success to Published ."
            );
        }
        $this->session->set_flashdata("alert_siswa", $alert);
        redirect($this->base_url);
    }
    public function deactive($id) {
        $alert = array(
               "status" => "failed",
               "message" => "Failed to Unpublished. Please try again."
           );
        $res = $this->jenisindex_model->deactived($id);
        if ($res['status'] == true) {
            $alert = array(
                "status" => "success",
                "message" => "Success to Unpublished."
            );
        }
        $this->session->set_flashdata("alert_siswa", $alert);
        redirect($this->base_url);
    }
}

