<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {

    var $meta_title = "APPMOLINDO | Laporan";
    var $meta_desc = "APPMOLINDO";
    var $main_title = "Laporan";
    var $base_url = "";
    var $upload_dir = "";
    var $upload_url = "";
    var $limit = "10";

    public function __construct() {
        parent::__construct();
        $this->base_url = $this->base_url_site . "laporan";
        $this->load->model("laporan_model");
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
                ASSETS_JS_URL . "form/laporanoprasi.js",
                ASSETS_URL . "plugins/select2/select2.full.min.js", 
                ASSETS_URL . "plugins/datatables/jquery.dataTables.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.min.js",
                ASSETS_URL . "plugins/datepicker/bootstrap-datepicker.js",                
                ASSETS_URL . "plugins/daterangepicker/moment.min.js",
                ASSETS_URL . "plugins/daterangepicker/daterangepicker.js",
            ),
            "custom_css" => array(
                ASSETS_URL . "plugins/select2/select2.min.css",
                ASSETS_URL . "plugins/datepicker/datepicker3.css",
                ASSETS_URL . "plugins/daterangepicker/daterangepicker.css",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.css",
            ),
        );
        
        $this->_render("default", $dt);
    }
    private function _home(){
        
        $nomor_surat = isset($_REQUEST["nomor_surat"]) ? $_REQUEST["nomor_surat"] : "";
        $kode = isset($_REQUEST["kode"]) ? $_REQUEST["kode"] : "";
        $isi_ringkasan = isset($_REQUEST["isi_ringkasan"]) ? $_REQUEST["isi_ringkasan"] : "";
        $dtStart =  isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";
        $dtEnd =  isset($_REQUEST["date2"]) ? $_REQUEST["date2"] : "";
        $tgl = array();
        if(!empty($dtStart) || ($dtEnd)){
            $tgl['start'] = $dtStart.' 00:00:00';
            $tgl['end'] = $dtEnd.' 23:59:59';
        }
        $post = array(
             'nomor_surat' => $nomor_surat,
             'kode' => $kode,
             'isi_ringkasan' => $isi_ringkasan,
             'tanggal' => $tgl,
        );
       
        $url = $this->base_url_site."laporan/";
        $arrBreadcrumbs = array(
            "Laporan" => base_url(),
            "Laporan Data Surat" => $url,
            "Form" => "#",
        );
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = "Laporan";
        $dt['isi_ringkasan'] = $isi_ringkasan;
        $dt['kode'] = $kode;
        $dt['nomor_surat'] = $nomor_surat;
        $dt["base_url"] = $url;
        $dt['post'] = json_encode($post);
        $ret = $this->load->view("laporan/laporansurat", $dt, true);
        return $ret;
    }
   public function getData(){
        $t = $this->isAjaxPost();     
        $this->load->library('datatables');
        $post = $this->input->post();
        $dtStart = $post['date1'];
        $dtEnd = $post['date2'];
        $tgl = array();
        if(!empty($dtStart) || ($dtEnd)){
            $tgl['start'] = $dtStart.' 00:00:00';
            $tgl['end'] = $dtEnd.' 23:59:59';
        }
         $kode = $post['kode'];
        $nomor = $post['nomor_surat'];
        $isi_ringkasan = $post['isi_ringkasan'];
        $dataTransaksi = $this->laporan_model->getDataTrans($kode, $nomor, $isi_ringkasan, $tgl);
        
        if(!empty($dataTransaksi)){
        $response = $this->datatables->collection($dataTransaksi)
            ->render();
        echo json_encode($response);
        }
    }
   public function export(){
       echoPre($_POST);exit;
//       $status_pembayaran = isset($_POST["status"]) ? $_POST["status"] : "";
        $dtStart =  isset($_POST["date1"]) ? $_POST["date1"] : "";
        $dtEnd =  isset($_POST["date2"]) ? $_POST["date2"] : "";
        $tgl = array();
        if(!empty($dtStart) || ($dtEnd)){
            $tgl['start'] = $dtStart.' 00:00:00';
            $tgl['end'] = $dtEnd.' 23:59:59';
        }
        $transaksi = $this->laporanoprasi_model->getDataIndexexport($status_pembayaran, $tgl) ;
      
        $heading=array('No. SEP','Nama Pasien','Tanggal Tindakan','Jenis Tindakan','Dokter / Operator', 'Status','Keterangan');
        $this->load->library('Excel/Classes/PHPExcel');
        //Create a new Object
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle('Laporan Tindakan Diagnostik');
        //Loop Heading
        $status_pembayaran = $this->config->item('status');
        $rowNumberH = 1;
        $colH = 'A';
        foreach($heading as $h){
            $objPHPExcel->getActiveSheet()->setCellValue($colH.$rowNumberH,$h);
            $colH++;    
        }
        $i=1;
        foreach($transaksi->result() as $n){$i++;
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$n->nosep);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$n->pasien);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$n->tanggal);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$n->jenis);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$n->dokter);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$status_pembayaran[$n->status]);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$i,$n->notes);

          }
        $objPHPExcel->getActiveSheet()->freezePane('A2');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $date= date('d-m-Y');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan-Tindakan-Diagnostik-'.$date.'.xls"');
        header('Cache-Control: max-age=0');

        $objWriter->save('php://output');
        exit();
    }

}
