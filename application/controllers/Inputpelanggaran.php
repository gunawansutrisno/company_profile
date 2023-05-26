<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inputpelanggaran extends MY_Controller {

    var $meta_title = "Siakad | Guru";
    var $meta_desc = "Siakad";
    var $main_title = "Data Pelanggaran";
    var $base_url = "";
    var $upload_dir = "";
    var $upload_url = "";
    var $limit = "10";

    public function __construct() {
        parent::__construct();
        $this->base_url = $this->base_url_site . "pelanggaran/";
        $this->load->model("pelanggaran_model");
    }

    public function index() {
        $dt = array(
            "title" => $this->meta_title,
            "description" => $this->meta_desc,
            "container" => $this->_home(),
            "custom_js" => array(
                ASSETS_JS_URL . "form/pelanggaran.js",
                //ASSETS_JS_URL . "form/datatable.js",
                ASSETS_URL . "plugins/datatables/jquery.dataTables.min.js",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.min.js",
                ASSETS_URL . "plugins/datepicker/bootstrap-datepicker.js",
                ASSETS_URL . "plugins/daterangepicker/moment.min.js",
                ASSETS_URL . "plugins/daterangepicker/daterangepicker.js",
            ),
            "custom_css" => array(
                ASSETS_URL . "plugins/datepicker/datepicker3.css",
                ASSETS_URL . "plugins/daterangepicker/daterangepicker.css",
                ASSETS_URL . "plugins/datatables/dataTables.bootstrap.css",
            ),
        );
        $this->_render("default", $dt);
    }

    private function _home() {
        $page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : 1;
        $search = isset($_REQUEST["search"]) ? $_REQUEST["search"] : "";
        $start = ($page - 1) * $this->limit;
        $provinsi = isset($_REQUEST["provinsi"]) ? $_REQUEST["provinsi"] : "";
//        $kota = $this->pelanggaran_model->getPpelanggaran();
        $data = $this->pelanggaran_model->getDataIndex($start, $this->limit, $search);
        $countTotal = $this->pelanggaran_model->getCountDataIndex($search);
        $arrBreadcrumbs = array(
            "Home" => base_url(),
            "Master Pelanggaran" => $this->base_url,
            "List" => "#",
        );
        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = $this->main_title;
        $dt["data"] = $data;
        $dt['provinsi'] = $provinsi;
//        $dt['kota'] = $kota;
        $dt["pagination"] = $this->_build_pagination($this->base_url, $countTotal, $this->limit, true, "&search=" . $search);
        $dt["base_url"] = $this->base_url;
        $ret = $this->load->view("pelanggaran/content", $dt, true);
        return $ret;
    }

    public function ajax_list() {

        //  $this->isAjaxPost();

        $post = $this->input->post();
        $nama = $post['IDprovinsi'];
         
        $list = $this->pelanggaran_model->get_datatables($nama);
//       echopre($list);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $dt) {
            $no++;

            $row = array();
            $row[] = '<a href="#" onclick="loadData(' . "'" . $this->base_url . 'edit/' . $dt->id . "'" . ')">' . $dt->nama . '</a>';
            $row[] = $dt->nilai_pelanggaran;
            $row[] = '<a href="javascript:void(0)" onclick="deleteData(' . "'" . $dt->id . "'" . ')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pelanggaran_model->count_all(),
            "recordsFiltered" => $this->pelanggaran_model->count_filtered($nama),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function edit($term_id) {
        header('Content-Type: application/json');
        $data = $this->pelanggaran_model->getDetail($term_id);
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

        $nama = isset($_POST["nilai_pelanggaran"]) ? trim($_POST["nama"]) : '';
        $nilai_pelanggaran = isset($_POST["nilai_pelanggaran"]) ? trim($_POST["nilai_pelanggaran"]) : '';
        $return = array(
            "status" => "failed",
            "message" => "Failed to save Jenis Pelanggaran. Please try again."
        );

        // update category
        if (!empty($nama)) {
            if (!empty($id)) {
                $edit = array(
                    "nama" => $nama,
                     "nilai_pelanggaran" =>  $nilai_pelanggaran,
                );

                $res = $this->pelanggaran_model->updateDetail($edit, $id);
                if ($res['status'] == true) {
                    $return = array(
                        "status" => "success",
                        "message" => "Success to update Jenis Pelanggaran $nama."
                    );
                }
            }
            // insert category
            else {
                $insert = array(
                    "nama" => $nama,
                     "nilai_pelanggaran" =>  $nilai_pelanggaran,
                );
                $res = $this->pelanggaran_model->saveData($insert);
                if ($res['status'] == true) {
                    $return = array(
                        "status" => "success",
                        "message" => "Success to save Jenis Pelanggaran $nama."
                    );
                }
            }
        }
        return $return;
    }
}
