<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Misi extends MY_Controller {

    var $meta_title = "MOLINDO INCORPORATED | Visi & Misi";
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
        $dt = $this->site();
        $dt["header"] = $this->header();
        $dt["content"] = 'frontand/home/misi';
        $dt["footer"] = 'frontand/home/footer';
        $this->load->view("frontand/home/index",$dt);
    }
    function header(){
        $site = $this->site();
        $dt = array(
            'active' => 'visi&misi',
            'title'	=> $site['namaweb'].' | '.$site['tagline'],
            'keywords' => $site['namaweb'].', '.$site['keywords'],
            'email' => $site['email'],
            'telp' => $site['telepon'],
            'logo' => $site['logo'],
            'kategori' => $this->Fhome_model->getDatakat(),
            'sub' => $this->Fhome_model->getMenu(),
        );
        $this->load->view("frontand/home/header",$dt);
    }
    function site(){
       $data =  $this->Fhome_model->getDataIndex();
       return $data;
    }
}
