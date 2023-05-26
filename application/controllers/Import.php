<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends MY_Controller {

    var $meta_title = "MOLINDO INCORPORATED | Import Data File";
    var $meta_desc = "MOLINDO INCORPORATED";
    var $main_title = "Kirim File Data";
    var $base_url = "";
    var $upload_dir = "";
    var $upload_url = "";
    var $limit = "10";
    private $filename = "import_data";

    public function __construct() {
        parent::__construct();
        $this->base_url = $this->base_url_site . "import/";
        $this->load->model("ImportData_model");
        $this->load->model("suratkeluar_model");
    }

    public function index() {
        $user_data = $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        if (empty($id_session)) {
            redirect();
        }
        $dt = array(
            "title" => $this->meta_title,
            "description" => $this->meta_desc,
            "container" => $this->_home(),
            "custom_js" => array(
                ASSETS_JS_URL . "form/import.js",
                ASSETS_URL . "plugins/datatables/jquery.dataTables.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.js",
                ASSETS_URL . "plugins/select2/select2.full.min.js",
//                ASSETS_URL . "plugins/jQuery/jquery.min.js",
                ASSETS_URL . "plugins/validate/jquery.validate_1.11.1.min.js",
            ),
            "custom_css" => array(
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.css",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.css",
                ASSETS_URL . "plugins/select2/select2.min.css",
            ),
        );
        $this->_render("default", $dt);
    }

    private function _home() {
        $files = isset($_REQUEST["files"]) ? $_REQUEST["files"] : "";
        $arrBreadcrumbs = array(
            "Home" => base_url(),
            "Kirim File" => $this->base_url,
            "List" => "#",
        );
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = $this->main_title;
        $dt['files'] = $files;
        $dt['base_url'] = $this->base_url;
        $ret = $this->load->view("files/add", $dt, true);
        return $ret;
    }

    public function form() {
        $user_data = $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        $status_session = $user_data['user_status'];
        if(empty($id_session || $status_session)){
             redirect();
        }
       $data = array(); // Buat variabel $data sebagai array
        if (isset($_POST['preview'])) {
            $upload = $this->ImportData_model->upload_file($this->filename);
            if ($upload['result'] == "success") { // Jika proses upload sukses
                // Load plugin PHPExcel nya
                include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
                $excelreader = new PHPExcel_Reader_Excel2007();
                $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                $data = $sheet;
            } else { // Jika proses upload gagal
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        }
        $this->add($data);
    }

    public function add($data = '') {
        $dt = array(
            "title" => $this->meta_title,
            "description" => $this->meta_desc,
            "container" => $this->_add($data),
            "custom_js" => array(
                ASSETS_JS_URL . "form/import.js",
                ASSETS_URL . "plugins/datatables/jquery.dataTables.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.js",
                ASSETS_URL . "plugins/select2/select2.full.min.js",
                ASSETS_URL . "plugins/validate/jquery.validate_1.11.1.min.js",
            ),
            "custom_css" => array(
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.css",
                ASSETS_URL . "plugins/datatables/dataTables.responsive.css",
                ASSETS_URL . "plugins/select2/select2.min.css",
            ),
        );
        $this->_render("default", $dt);
    }

    private function _add($data) {
        if (!empty($data['upload_error'])) {
            $return = array(
                "status" => "failed",
                "message" => "You did not select a file to upload."
            );
            $this->session->set_flashdata("alert_import", $return);
            redirect($this->base_url);
        } else if ($data == null) {
            $alert = array(
                "status" => "failed",
                "message" => "error to upload file."
            );
            $this->session->set_flashdata("alert_import", $alert);
            redirect($this->base_url);
        } else {
            $alert = array(
                "status" => "success",
                "message" => "Success to upload file."
            );
        }
        $arrBreadcrumbs = array(
            "Home" => base_url(),
            "Import" => $this->base_url,
            "Preview" => "#",
        );
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = "Preview Import Data Pasien";
        $dt["base_url"] = $this->base_url;
        $dt['sheet'] = $data;
        
        $this->session->set_flashdata("alert_siswa", $alert);
        $ret = $this->load->view("files/form", $dt, true);
        return $ret;
    }

    public function save() {
        $surat = isset($_POST["surat"]) ? trim($_POST["surat"]) : '';
        if(empty($surat)){
            $alert = array(
                       "status" => "failed",
                       "message" => "Failed to save Author. Please try again."
                   );
            $this->session->set_flashdata("alert_import", $alert);
            redirect($this->base_url);
        }
        // Load plugin PHPExcel
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); 
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
        $data = array();
        $data_duplicate = array();
        $numrow = 1;        
        foreach ($sheet as $row) {      
                        $A = $row['A']; 
			$B = $row['B']; 
			$C = $row['C']; 
			$D = $row['D']; 
			$E = $row['E'].
                             $row['F']. 
                             $row['G']. 
                             $row['H']; 
			$J = $row['J']; 
			$K = $row['K']; 
			$L = $row['L']; 
			$M = $row['M']; 
			$N = $row['N']; 
			$O = $row['O']; 
			$P = $row['P']; 
			$Q = $row['Q']; 
			$R = $row['R']; 
            $user_data = $this->session->get_userdata();
            $id_session = $user_data['user_id'];
            if ($numrow > 1) { 
                $cek_data = $this->suratkeluar_model->CekData($D, $C, $Q, $A, $E);
                $splits  = explode('/', $B);
                $split 	 = explode('/', $P);
                $tgl = $split[2]."-".$split[1]."-".$split[0];
                $tgls = $splits[2]."-".$splits[1]."-".$splits[0];
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
                if(date('m', strtotime($tgl)) == date('m')) {
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
                if(empty($cek_data)){
                    $insert = array(
                            'jenis_surat' => $surat,
                            'index_id' => $A ? $A :'',
                            'tgl' => $tgls,
                            'no' => $C ? $C :'',
                            'kode' => $D ? $D :'',
                            'isi' => $E ? $E :'',
                            'dari' => $J ? $J :'',
                            'dari1' => $K ? $K :'',
                            'dari2' => $L ? $L :'',
                            'kepada' => $M ? $M :'',
                            'kepada1' => $N ? $N :'',
                            'kop_surat' => $M ? $M :'',
                            'kepada2' => $O ? $O :'',
                            'nomor' => $Q ? $Q :'',
                            'isi_kop_surat' => $isi_kop ? $isi_kop : '',
                            'tgl1' => $tgl,
                            'importby' => $id_session,
                            'createdby' => $id_session,
                            'createddate' => date('Y-m-d h:i:s'),
                        );
                    $this->db->insert('mst_surat', $insert);
                }else {
                    $alert = array(
                        "status" => "failed",
                        "message" => "error to upload file. the data your entered already exists."
                    );
                    $this->session->set_flashdata("alert_import", $alert);
                    redirect($this->base_url);
                }
            }
            $numrow++; // Tambah 1 setiap kali looping
        }
        $alert = array(
            "status" => "success",
            "message" => "Success to upload file."
        );

        $this->session->set_flashdata("alert_import", $alert);
        redirect($this->base_url);
    }

}
