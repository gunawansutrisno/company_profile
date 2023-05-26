<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends MY_Controller {

    var $meta_title = "MOLINDO INCORPORATED | Manage Surat";
    var $meta_desc = "MOLINDO INCORPORATED";
    var $main_title = "Data Surat";
    var $base_url = "";
    var $upload_dir = "";
    var $upload_url = "";
    var $limit = "10";

    public function __construct() {
        parent::__construct();
        $this->base_url = $this->base_url_site . "surat/";
        $this->load->model("surat_model");
        $this->load->model("suratkeluar_model");
    }

    public function index() {
        $user_data = $this->session->get_userdata();
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
                ASSETS_JS_URL . "form/diagnostik.js",
                ASSETS_URL . "plugins/datatables/jquery.dataTables.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.js",
                ASSETS_URL . "plugins/select2/select2.full.min.js",
                ASSETS_URL . "plugins/validate/jquery.validate_1.11.1.min.js",
                ASSETS_URL . "plugins/datetimepicker/js/moment.js",
                ASSETS_URL . "plugins/datetimepicker/js/bootstrap-datetimepicker.min.js",
                ASSETS_URL . "plugins/autocomplete/js/jquery.autocomplete.js",
                ASSETS_URL . "plugins/daterangepicker/daterangepicker.js",
                ASSETS_URL . "plugins/datepicker/bootstrap-datepicker.js",
                ASSETS_URL . "plugins/ckeditor/ckeditor.js",
            ),
            "custom_css" => array(
                ASSETS_URL . "plugins/autocomplete/css/jquery.autocomplete.css",
                ASSETS_URL . "plugins/datepicker/datepicker3.css",
                ASSETS_URL . "plugins/daterangepicker/daterangepicker.css",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.css",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.css",
                ASSETS_URL . "plugins/select2/select2.min.css",
                ASSETS_URL . "plugins/datetimepicker/css/bootstrap-datetimepicker.min.css",
            ),
        );
        $this->_render("default", $dt);
    }

    public function save() {
        $id = isset($_POST["id"]) ? trim($_POST["id"]) : '';

        $alert = $this->_saveData($id);
        $this->session->set_flashdata("alert_diagnostik", $alert);
        redirect($this->base_url);
    }

    private function _home() {
        $kode_surat = isset($_REQUEST["kode_surat"]) ? $_REQUEST["kode_surat"] : "";
        $nomor_surat = isset($_REQUEST["nomor_surat"]) ? $_REQUEST["nomor_surat"] : "";
        $isi = isset($_REQUEST["isi_ringkasan"]) ? $_REQUEST["isi_ringkasan"] : "";
        $kode_surat = isset($_REQUEST["kode_surat"]) ? $_REQUEST["kode_surat"] : "";
        $tanggal = isset($_REQUEST["tanggalfilter"]) ? $_REQUEST["tanggalfilter"] : "";
        $kategori = $this->surat_model->getkategori();
        
        $tgl = array();
        if (!empty($tanggal)) {
            $t = explode(' - ', $tanggal);
            $tgls = explode("/", $t[0]);
            $tgl['start'] = $tgls[2] . '-' . $tgls[1] . '-' . $tgls[0] . ' 00:00:00';
            $tgle = explode("/", $t[1]);
            $tgl['end'] = $tgle[2] . '-' . $tgle[1] . '-' . $tgle[0] . ' 23:59:59';
        }
        $arrBreadcrumbs = array(
            "Manage" => base_url(),
            "Diagnostik" => $this->base_url,
            "List" => "#",
        );
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = $this->main_title;
        $dt['tanggal'] = $tanggal;
        $dt['isi'] = $isi;
        $dt['kategori'] = $kategori;
        $dt['perusahaan'] = $this->suratkeluar_model->JenisPerusahaan();
        $dt['nomor_surat'] = $nomor_surat;
        $dt['kode_surat'] = $kode_surat;
        $dt['base_url'] = $this->base_url;
        $ret = $this->load->view("diagnostik/add", $dt, true);
        return $ret;
    }

    private function _saveData($id = '') {
        $user_data = $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        $jenis_surat = isset($_POST["jenis_surat"]) ? trim($_POST["jenis_surat"]) : '';
        $index_id = isset($_POST["kategori"]) ? trim($_POST["kategori"]) : '';
        $kop_surat = isset($_POST["kepala_kop"]) ? trim($_POST["kepala_kop"]) : '';
        $isi_kop_surat = isset($_POST["isi_kop"]) ? $_POST["isi_kop"] : '';
        $tgl = isset($_POST["tanggal_terima"]) ? $_POST["tanggal_terima"] : '';
        $createddate = isset($_POST["tanggal_masuk"]) ? $_POST["tanggal_masuk"] : '';
        $no = isset($_POST["nomor"]) ? $_POST["nomor"] : '';
        $nomor = isset($_POST["nomor_surat"]) ? $_POST["nomor_surat"] : '';
        $kode = isset($_POST["kode_surat"]) ? $_POST["kode_surat"] : '';
        $isi_ringkasan = isset($_POST["isi_ringkasan"]) ? $_POST["isi_ringkasan"] : '';
        $mesagein = isset($_POST["nomasuk"]) ? $_POST["nomasuk"] : '';
        $kode_surat = isset($_POST["kode_surat"]) ? $_POST["kode_surat"] : '';
        $return = array(
            "status" => "failed",
            "message" => "Failed to save Author. Please try again."
        );
        $split = explode('-', $tgl);
        $is = "";
        if ($split[1] == 01) {
            $is = "I." . date('y', strtotime($tgl));
        } if ($split[1] == 02) {
            $is = "II." . date('y', strtotime($tgl));
        } if ($split[1] == 03) {
            $is = "III." . date('y', strtotime($tgl));
        } if ($split[1] == 04) {
            $is = "IV." . date('y', strtotime($tgl));
        } if ($split[1] == 05) {
            $is = "V." . date('y', strtotime($tgl));
        } if ($split[1] == 06) {
            $is = "VI." . date('y', strtotime($tgl));
        } if ($split[1] == 07) {
            $is = "VII." . date('y', strtotime($tgl));
        } if ($split[1] == date('m', strtotime($tgl))) {
            $is = "VIII." . date('y', strtotime($tgl));
        } if (date('m', strtotime($tgl)) == date('m', strtotime('-1 month', strtotime(date('Y-m-d'))))) {
            $is = "IX." . date('y', strtotime($tgl));
        } if ($split[1] == 10) {
            $is = "X." . date('y', strtotime($tgl));
        } if ($split[1] == 11) {
            $is = "XI." . date('y', strtotime($tgl));
        } if ($split[1] == 12) {
            $is = "XII." . date('y', strtotime($tgl));
        } if ($index_id == "GENERAL") {
            $sub = substr($index_id, 0, 3);
        } if ($index_id == "DIREKSI") {
            $sub = substr($index_id, 0, 3);
        } if ($index_id == "SECRETARIAT") {
            $sub = substr($index_id, 0, 3);
        } if ($index_id == "PURCHASING") {
            $sub = substr($index_id, 0, 4);
        } if ($index_id == "PRODUCTION") {
            $sub = substr($index_id, 0, 4);
        } if ($index_id == "MARKETING") {
            $sub = substr($index_id, 0, 4);
        } if ($index_id == "PERSONALIA") {
            $sub = substr($index_id, 0, 4);
        } if ($index_id == "AFT"){
            $sub = $index_id;
        } if($index_id == "EDP"){
            $sub = $index_id;
        } if($index_id == "SKI"){
            $sub = $index_id;
        }
        $isi_kop = "";
                if($split[1] == 01){
                    $isi_kop = "1-31 Januari ".$split[2]; 
                } if($split[1] == 02) { 
                     $isi_kop = "1-31 Februari ".$split[2]; 
                } if($split[1] == 03) {
                     $isi_kop = "1-28 Maret ".$split[2]; 
                } if($split[1] == 04) {
                     $isi_kop = "1-30 April ".$split[2]; 
                } if($split[1] == 05) {
                     $isi_kop = "1-31 Mei ".$split[2]; 
                } if($split[1] == 06) {
                     $isi_kop = "1-30 Juni ".$split[2]; 
                } 
                if($split[1] == 07) {
                     $isi_kop = "1-31 Juli ".$split[2]; 
                } 
                if(date('m', strtotime($tgl)) == date('m', strtotime('-2 month', strtotime($tgl)))) {
                     $isi_kop = "1-31 Agustus ".$split[2]; 
                } 
                if(date('m', strtotime($tgl)) == date('m', strtotime('-1 month', strtotime(date('Y-m-d'))))) {
                     $isi_kop = "1-30 September ".$split[2]; 
                } 
              
                if($split[1] == 10) {
                     $isi_kop = "1-31 Oktober ".$split[2]; 
                } 
                if($split[1] == 11) {
                     $isi_kop = "1-31 November ".$split[2]; 
                } 
                if($split[1] == 12) {
                     $isi_kop = "1-31 Desember ".$split[2]; 
                }
        $strtolower = strtolower($sub);
        $str = ucwords($strtolower);
        $kod = $str . '/' . $nomor . '/' . $no . '/' . $is;
        
        if (!empty($_POST['id'])) {
            $edit = array(
                "nomormasuk" => $mesagein,
                "jenis_surat" => $jenis_surat,
                "index_id" => $index_id,
                "kode" => $kod,
                "tgl1" => date('Y-m-d h:i:s', strtotime($tgl)),
                "tgl" => date('Y-m-d'),
                "updateddate" => date('Y-m-d'),
                "no" => $no,
                "nomor" => $nomor,
                "createdby" => $id_session,
                "kop_surat" => $kop_surat,
                "isi_kop_surat" => $isi_kop,
                "isi" => $isi_ringkasan,
                "dari" => isset($_POST["dari_1"]) ? $_POST["dari_1"] : '',
                "dari1" => isset($_POST["dari_2"]) ? $_POST["dari_2"] : '',
                "dari2" => isset($_POST["dari_3"]) ? $_POST["dari_3"] : '',
                "kepada" => isset($_POST["kepada_1"]) ? $_POST["kepada_1"] : '',
                "kepada1" => isset($_POST["kepada_2"]) ? $_POST["kepada_2"] : '',
                "kepada2" => isset($_POST["kepada_3"]) ? $_POST["kepada_3"] : '',
            );
            
            $ids = $this->surat_model->update($edit, $id);
            if ($ids['status'] == TRUE) {
                $return = array(
                    "id" => $ids['id'],
                    "status" => "success",
                    "message" => "Success to Edit Data SURAT. " . $jenis_surat . " "
                );
            }
        }
        return $return;
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
        $data = $this->surat_model->checkEdit($id);
        $kategori = $this->surat_model->getkategori();
        $arrBreadcrumbs = array(
            "Manage" => base_url(),
            "Diagnostik" => $this->base_url,
            "List" => "#",
        );
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = $this->main_title;
        $dt['perusahaan'] = $this->suratkeluar_model->JenisPerusahaan();
        $dt['kategori'] = $kategori;
        $dt['data'] = $data;
        $dt['ind'] = $this->suratkeluar_model->checkIND();
        $dt['base_url'] = $this->base_url;
        $ret = $this->load->view("diagnostik/form", $dt, true);
        return $ret;
    }

    public function delete() {
        $id = isset($_POST["id"]) ? trim($_POST["id"]) : '';
        $alert = array(
            "status" => "failed",
            "message" => "Failed to delete Data. Please try again."
        );
        $res = $this->surat_model->delete($id);
        if ($res['status'] == TRUE) {
            $alert = array(
                "status" => "success",
                "message" => "Success to delete Data."
            );
        }
        $this->session->set_flashdata("alert_diagnostik", $alert);
        redirect($this->base_url);
    }
    public function getDataview() {
        $id = $_POST['rowid'];
        $data = $this->surat_model->checkEdit($id);
        $dt['data'] = $data;
        $ret = $this->load->view("diagnostik/detail", $dt);
    }

    public function getPrint($id) {
        $data = $this->surat_model->checkEdit($id);
        $dt['data'] = $data;
        $ret = $this->load->view("diagnostik/new_print", $dt);
    }

    public function Getprintout() {
        $post = $this->input->post();
       
        $kop = isset($post["kopsurat"]) ? $post["kopsurat"] : "";
        $surat = isset($post["surat"]) ? $post["surat"] : "";
        $tahun = isset($post["tahun"]) ? $post["tahun"] : "";
        $data1 = isset($post["kode1"]) ? $post["kode1"] : "";
        $data2 = isset($post["kode2"]) ? $post["kode2"] : "";
        $alert = array(
            "status" => "failed",
            "message" => "Failed to searching. Please try again."
        );
        $urut=[];
        for ($i= $data1; $i <= $data2; $i++)
            {
                $urut[]= $this->surat_model->getDataPrint($i,$surat,$tahun,$kop);
//                echoPre($this->db->last_query());exit;
               
            }
//        if(!empty($urut)){
//            $retVal['error_stat'] = "Failed To Searching";
//            $retVal['status'] = false;
//        } else {
//            $retVal['error_stat'] = "Success To Searching";
//            $retVal['status'] = true;
//        }
//           
//        if ($retVal['status'] == FALSE) {
//                $alert = array(
//                    "status" => "failed",
//                    "message" => "The data you are looking for was not found. Please try again."
//                );
//        }
//        if(!empty($urut)){
//            $this->session->set_flashdata("alert_diagnostik", $alert);
//            redirect($this->base_url);
//        }
        $dt['dataprint'] = $urut;
        $ret = $this->load->view("diagnostik/print_dua", $dt);
    }

    public function getData() {
        $user_data = $this->session->get_userdata();
        $id_session = $user_data['user_level'];
        $this->isAjaxPost();
        $this->load->library('datatables');
        $post = $this->input->post();
        $surat = isset($post["surat"]) ? $post["surat"] : "";
        $kopsurat = isset($post["kopsurat"]) ? $post["kopsurat"] : "";
        $kategori = isset($post["kategori"]) ? $post["kategori"] : "";
        $kode_surat = isset($post["kode_surat"]) ? $post["kode_surat"] : "";
        $nomor_surat = isset($post["nomor_surat"]) ? $post["nomor_surat"] : "";
        $isi = isset($post["isi_ringkasan"]) ? $post["isi_ringkasan"] : "";
        $dtStart = $post['date1'];
        $dtEnd = $post['date2'];
        $tgl = array();
        if (!empty($dtStart) || ($dtEnd)) {
            $tgl['start'] = date('Y-m-d',  strtotime($dtStart)) . ' 00:00:00';
            $tgl['end'] = date('Y-m-d',  strtotime($dtEnd)) . ' 23:59:59';
        }
        $dataSiswa = $this->surat_model->getDataPasien($surat, $kode_surat, $nomor_surat, $isi, $kategori,$kopsurat, $tgl);
        if ($id_session == 1) {
            $response = $this->datatables->collection($dataSiswa)
                    ->addColumn('tgl1', function($row) {
                        $tgl = date('d F Y', strtotime($row->tgl1));
                        return $tgl;
                    })
                    ->addColumn('isi', function($row) {
                        $isi = substr($row->isi, 0, 30);
                        return $isi;
                    })
                    ->addColumn('createdby', function($row) {
                        $createdby = $row->createdby;
                        return $createdby;
                    })
                    ->addColumn('action', function($row) {
                        $btnAksi = '<a href=""  data-id="' . $row->id . '" '
                                . 'class="btn btn-flat btn-danger btn-sm"  data-toggle="modal" data-target="#delete-data" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>'
                                . '<a href=""  class="btn btn-flat btn-warning btn-sm del" data-id="' . $row->id . '" data-toggle="modal" data-target="#edit-data" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>'
                                . '<a href=""  data-id="' . $row->id . '" class="btn btn-flat btn-success btn-sm" data-toggle="modal" data-target="#detail-data" title="Preview"><span class="glyphicon glyphicon-search"></span></a>'
                                . '<a href="' . base_url('surat/getPrint/' . $row->id) . '"   class="btn btn-flat btn-primary btn-sm"  target="_blank" title="Print"><span class="glyphicon glyphicon-print"></span></a>';
                        return $btnAksi;
                    })
                    ->render();
        } else {
            $response = $this->datatables->collection($dataSiswa)
                    ->addColumn('tgl1', function($row) {
                        $tgl = date('d F Y', strtotime($row->tgl1));
                        return $tgl;
                    })
                    ->addColumn('isi', function($row) {
                        $isi = substr($row->isi, 0, 30);
                        return $isi;
                    })
                    ->addColumn('createdby', function($row) {
                        $createdby = $row->createdby;
                        return $createdby;
                    })
                    ->addColumn('action', function($row) {
                        $btnAksi = ' '
                                . '<a href=""  data-id="' . $row->id . '" class="btn btn-flat btn-success btn-sm" data-toggle="modal" data-target="#detail-data" title="Preview"><span class="glyphicon glyphicon-search"></span></a>'
                                . '<a href="' . base_url('surat/getPrint/' . $row->id) . '"  data-id="' . $row->id . '" class="btn btn-flat btn-primary btn-sm"  target="_blank" title="Print"><span class="glyphicon glyphicon-print"></span></a>';
                        return $btnAksi;
                    })
                    ->render();
        }
        echo json_encode($response);
    }

   

}
