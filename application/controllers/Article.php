<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller {

    var $meta_title = "MOLINDO INCORPORATED | Kontak";
    var $meta_desc = "MOLINDO INCORPORATED ";
    var $main_title = "Home";
    var $base_url = "";
    var $upload_dir = "";
    var $upload_url = "";
    var $limit = "10";

    public function __construct() {
        parent::__construct();
        $this->load->model("Fhome_model");
        $this->load->helper('url');
    }

    public function index() {
        $url = $this->uri->segment('3');
		
        $dat = $this->Fhome_model->getDataurl($url);
		//echoPre($this->db->last_query());exit;
        $cek ="";
        foreach($dat as $r){
           $cek = $r;
        }
        $dt = $this->site();
        $dt['sub'] =  str_replace("-", " ", $url);
        $dt["header"] = $this->header();
        $dt["footer"] = 'frontand/home/footer';
        if(!empty($cek['submenu'])){
             $dt['data'] = $dat;
            $dt["content"] = 'frontand/home/contentarticle';
        }else if(!empty($cek['mainmenu'])){
            $dt['data'] = $dat;
            $dt["content"] = 'frontand/home/content_article';
        }else {
            $dt['data'] = $dat;
            $dt["content"] = 'frontand/home/articleall';
        }
        $this->load->view("frontand/home/index",$dt);
    }
    public function index_iso() {
        $url = $this->uri->segment('5');
    
        $dt = $this->site();
        $dt['data'] = $this->Fhome_model->getDataurl_i($url);
        $dt['sub'] =  str_replace("-", " ", $url);        
        $dt["header"] = $this->header();
        $dt["footer"] = 'frontand/home/footer';
        $dt["content"] = 'frontand/home/articleall';
        $this->load->view("frontand/home/index",$dt);
    }
    function header(){
        $site = $this->site();
        $dt = array(
            'active' => 'kontak',
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
    public function download($data=""){
        $url = $this->uri->segment('3');
        $dt = $this->Fhome_model->getDataurlDownload($url);
        force_download('assets/file/document/'.$dt['file'], NULL);
    }
	public function view($url=""){
        $url = $this->uri->segment('3');
        $dt = $this->Fhome_model->getDataurlDownload($url);
        $this->load->view('frontand/home/preview',$dt);
    }
}
