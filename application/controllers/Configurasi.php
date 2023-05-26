<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Configurasi extends MY_Controller {

    var $meta_title = "MOLINDO INCORPORATED | Konfigurasi Web";
    var $meta_desc = "MOLINDO INCORPORATED";
    var $main_title = "General Konfigurasi";
    var $base_url = "";
    var $upload_dir = "";
    var $upload_url = "";
    var $limit = "10";
    private $filename = "logo";
    public function __construct() {
        parent::__construct();
        $this->base_url = $this->base_url_site . "configurasi/";
        $this->base_url_logo = $this->base_url_site . "konfigurasi/logo/";
        $this->load->model("config_model");
        $this->load->model("pengguna_model");
    }

    public function index() {
         $user_data =  $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        if(empty($id_session)){
             redirect();
        }
        $dt = array(
            "title" => $this->meta_title,
            "description" => $this->meta_desc,
            "container" => $this->_home($id_session),
            "custom_js" => array(
               
                ASSETS_JS_URL . "form/config.js",
                ASSETS_URL . "plugins/datatables/jquery.dataTables.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.js",
                ASSETS_URL . "plugins/select2/select2.full.min.js",
                ASSETS_URL . "plugins/validate/jquery.validate_1.11.1.min.js",
                 ASSETS_URL . "plugins/ckeditor/ckeditor.js",
                ASSETS_URL . "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
            ), 
            "custom_css" => array(
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.css",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.css",
                ASSETS_URL . "plugins/select2/select2.min.css",
                ASSETS_URL . "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css",
            ),

        );
        $this->_render("default", $dt);
    } 
    public function index_logo() {
         $user_data =  $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        if(empty($id_session)){
             redirect();
        }
        $dt = array(
            "title" => $this->meta_title,
            "description" => $this->meta_desc,
            "container" => $this->_home_logo($id_session),
            "custom_js" => array(
               
                ASSETS_JS_URL . "form/config_logo.js",
                ASSETS_URL . "plugins/datatables/jquery.dataTables.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.js",
                ASSETS_URL . "plugins/select2/select2.full.min.js",
                ASSETS_URL . "plugins/validate/jquery.validate_1.11.1.min.js",
                 ASSETS_URL . "plugins/ckeditor/ckeditor.js",
                ASSETS_URL . "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
            ), 
            "custom_css" => array(
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.css",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.css",
                ASSETS_URL . "plugins/select2/select2.min.css",
                ASSETS_URL . "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css",
            ),

        );
        $this->_render("default", $dt);
    } 
    public function save() {
        $id = isset($_POST["id"]) ? trim($_POST["id"]) : '';
        $code = isset($_POST['code']) ? trim($_POST["code"]) : '';
        if($code== "logo"){
            $alert = $this->_saveLogo($id);
            $this->session->set_flashdata("alert_kwintansi", $alert);
            redirect($this->base_url_logo);
        }else{
            $alert = $this->_saveData($id);
            $this->session->set_flashdata("alert_kwintansi", $alert);
            redirect($this->base_url);
        }
        
    }
    private function _home_logo($id_session) {
        $arrBreadcrumbs = array(
            "Manage" => base_url(),
            "Ganti" => $this->base_url,
            "Logo" => "#",
        );
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = $this->main_title;
        $dt['user'] =$id_session;
        $dt['data'] = $this->config_model->checkSiswa();
//        echoPre($dt['data']);exit;
        $dt['base_url'] = $this->base_url;
        $ret = $this->load->view("konfig/add_logo", $dt, true);
        return $ret;
    }
    private function _home($id_session) {
        $arrBreadcrumbs = array(
            "Manage" => base_url(),
            "Konfigurasi" => $this->base_url,
            "Web" => "#",
        );
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = $this->main_title;
        $dt['user'] =$id_session;
        $dt['data'] = $this->config_model->checkSiswa();
        $dt['base_url'] = $this->base_url;
        $ret = $this->load->view("konfig/add", $dt, true);
        return $ret;
    }
    private function _saveData($id = '') {
//        echoPre($_POST);exit;
        $user_data =  $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        $id = isset($_POST["id"]) ? trim($_POST["id"]) : '';
        $tagline = isset($_POST["tagline"]) ? trim($_POST["tagline"]) : '';
        $namaweb = isset($_POST["namaweb"]) ? trim($_POST["namaweb"]) : '';
        $tentang = isset($_POST["tentang"]) ? trim($_POST["tentang"]) : '';
        $website = isset($_POST["website"]) ? trim($_POST["website"]) : '';
        $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
        $alamat = isset($_POST["alamat"]) ? trim($_POST["alamat"]) : '';
        $telepon = isset($_POST["telepon"]) ? trim($_POST["telepon"]) : '';
        $fax = isset($_POST["fax"]) ? trim($_POST["fax"]) : '';
        $hp = isset($_POST["hp"]) ? trim($_POST["hp"]) : '';
        $facebook = isset($_POST["facebook"]) ? trim($_POST["facebook"]) : '';
        $twitter = isset($_POST["twitter"]) ? trim($_POST["twitter"]) : '';
        $instagram = isset($_POST["instagram"]) ? trim($_POST["instagram"]) : '';
        $keywords = isset($_POST["keywords"]) ? trim($_POST["keywords"]) : '';
        $metatext = isset($_POST["metatext"]) ? trim($_POST["metatext"]) : '';
        $google_map = isset($_POST["google_map"]) ? trim($_POST["google_map"]) : '';
        $return = array(
            "status" => "failed",
            "message" => "Failed to save Article. Please try again."
        );
        $file="";
        // update 
            if (!empty($id)) {
                $edSiswa = array(
                    "namaweb" => $namaweb,
                    "tagline" => $tagline,
                    "alamat" => $alamat,
                    "email" => $email,
                    "website" => $website,
                    "tentang" => $tentang,
                    "telepon" => $telepon,
                    "fax" => $fax,
                    "hp" => $hp,
                    "facebook" => $facebook,
                    "twitter" => $twitter,
                    "instagram" => $instagram,
                    "keywords" => $keywords,
                    "google_map" => $google_map,
                    "metatext" => $metatext,
                );
              $res=  $this->config_model->update($edSiswa, $id);
              if($res['status_cek'] == false){
                    $return = array(
                            "status" => "failed",
                            "message" => "Failed to save"
                        );
                }
                if ($res['status'] == true) {
                    $return = array(
                        "status" => "success",
                        "message" => "Success to update General Konfigurasi."
                    );
                }
            }
        return $return;
    }
    private function _saveLogo($id = '') {
//        echoPre($_POST);exit;
        $user_data =  $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        $id = isset($_POST["id"]) ? trim($_POST["id"]) : '';
        
        $return = array(
            "status" => "failed",
            "message" => "Failed to save Article. Please try again."
        );
        $file="";
        $upload = $this->pengguna_model->upload_file($this->filename);
//      echoPre($upload);exit;
            if ($upload['result'] == "success") { // Jika proses upload sukses
               $file = $upload['file']['file_name'];

            } else { // Jika proses upload gagal
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        // update 
            if (!empty($id)) {
                $edSiswa = array(
                    "logo" => $file,
                );
              $res=  $this->config_model->update($edSiswa, $id);
              if($res['status_cek'] == false){
                    $return = array(
                            "status" => "failed",
                            "message" => "Failed to save"
                        );
                }
                if ($res['status'] == true) {
                    $return = array(
                        "status" => "success",
                        "message" => "Success to update General Konfigurasi."
                    );
                }
            }
        return $return;
    }
  
    
    
    
    
  
  
}

