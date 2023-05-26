<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends MY_Controller {

    var $meta_title = "MOLINDO INCORPORATED | Document";
    var $meta_desc = "MOLINDO INCORPORATED";
    var $main_title = "Data Article";
    var $base_url = "";
    var $upload_dir = "";
    var $upload_url = "";
    var $limit = "10";
    private $filename = "document";
    public function __construct() {
        parent::__construct();
        $this->base_url = $this->base_url_site . "document/";
        $this->base_url_new = $this->base_url_site . "article/creat";
        $this->base_url_save = $this->base_url_site . "article/save";
        $this->load->model("document_model");
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
               
                ASSETS_JS_URL . "form/document.js",
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
        
        $alert = $this->_saveData($id);
        $this->session->set_flashdata("alert_siswa", $alert);
        redirect($this->base_url);
    }
    private function _home($id_session) {
        $id_siswa = isset($_REQUEST["id_siswa"]) ? $_REQUEST["id_siswa"] : "";
        $id_jurusan = isset($_REQUEST["id_jurusan"]) ? $_REQUEST["id_jurusan"] : "";
        $nis = isset($_REQUEST["nis"]) ? $_REQUEST["nis"] : "";
        $id_kelas = isset($_REQUEST["id_kelas"]) ? $_REQUEST["id_kelas"] : "";
 
        $arrBreadcrumbs = array(
            "Manage" => base_url(),
            "Article" => $this->base_url,
            "List" => "#",
        );
        
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = $this->main_title;
        $dt['user'] =$id_session;
        $dt['base_url'] = $this->base_url_new;
        $ret = $this->load->view("document/add", $dt, true);
        return $ret;
    }
     public function add() {
         $user_data =  $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        if(empty($id_session)){
             redirect();
        }
        $dt = array(
            "title" => $this->meta_title,
            "description" => $this->meta_desc,
            "container" => $this->_add(),
            "custom_js" => array(
                ASSETS_URL . "plugins/validate/jquery.validate_1.11.1.min.js",
                ASSETS_JS_URL . "form/doc.js",
                ASSETS_URL . "plugins/select2/select2.full.min.js",
                ASSETS_URL . "plugins/ckeditor/ckeditor.js",
                ASSETS_URL . "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
            ),
            "custom_css" => array(
                ASSETS_URL . "plugins/select2/select2.min.css",
                ASSETS_URL . "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css",
            ),
        );
        $this->_render("default", $dt);
    }
     private function _add() {
        
        $arrBreadcrumbs = array(
            "Manage" => base_url(),
            "Article" => $this->base_url,
            "Add" => "#",
        );
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = $this->main_title;
        $dt["base_url"] = $this->base_url_save;
        
//         prepare kategori
        $jenis_mainmenu = $this->document_model->getDataMainMenu();
        $dt["kategori"] = $jenis_mainmenu;
        
        $dt['data']['kode_barang'] = "";
        
        $ret = $this->load->view("document/form", $dt, true);
        return $ret;
    }
    private function _saveData($id = '') {
      
        $user_data =  $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        $id = isset($_POST["id"]) ? trim($_POST["id"]) : '';
        $judul = isset($_POST["title"]) ? trim($_POST["title"]) : '';
        $jenis = isset($_POST["jenis"]) ? trim($_POST["jenis"]) : '';
        $status = isset($_POST["status"]) ? trim($_POST["status"]) : '';
        $kategori = isset($_POST["kategori"]) ? trim($_POST["kategori"]) : '';
        $subkategori = isset($_POST["subkategori"]) ? trim($_POST["subkategori"]) : '';
        $deskripsi = isset($_POST["deskripsi"]) ? trim($_POST["deskripsi"]) : '';
        $return = array(
            "status" => "failed",
            "message" => "Failed to save Article. Please try again."
        );
        $file="";
        $upload = $this->pengguna_model->upload_file($this->filename);
       
              if ($upload['result'] == "success") { // Jika proses upload sukses
                 $file = $upload['file']['file_name'];

              } else { // Jika proses upload gagal
                  $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
              }
               
        // update 
            if (!empty($id)) {
//                update siswa
                $cek = $this->document_model->check($id);
                $edSiswa = array(
                    "deskripsi" => $deskripsi,
                    "judul" => $judul,
                    "jenis" => $jenis,
                    "kategori" => $kategori,
                    "subkategori" => $subkategori,
                    "revisi" => $cek->revisi + 1,
                    "file" => $file,
                    "status" => $status,
                    "updateddate" => date('Y-m-d h:i:s'),
                    "updatedby" => $id_session,
                );
                if(empty($file)){
                    unset($edSiswa['file']);
                } else {
                    unlink("./assets/file/document/$cek->file");
                }
              $res=  $this->document_model->update($edSiswa, $id);
              if($res['status_cek'] == false){
                    $return = array(
                            "status" => "failed",
                            "message" => "Failed to save"
                        );
                }
                if ($res['status'] == true) {
                    $return = array(
                        "status" => "success",
                        "message" => "Success to update Master Data Article $judul."
                    );
                }
            }
            // insert 
            else {
                $edSiswa = array(
                    "deskripsi" => $deskripsi,
                    "judul" => $judul,
                    "jenis" => $jenis,
                    "kategori" => $kategori,
                    "subkategori" => $subkategori,
                    "file" => $file,
                    "status" => $status,
                    "createddate" => date('Y-m-d h:i:s'),
                    "createdby" => $id_session,
                );
//                echopre($edSiswa);exit;
                $ids = $this->document_model->saveDataSiswa($edSiswa);
                if($ids['status_cek'] == false){
                    $return = array(
                            "status" => "failed",
                            "message" => "Failed to save."
                        );
                }
                if ($ids['status'] == true) {
                    $return = array(
                        "status" => "success",
                        "message" => "Success to save Article $judul."
                    );
                }  
                
        }
        return $return;
    }
  public function getDocument(){
    $id = $_POST['rowid'];
    $data = $this->document_model->checkSiswa($id);
    $dt['data'] = $data;  
    $ret = $this->load->view("document/form", $dt);
    }
  public function getDetDocument(){
        $id = $_POST['rowid'];
        $data = $this->document_model->checkSiswa($id);
//        echoPre($data);exit;
        $dt['data'] = $data;  
        $ret = $this->load->view("document/detail", $dt);
    }
    public function getDataSiswaAll(){
        $user_data = $this->session->get_userdata();
        $id_session = $user_data['user_level'];
        $this->isAjaxPost();
        $this->load->library('datatables');
        $dataSiswa = $this->document_model->getDataAgen();
        if($id_session == 1){
         $response = $this->datatables->collection($dataSiswa)
                 
        ->addColumn('status', function($row) {
            if($row->status == false){
                $btnAksi = '<a href=""  data-id="'.$row->id.'" ' 
                        . 'class="btn btn-flat btn-danger btn-sm"  data-toggle="modal" data-target="#active-data" title="Activate" ><span class="glyphicon glyphicon-remove"></span></a>';
            } else {
                $btnAksi = '<a href=""  data-id="'.$row->id.'" ' 
                        . 'class="btn btn-flat btn-success btn-sm"  data-toggle="modal" data-target="#deactive-data" title="Deactivate" ><span class="glyphicon glyphicon-ok"></span></a>';
            } 
          return $btnAksi;
        })
        ->addColumn('action', function($row) {
                $btnAksi =  '<a href=""  data-id="'.$row->id.'" ' 
                    .'class="btn btn-flat btn-warning btn-sm"  data-toggle="modal" data-target="#edit-data" title="Edit" ><span class="glyphicon glyphicon-pencil"></span></a>'
                    .'<a href=""  class="btn btn-flat btn-danger btn-sm del" data-id="'.$row->id.'" data-toggle="modal" data-target="#delete-data" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>'
                    .'<a href=""  data-id="'.$row->id. '" class="btn btn-flat btn-success btn-sm" data-toggle="modal" data-target="#detail-data" title="Detail"><span class="glyphicon glyphicon-search"></span></a>'; 

//                $btnAksi =  '<a href=""  data-id="'.$row->id. '" class="btn btn-flat btn-success btn-sm" data-toggle="modal" data-target="#detail-data" title="Detail"><span class="glyphicon glyphicon-search"></span></a>'; 

            return $btnAksi;
        })
            ->render(); 
        } else {
            $response = $this->datatables->collection($dataSiswa)
                 
        ->addColumn('status', function($row) {
            if($row->status == false){
                $btnAksi = '<span class="pull-right-container">
              <small class="label bg-red">Deactivate</small>
            </span>';
            } else {
                $btnAksi = '<span class="pull-right-container">
              <small class="label bg-green">Activate</small>
            </span>';
            } 
          return $btnAksi;
        })
        ->addColumn('action', function($row) {
                $btnAksi =  '<a href=""  data-id="'.$row->id. '" class="btn btn-flat btn-success btn-sm" data-toggle="modal" data-target="#detail-data" title="Detail"><span class="glyphicon glyphicon-search"></span></a>'; 
                return $btnAksi;
        })
            ->render(); 
        }
        echo json_encode($response);
    }
    public function delete($id) {

        $alert = array(
               "status" => "failed",
               "message" => "Failed to delete Document. Please try again."
           );
        
        $res = $this->document_model->delete($id);
        if ($res['status'] == true) {
            $alert = array(
                "status" => "success",
                "message" => "Success to delete Document."
            );
        }
        
        $this->session->set_flashdata("alert_siswa", $alert);
        redirect($this->base_url);
    }
    public function active($id) {
        $alert = array(
               "status" => "failed",
               "message" => "Failed to Actived Document. Please try again."
           );
        $res = $this->document_model->actived($id);
        if ($res['status'] == true) {
            $alert = array(
                "status" => "success",
                "message" => "Success to Actived Document."
            );
        }
        $this->session->set_flashdata("alert_siswa", $alert);
        redirect($this->base_url);
    }
    public function deactive($id) {
        $alert = array(
               "status" => "failed",
               "message" => "Failed to Deactived Document. Please try again."
           );
        $res = $this->document_model->deactived($id);
        if ($res['status'] == true) {
            $alert = array(
                "status" => "success",
                "message" => "Success to Deactived Document."
            );
        }
        $this->session->set_flashdata("alert_siswa", $alert);
        redirect($this->base_url);
    }
  public function getambil_data(){

        $modul=$this->input->post('modul');
		echopre($modul);
        $id=$this->input->post('id');
       
        if($modul=="kabupaten"){
             echo $this->document_model->kabupaten($id);
        }
        else if($modul=="kecamatan"){
             echo $this->document_model->kecamatan($id);
        }
   }
   public function edit() {
        $id = isset($_POST["id"]) ? trim($_POST["id"]) : '';
        $user_data = $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        if (empty($id_session)) {
            redirect();
        }
        $dt = array(
            "title" => $this->meta_title,
            "description" => $this->meta_desc,
            "container" => $this->_homeEdit($id),
            "custom_js" => array(
                ASSETS_JS_URL . "form/diagnostikedit.js",
                ASSETS_URL . "plugins/datatables/jquery.dataTables.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.js",
                ASSETS_URL . "plugins/select2/select2.full.min.js",
                ASSETS_URL . "plugins/validate/jquery.validate_1.11.1.min.js",
                ASSETS_URL . "plugins/datetimepicker/js/moment.js",
                ASSETS_URL . "plugins/datepicker/bootstrap-datepicker.js",
                ASSETS_URL . "plugins/datetimepicker/js/bootstrap-datetimepicker.min.js",
                ASSETS_URL . "plugins/autocomplete/js/jquery.autocomplete.js",
                ASSETS_URL . "plugins/daterangepicker/daterangepicker.js",
                ASSETS_URL . "plugins/ckeditor/ckeditor.js",
                ASSETS_URL . "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
            ),
            "custom_css" => array(
                ASSETS_URL . "plugins/autocomplete/css/jquery.autocomplete.css",
                ASSETS_URL . "plugins/datepicker/datepicker3.css",
                ASSETS_URL . "plugins/daterangepicker/daterangepicker.css",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.css",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.css",
                ASSETS_URL . "plugins/select2/select2.min.css",
                ASSETS_URL . "plugins/datetimepicker/css/bootstrap-datetimepicker.min.css",
                ASSETS_URL . "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css",
            ),
        );
        $this->_render("default", $dt);
    }

    private function _homeEdit($id) {
       
        $data = $this->document_model->checkSiswa($id);
        $jenis_mainmenu = $this->document_model->getDataMainMenu();
        $submenu = $this->document_model->getDataSubMenu();
        $childmenu = $this->document_model->getDataChildMenu();
//         echoPre($submenu);exit;
        $arrBreadcrumbs = array(
            "Manage" => base_url(),
            "Article" => $this->base_url,
            "Edit" => "#",
        );
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = $this->main_title;
        $dt['data'] = $data;
        $dt["kategori"] = $jenis_mainmenu;
        $dt["submenu"] = $submenu;
        $dt["childmenu"] = $childmenu;
        $dt["kat_select"] = '';
        $dt["sub_select"] = '';
        $dt["child_select"] = '';
        $dt['base_url'] = $this->base_url_save;
        $ret = $this->load->view("document/form_edit", $dt, true);
        return $ret;
    }
}

