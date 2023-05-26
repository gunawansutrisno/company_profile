<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends MY_Controller {

    var $meta_title = "MOLINDO INCORPORATED | ISO";
    var $meta_desc = "MOLINDO INCORPORATED";
    var $main_title = "Data Document";
    var $base_url = "";
    var $upload_dir = "";
    var $upload_url = "";
    var $limit = "10";
    private $filename = "documentiso";

    public function __construct() {
        parent::__construct();
        $this->base_url = $this->base_url_site . "iso/";
        $this->load->model("siswa_model");
        $this->load->model("pengguna_model");
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
            "container" => $this->_home($id_session),
            "custom_js" => array(
                ASSETS_JS_URL . "form/siswa.js",
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
            "Sertifikat ISO" => $this->base_url,
            "List" => "#",
        );

        $dt["breadcrumbs"] = $this->setBreadcrumbs($arrBreadcrumbs);
        $dt["title"] = $this->main_title;
        $dt['user'] = $id_session;
        $dt['base_url'] = $this->base_url;
        $ret = $this->load->view("siswa/add", $dt, true);
        return $ret;
    }

    private function _saveData($id = '') {

        $user_data = $this->session->get_userdata();
        $id_session = $user_data['user_id'];
        $kode = isset($_POST["code"]) ? trim($_POST["code"]) : '';
        $judul = isset($_POST["judul"]) ? trim($_POST["judul"]) : '';
        $jenis = isset($_POST["jenis"]) ? trim($_POST["jenis"]) : '';
        $return = array(
            "status" => "failed",
            "message" => "Failed to save Author. Please try again."
        );
        $cek = $this->siswa_model->getCek($_POST['code']);
        $file = "";
        $upload = $this->pengguna_model->upload_file($this->filename);
        if ($upload['result'] == "success") { // Jika proses upload sukses
            $file = $upload['file']['file_name'];
        } else { // Jika proses upload gagal
            $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
        }
        // update 
        if (!empty($id)) {
//                update siswa
            $cek = $this->siswa_model->check($id);
            $edSiswa = array(
                "code" => $kode,
                "judul" => $judul,
                "jenis" => $jenis,
                "revisi" => $cek->revisi + 1,
                "file" => $file,
                "updateddate" => date('Y-m-d h:i:s'),
                "updatedby" => $id_session,
            );
            if (empty($file)) {
                unset($edSiswa['file']);
            } else {
                unlink("./assets/file/iso/$cek->file");
            }

            $res = $this->siswa_model->update($edSiswa, $id);
            if ($res['status_cek'] == false) {
                $return = array(
                    "status" => "failed",
                    "message" => "Failed to save"
                );
            }
            if ($res['status'] == true) {
                $return = array(
                    "status" => "success",
                    "message" => "Success to update Master Data Document ISO $judul."
                );
            }
        }
        // insert 
        else {
            if (!empty($cek)) {
                $return = array(
                    "status" => "failed",
                    "message" => "failed to save Master Data Document ISO $kode Already Available."
                );
            } else {
                $edSiswa = array(
                    "code" => $kode,
                    "judul" => $judul,
                    "jenis" => $jenis,
                    "file" => $file,
                    "createddate" => date('Y-m-d h:i:s'),
                    "createdby" => $id_session,
                );
                $ids = $this->siswa_model->saveDataSiswa($edSiswa);
                if ($ids['status_cek'] == false) {
                    $return = array(
                        "status" => "failed",
                        "message" => "Failed to save."
                    );
                }
                if ($ids['status'] == true) {
                    $return = array(
                        "status" => "success",
                        "message" => "Success to save Master Data Document ISO $judul."
                    );
                }
            }
        }
        return $return;
    }

    public function getCekSiswa() {
        $id = $_POST['rowid'];
        $data = $this->siswa_model->checkSiswa($id);
        $dt['data'] = $data;
        $ret = $this->load->view("siswa/form", $dt);
    }

    public function getDetSiswa() {
        $id = $_POST['rowid'];
        $data = $this->siswa_model->checkSiswa($id);
        $dt['data'] = $data;
        $ret = $this->load->view("siswa/detail", $dt);
    }

    public function getDataSiswaAll() {
        $user_data = $this->session->get_userdata();
        $id_session = $user_data['user_level'];
        $this->isAjaxPost();
        $this->load->library('datatables');
        $dataSiswa = $this->siswa_model->getDataAgen();
        if ($id_session == 1) {
            $response = $this->datatables->collection($dataSiswa)
                    ->addColumn('status', function($row) {
                        if ($row->status == false) {
                            $btnAksi = '<a href=""  data-id="' . $row->id . '" '
                                    . 'class="btn btn-flat btn-danger btn-sm"  data-toggle="modal" data-target="#active-data" title="Activate" ><span class="glyphicon glyphicon-remove"></span></a>';
                        } else {
                            $btnAksi = '<a href=""  data-id="' . $row->id . '" '
                                    . 'class="btn btn-flat btn-success btn-sm"  data-toggle="modal" data-target="#deactive-data" title="Deactivate" ><span class="glyphicon glyphicon-ok"></span></a>';
                        }
                        return $btnAksi;
                    })
                    ->addColumn('action', function($row) {
                        $btnAksi = '<a href=""  data-id="' . $row->id . '" '
                                . 'class="btn btn-flat btn-warning btn-sm"  data-toggle="modal" data-target="#edit-data" title="Edit" ><span class="glyphicon glyphicon-pencil"></span></a>'
                                . '<a href=""  class="btn btn-flat btn-danger btn-sm del" data-id="' . $row->id . '" data-toggle="modal" data-target="#delete-data" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>'
                                . '<a href=""  data-id="' . $row->id . '" class="btn btn-flat btn-success btn-sm" data-toggle="modal" data-target="#detail-data" title="Detail"><span class="glyphicon glyphicon-search"></span></a>';

//                $btnAksi =  '<a href=""  data-id="'.$row->id. '" class="btn btn-flat btn-success btn-sm" data-toggle="modal" data-target="#detail-data" title="Detail"><span class="glyphicon glyphicon-search"></span></a>'; 

                        return $btnAksi;
                    })
                    ->render();
        } else {
            $response = $this->datatables->collection($dataSiswa)
                    ->addColumn('status', function($row) {
                        if ($row->status == false) {
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
                        $btnAksi = '<a href=""  data-id="' . $row->id . '" class="btn btn-flat btn-success btn-sm" data-toggle="modal" data-target="#detail-data" title="Detail"><span class="glyphicon glyphicon-search"></span></a>';
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

        $res = $this->siswa_model->delete($id);
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
        $res = $this->siswa_model->actived($id);
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
        $res = $this->siswa_model->deactived($id);
        if ($res['status'] == true) {
            $alert = array(
                "status" => "success",
                "message" => "Success to Deactived Document."
            );
        }
        $this->session->set_flashdata("alert_siswa", $alert);
        redirect($this->base_url);
    }

}
