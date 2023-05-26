<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fhome_model extends CI_Model {

    var $table = "konfigurasi";
    var $primary_key = "id";

    public function __construct() {
        parent::__construct();
    }

    public function getDataIndex() {

        $this->db->select('*');
        $this->db->from($this->table);
        $data = $this->db->get();
        return $data->row_array();
    }
    public function getDatakat() {

        $this->db->select('mst_document.judul,mst_menu.id,mst_menu.name');
        $this->db->from('mst_menu');
        $this->db->join('mst_document','mst_document.kategori = mst_menu.id','left');
        $this->db->where('mst_menu.status',1);
        $this->db->group_by('mst_menu.id');
        $data = $this->db->get();
        return $data->result_array();
    }
    function getMenu($data=""){
        $this->db->select('tr_menu.id,tr_menu.submenu,tr_menu.menu_id,mst_document.judul');
        $this->db->from('tr_menu');
        $this->db->join('mst_document','mst_document.subkategori = tr_menu.id','left');
        $this->db->where('tr_menu.status',1);
        $this->db->group_by('tr_menu.id');
        $this->db->order_by('tr_menu.submenu','ASC');
        $data = $this->db->get();
        return $data->result_array();
    }
    function getMenuchild(){
        $this->db->select('tr_submenu.id,tr_submenu.submenu_id,tr_submenu.mainmenu,tr_submenu.url,mst_document.judul');
        $this->db->from('tr_submenu');
        $this->db->join('mst_document','mst_document.jenis = tr_submenu.id','left');
        $this->db->where('tr_submenu.status',1);
        $this->db->group_by('tr_submenu.id');
        $data = $this->db->get();
        return $data->result_array();
    }
    function getDataurl($data=""){
        
     
        $cek = $this->db->select('*')
                ->from('mst_menu')
                ->where('url',$data)
                ->get()
                ->row_array();
		
        $d = str_replace("-", " ", $data);
		
		if(!empty($cek['url'])){
			 $cektr = $this->db->select('*')
                ->from('tr_menu')->where('menu_id', $cek['id'])
                ->get()
                ->result_array();
                 if(!empty($cektr)){
					   $dats = $this->db->select('COUNT(mst_document.id) as jumlah,mst_document.judul,  tr_menu.submenu, tr_menu.submenu_url,tr_menu.menu_id')
                                ->from('mst_document')
                                ->join('mst_menu','mst_menu.id = mst_document.kategori','left')
                                ->join('tr_menu','tr_menu.id = mst_document.subkategori')
                                ->join('tr_submenu','tr_submenu.id = mst_document.jenis','left')
                                ->join('mst_users','mst_users.id = mst_document.createdby','left')
                                ->where('kategori', $cek['id'])
								->group_by('tr_menu.submenu')
                                ->get()->result_array();
                return $dats;
				
                 }else {
             $dats = $this->db->select('mst_document.id,
                                           mst_document.judul,
                                           mst_document.createddate,
                                           mst_document.file,
                                           mst_document.deskripsi,
                                           mst_menu.name,
                                           tr_menu.submenu,
                                           tr_submenu.mainmenu,
                                           mst_users.nama')
                                ->from('mst_document')
                                ->join('mst_menu','mst_menu.id = mst_document.kategori','left')
                                ->join('tr_menu','tr_menu.id = mst_document.subkategori','left')
                                ->join('tr_submenu','tr_submenu.id = mst_document.jenis','left')
                                ->join('mst_users','mst_users.id = mst_document.createdby','left')
                                ->where('kategori', $cek['id'])
                                ->get()->result_array();
                return $dats;
                 }
		}else if($cek['name'] == $d){
                 $cektr = $this->db->select('*')
                ->from('tr_menu')->where('menu_id', $cek['id'])
                ->get()
                ->result_array();
                 if(!empty($cektr)){
                     return $cektr;
                 }else {
             $dats = $this->db->select('mst_document.id,
                                           mst_document.judul,
                                           mst_document.createddate,
                                           mst_document.file,
                                           mst_document.deskripsi,
                                           mst_menu.name,
                                           tr_menu.submenu,
                                           tr_submenu.mainmenu,
                                           mst_users.nama')
                                ->from('mst_document')
                                ->join('mst_menu','mst_menu.id = mst_document.kategori','left')
                                ->join('tr_menu','tr_menu.id = mst_document.subkategori','left')
                                ->join('tr_submenu','tr_submenu.id = mst_document.jenis','left')
                                ->join('mst_users','mst_users.id = mst_document.createdby','left')
                                ->where('kategori', $cek['id'])
                                ->get()->result_array();
                return $dats;
                 }
            
	}else {
		
                $ceks = $this->db->select('*')
                ->from('tr_menu')->where('submenu_url', $data)
                ->get()
                ->row_array();
				
                if(!empty($ceks)){
                    $cektr = $this->db->select('*')
                    ->from('tr_submenu')
                    ->where('submenu_id', $ceks['id'])
                    ->get()
                    ->result_array();
                    if(empty($cektr)){
                        $dat = $this->db->select('mst_document.id,
                                           mst_document.judul,
                                           mst_document.createddate,
                                           mst_document.file,
                                           mst_document.deskripsi,
                                           mst_menu.name as menu_utama,
                                           tr_menu.submenu as menu_dua,
                                           tr_submenu.mainmenu as menu_tiga,
                                           mst_users.nama')
                                ->from('mst_document')
                                ->join('mst_menu','mst_menu.id = mst_document.kategori','left')
                                ->join('tr_menu','tr_menu.id = mst_document.subkategori','left')
                                ->join('tr_submenu','tr_submenu.id = mst_document.jenis','left')
                                ->join('mst_users','mst_users.id = mst_document.createdby','left')
                                ->where('subkategori', $ceks['id'])
                                ->get()->result_array();
                        return $dat;
                    } else {
						 $dats = $this->db->select('COUNT(mst_document.id) as jumlah,  tr_submenu.mainmenu')
                                ->from('mst_document')
                                ->join('mst_menu','mst_menu.id = mst_document.kategori','left')
                                ->join('tr_menu','tr_menu.id = mst_document.subkategori','left')
                                ->join('tr_submenu','tr_submenu.id = mst_document.jenis','left')
                                ->join('mst_users','mst_users.id = mst_document.createdby','left')
                                ->where('submenu_id', $ceks['id'])
								->group_by('tr_submenu.mainmenu')
                                ->get()->result_array();
                return $dats;
                    }
            } 
        }
    }
    function getDataurl_i($url=""){
		$cektr = $this->db->select('*')
                    ->from('tr_submenu')
                    ->like('url', $url)
                    ->get()
                    ->row_array();
            if(isset($cektr)){
                $cek1 = $this->db->select('mst_document.id,
                                           mst_document.judul,
                                           mst_document.createddate,
                                           mst_document.file,
                                           mst_document.deskripsi,
                                           mst_menu.name,
                                           tr_menu.submenu,
                                           tr_submenu.mainmenu,
                                           mst_users.nama')
                                ->from('mst_document')
                                ->join('mst_menu','mst_menu.id = mst_document.kategori','left')
                                ->join('tr_menu','tr_menu.id = mst_document.subkategori','left')
                                ->join('tr_submenu','tr_submenu.id = mst_document.jenis','left')
                                ->join('mst_users','mst_users.id = mst_document.createdby','left')
                                ->where('jenis', $cektr['id'])
                                ->get()->result_array();
                return $cek1;
            }
    }
    function getDataurlDownload($url=""){
      $cek1 = $this->db->select('*')
                                ->from('mst_document')
                                ->like('file', $url)
                                ->get()->row_array();
                return $cek1;
    }
}
