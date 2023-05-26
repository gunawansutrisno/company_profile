<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeluar extends MY_Controller {

    var $meta_title = "MOLINDO INCORPORATED | Manage Surat Keluar";
    var $meta_desc = "MOLINDO INCORPORATED";
    var $main_title = "Form Surat Keluar";
    var $base_url = "";
    var $upload_dir = "";
    var $upload_url = "";
    var $limit = "10";

    public function __construct() {
        parent::__construct();
        $this->base_url = $this->base_url_site . "suratkeluar/";
        $this->load->model("suratkeluar_model");
//        $this->load->model("siswa_model");
        $this->load->helper("terbilang");
    }

    public function index() {
        $user_data = $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        $status_session = $user_data['user_status'];
        if (empty($id_session || $status_session)) {
            redirect();
        }
        $dt = array(
            "title" => $this->meta_title,
            "description" => $this->meta_desc,
            "container" => $this->_home(),
            "custom_js" => array(
                ASSETS_JS_URL . "form/kwintansi.js",
                ASSETS_URL . "plugins/datatables/jquery.dataTables.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.js",
                ASSETS_URL . "plugins/select2/select2.min.js",
                ASSETS_URL . "plugins/validate/jquery.validate_1.11.1.min.js",
                ASSETS_URL . "plugins/datetimepicker/js/moment.js",
                ASSETS_URL . "plugins/datetimepicker/js/bootstrap-datetimepicker.min.js",
                ASSETS_URL . "plugins/autocomplete/js/jquery.autocomplete.js",
                ASSETS_URL . "plugins/datepicker/bootstrap-datepicker.js",
                ASSETS_URL . "plugins/daterangepicker/daterangepicker.js",
                ASSETS_URL . "plugins/ckeditor/ckeditor.js",
                ASSETS_URL . "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
            ),
            "custom_css" => array(
                ASSETS_URL . "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css",
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
        $this->session->set_flashdata("alert_kwintansi", $alert);
        redirect($this->base_url_site . "suratkeluar/");
    }

    private function _home() {
        $arrBreadcrumbs = array(
            "Manage" => base_url(),
            "Surat" => $this->base_url,
            "Form Surat" => "#",
        );
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = $this->main_title;
        $dt['ind'] = $this->suratkeluar_model->checkIND();
        $dt['no'] = $this->suratkeluar_model->getKode();
//        exit;
        $dt['perusahaan'] = $this->suratkeluar_model->JenisPerusahaan();
        $dt['base_url_site'] = $this->base_url_site;
        $dt['base_url'] = $this->base_url;
        $ret = $this->load->view("surat/add", $dt, true);
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
        $nomor = isset($_POST["nomor_surat"]) ? $_POST["nomor_surat"] : '';
        $mesagein = isset($_POST["nomasuk"]) ? $_POST["nomasuk"] : '';
        $no = isset($_POST["nomor"]) ? $_POST["nomor"] : '';
        $isi_ringkasan = isset($_POST["isi_ringkasan"]) ? $_POST["isi_ringkasan"] : '';
        $kode_surat = isset($_POST["kode_surat"]) ? $_POST["kode_surat"] : '';
        $return = array(
            "status" => "failed",
            "message" => "Failed to save Author. Please try again."
        );
        $cek_data = $this->suratkeluar_model->CekData($kode_surat, $no, $nomor, $index_id, $isi_ringkasan);
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
        } if (date('m', strtotime($tgl)) == date('m', strtotime('-1 month', strtotime($tgl)))) {
            $is = "VIII." . date('y', strtotime($tgl));
        } if (date('m', strtotime($tgl)) == date('m')) {
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
                if(date('m', strtotime($tgl)) == date('m', strtotime('-1 month', strtotime($tgl)))) {
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
        
        if (!empty($cek_data)) {
            $return = array(
                "status" => "failed",
                "message" => "failed to save, the data your entered already exists."
            );
        } else {
            $insert = array(
                "nomormasuk" => $mesagein,
                "jenis_surat" => $jenis_surat,
                "index_id" => $index_id,
                "kode" => $kod,
                "tgl1" => date('Y-m-d', strtotime($tgl)),
                "tgl" => date('Y-m-d'),
                "createddate" => date('Y-m-d H:i:s'),
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
            $ids = $this->suratkeluar_model->saveData($insert);
            if ($ids['status'] == TRUE) {
                $return = array(
                    "id" => $ids['id'],
                    "status" => "success",
                    "message" => "Success to save Data SURAT. " . $jenis_surat . " "
                );
            }
        }
        return $return;
    }

    public function preview($id) {

        $user_data = $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        if (empty($id_session)) {
            redirect();
        }
        $dt = array(
            "title" => $this->meta_title,
            "description" => $this->meta_desc,
            "container" => $this->_preview($id),
            "custom_js" => array(
                ASSETS_JS_URL . "form/kwintansi.js",
                ASSETS_URL . "plugins/datatables/jquery.dataTables.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.js",
                ASSETS_URL . "plugins/select2/select2.min.js",
                ASSETS_URL . "plugins/validate/jquery.validate_1.11.1.min.js",
                ASSETS_URL . "plugins/datetimepicker/js/moment.js",
                ASSETS_URL . "plugins/datetimepicker/js/bootstrap-datetimepicker.min.js",
                ASSETS_URL . "plugins/autocomplete/js/jquery.autocomplete.js",
                ASSETS_URL . "plugins/datepicker/bootstrap-datepicker.js",
                ASSETS_URL . "plugins/daterangepicker/daterangepicker.js",
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

    public function searching() {
        $user_data = $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        if (empty($id_session)) {
            redirect();
        }
        $sep = isset($_POST["nama"]) ? trim($_POST["nama"]) : '';
        $result = $this->kwintansi_model->getSearch($sep);
        if (empty($result)) {

            $alert = array(
                "status" => "failed",
                "message" => "Sorry, The Data You Are Looking For is Not Found."
            );
            $this->session->set_flashdata("alert_kwintansi", $alert);
            redirect($this->base_url);
        } else {
            $dt = array(
                "title" => $this->meta_title,
                "description" => $this->meta_desc,
                "container" => $this->_homeSearch($result),
                "custom_js" => array(
                    ASSETS_JS_URL . "form/kwintansi.js",
                    ASSETS_URL . "plugins/datatables/jquery.dataTables.min.js",
                    ASSETS_URL . "plugins/datatables/dataTables.bootstrap.min.js",
                    ASSETS_URL . "plugins/datatables/dataTables.responsive.js",
                    ASSETS_URL . "plugins/select2/select2.min.js",
                    ASSETS_URL . "plugins/validate/jquery.validate_1.11.1.min.js",
                    ASSETS_URL . "plugins/datetimepicker/js/moment.js",
                    ASSETS_URL . "plugins/datetimepicker/js/bootstrap-datetimepicker.min.js",
                    ASSETS_URL . "plugins/autocomplete/js/jquery.autocomplete.js",
                    ASSETS_URL . "plugins/datepicker/bootstrap-datepicker.js",
                    ASSETS_URL . "plugins/daterangepicker/daterangepicker.js",
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
    }

    private function _homeSearch($result) {

        $arrBreadcrumbs = array(
            "Manage" => base_url(),
            "Kwintansi" => $this->base_url,
            "Form Edit Kwintansi" => "#",
        );
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = $this->main_title;
        $dt['data'] = $result;
        $dt['jenis'] = $this->kwintansi_model->JenisTindakan();
        $dt['base_url'] = $this->base_url;
        $dt['base_url_preview'] = $this->base_url . 'preview/' . $result['id'];
        $ret = $this->load->view("kwintansi/add_kwintansi", $dt, true);
        return $ret;
    }

    public function getDataPPK() {
        $keyword = $this->uri->segment(3);
        // cari di database
        $data = $this->db->from('refppk')
                ->like('KDPPK', $keyword)
                ->get();

        // format keluaran di dalam array
        foreach ($data->result() as $row) {
            $arr['query'] = $keyword;
            $arr['suggestions'][] = array(
                'value' => $row->NMPPK,
                'code' => $row->KDPPK,
            );
        }
        // minimal PHP 5.2
        echo json_encode($arr);
    }

    public function indexLaporan() {
        $user_data = $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        if (empty($id_session)) {
            redirect();
        }
        $dt = array(
            "title" => $this->meta_title,
            "description" => $this->meta_desc,
            "container" => $this->_homeLaporan(),
            "custom_js" => array(
                ASSETS_JS_URL . "form/laporankwintansi.js",
                ASSETS_URL . "plugins/datatables/jquery.dataTables.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.js",
                ASSETS_URL . "plugins/select2/select2.min.js",
                ASSETS_URL . "plugins/validate/jquery.validate_1.11.1.min.js",
                ASSETS_URL . "plugins/datetimepicker/js/moment.js",
                ASSETS_URL . "plugins/datetimepicker/js/bootstrap-datetimepicker.min.js",
                ASSETS_URL . "plugins/autocomplete/js/jquery.autocomplete.js",
                ASSETS_URL . "plugins/datepicker/bootstrap-datepicker.js",
                ASSETS_URL . "plugins/daterangepicker/daterangepicker.js",
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

}
