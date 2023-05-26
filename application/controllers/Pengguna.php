<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends MY_Controller {

    var $meta_title = "APPMOLINDO | Pengguna";
    var $meta_desc = "APPMOLINDO";
    var $main_title = "Data Pengguna";
    var $base_url = "";
    var $upload_dir = "";
    var $upload_url = "";
    var $limit = "10";
    private $filename = "foto";
    
    public function __construct() {
        parent::__construct();
        $this->base_url = $this->base_url_site . "pengguna/";
        $this->load->model("pengguna_model");
        $this->load->model("level_model");
         $this->load->model("code_model");
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
               
                ASSETS_JS_URL . "form/pengguna.js",
                ASSETS_URL . "plugins/select2/select2.full.min.js",
            ), 
            "custom_css" => array(
                ASSETS_URL . "plugins/select2/select2.min.css",
            ),
        );
        print_r($this->config->item('menu_initial'));
        $this->_render("default", $dt);
    }
    
    
    public function save() {
        $id = isset($_POST["id"]) ? trim($_POST["id"]) : '';
        $alert = $this->_saveData($id);
        $this->session->set_flashdata("alert_pengguna", $alert);
        redirect($this->base_url);
    }

    public function delete($id) {
         
         $edPengguna = array(
                    "status" => 0,
                );
        $del_agen = $this->pengguna_model->delete($id);
        $del_agen['status'];
        if ($del_agen['status']) {
            $alert = array(
                "status" => "success",
                "message" => "Success to delete Pengguna."
            );
        } else {
            $alert = array(
                "status" => "failed",
                "message" => "Failed to delete Pengguna. Please try again."
            );
        }

        $this->session->set_flashdata("alert_pengguna", $alert);
        redirect($this->base_url);
    }
    public function updateNonaktif($id) {
        $edPengguna="";
        $cek = $this->pengguna_model->getDetail($id);
        if($cek != null){
           if($cek[0]['status'] == 1){
               $edPengguna = array(
                    "status" => 0,
                );
           } else {
                $edPengguna = array(
                    "status" => 1,
                );
           } 
        } 
        $del_agen = $this->pengguna_model->updateDetail($edPengguna, $id);
        $del_agen['status'];
        $aler = ($edPengguna['status']==1) ? "activated " : "deactivating" ;
        if ($del_agen['status']) {
            $alert = array(
                "status" => "success",
                "message" => "successfully ". $aler ." User Data."
            );
        } else {
            $alert = array(
                "status" => "failed",
                "message" => "Failed to disable User data. Please try again later."
            );
        }

        $this->session->set_flashdata("alert_pengguna", $alert);
        redirect($this->base_url);
    }

    public function edit($term_id) {
        header('Content-Type: application/json');
        $data = $this->pengguna_model->getDetail($term_id);
        $resData = $data[0];
        echo json_encode($resData);
    }

    private function _home() {
        $page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : 1;
        $search = isset($_REQUEST["search"]) ? $_REQUEST["search"] : "";
        $start = ($page - 1) * $this->limit;

        $data = $this->pengguna_model->getDataIndex($start, $this->limit, $search);
        $countTotal = $this->pengguna_model->getCountDataIndex($search);
        $arrBreadcrumbs = array(
            "Pengguna" => base_url(),
            "Data Pengguna" => $this->base_url,
            "List" => "#",
        );
        $dt["level"] = $this->level_model->getDataIndex(0, 'all', '');
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = $this->main_title;
        $dt["data"] = $data;
        $dt['jabatan'] = $this->code_model->getDataIndex();
        $dt["pagination"] = $this->_build_pagination($this->base_url, $countTotal, $this->limit, true, "&search=" . $search);
        $dt["base_url"] = $this->base_url;
        $ret = $this->load->view("pengguna/content", $dt, true);
        return $ret;
    }

    private function _saveData($id = '') {
        $fullname = isset($_POST["nama"]) ? trim($_POST["nama"]) : '';
        $username = isset($_POST["username"]) ? trim($_POST["username"]) : '';
        $password = isset($_POST["password"]) ? $_POST["password"] : '';
        $id_level = isset($_POST["id_level"]) ? $_POST["id_level"] : '';
        $jabatan = isset($_POST["jabatan"]) ? $_POST["jabatan"] : '';
        $passwordEn = sha1($password);        
        $return = array(
            "status" => "failed",
            "message" => "Failed to save Pengguna. Please try again."
        );
        $images="";
      $upload = $this->pengguna_model->upload_file($this->filename);
            if ($upload['result'] == "success") { // Jika proses upload sukses
               $images = $upload['file']['file_name'];
               
            } else { // Jika proses upload gagal
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
//            echoPre($images);exit;
        // update 
        if (!empty($fullname) && !empty($username)) {
            if (!empty($id)) {
                $edPengguna = array(
                    "nama" => $fullname,
                    "jabatan" => $jabatan,
                    "username" => $username,
                    "id_level" => $id_level
                );
                if($password != ""){
                    $edPengguna['password'] = $passwordEn;
                }
                if($images != ""){
                    $edPengguna['images'] = $images;
                }
                $res = $this->pengguna_model->updateDetail($edPengguna, $id);
                if ($res['status'] == true) {
                    $return = array(
                        "status"    => "success",
                        "message"   => "Success to update Pengguna $fullname."
                    );
                }
            }
            // insert 
            else {
                $inPengguna = array(
                    "images" => $images,
                    "nama"      => $fullname,
                    "username"  => $username,
                    "jabatan" => $jabatan,
                    "password"  => $passwordEn,
                    "id_level"  => $id_level,
                    "status"    => 0
                );
                $res = $this->pengguna_model->saveData($inPengguna);
                if ($res['status'] == true) {
                    $return = array(
                        "status" => "success",
                        "message" => "Success to save Pengguna $fullname."
                    );
                }
            }
        }
        return $return;
    }

}
