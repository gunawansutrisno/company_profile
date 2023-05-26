<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sejarah extends MY_Controller {

    var $meta_title = "MOLINDO INCORPORATED | Sejarah";
    var $meta_desc = "MOLINDO INCORPORATED ";
    var $main_title = "Home";
    var $base_url = "";
    var $upload_dir = "";
    var $upload_url = "";
    var $limit = "10";

    public function __construct() {
        parent::__construct();
        $this->load->model("Fhome_model");
    }

    public function index() {
//        echoPre('ajsdhad');exit;
        $dt = $this->site();
        $dt["header"] = $this->header();
        $dt["footer"] = 'frontand/home/footer';
        $dt["content"] = 'frontand/home/sejarah';
        $this->load->view("frontand/home/index",$dt);
    }
    function header(){
        $site = $this->site();
        $dt = array(
            'active' => 'sejarah',
            'title'	=> $site['namaweb'].' | '.$site['tagline'],
            'keywords' => $site['namaweb'].', '.$site['keywords'],
            'email' => $site['email'],
            'telp' => $site['telepon'],
            'logo' => $site['logo'],
            'kategori' => $this->Fhome_model->getDatakat(),
            'sub' => $this->Fhome_model->getMenu(),
            'subchild' => $this->Fhome_model->getMenuchild(),
        );
        $this->load->view("frontand/home/header",$dt);
    }
    function site(){
       $data =  $this->Fhome_model->getDataIndex();
       return $data;
    }
}
