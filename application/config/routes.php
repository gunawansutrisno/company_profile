<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Pengguna Routes
$route['/pengguna'] = 'pengguna/index';
$route['/pengguna/add'] = 'pengguna/add';
$route['/pengguna/save'] = 'pengguna/save';
$route['/pengguna/edit/(:num)'] = function($param , $id){
    return 'pengguna/edit/'.$id;
};

//$route['/jabatan/'] ='code/index/';
$route['/home/'] ='home/index/';
//profile
$route['/pengguna/delete'] = 'pengguna/delete';
$route['/profile/save_profile'] = 'profile/save_profile';
$route['/profile/edit/(:num)'] = function($param , $id){
    return 'profile/edit/'.$id;
};



$route['/level/delete/(:num)'] = function($param , $id){
      return 'pengguna/delete/'.$id;
};

//Konfigurasi
$route['konfigurasi'] = 'configurasi/index';
$route['konfigurasi/logo'] = 'configurasi/index_logo';
$route['konfigurasi/icone'] = 'configurasi/index_icone';

$route['article'] = 'document/index';
$route['article/creat'] = 'document/add';
$route['article/save'] = 'document/save';
$route['article/edit'] = 'document/edit';
$route['Article/Url/(:any)'] = 'article/index';
$route['Article/Url/Article/ISO/(:any)'] = 'article/index_iso';
$route['download/file/(:any)'] = 'article/download';
$route['view/file/(:any)'] = 'article/view';

//Menu Utama
$route['menu/utama'] = 'Jabatan/index';
$route['menu/utama/save'] = 'Jabatan/save';
$route['/menu/utama/edit/(:num)/(:any)'] = function($param , $id){
    return 'Jabatan/edit/'.$id;
};
//Submenu Utama
$route['submenu/utama'] = 'Submenu/index';
$route['submenu/utama/save'] = 'Submenu/save';
$route['/submenu/utama/edit/(:num)'] = function($param , $id){
    return 'Submenu/edit/'.$id;
};
//Childmenu Utama
$route['childmenu/utama'] = 'menu/index';
$route['childmenu/utama/save'] = 'menu/save';
$route['/childmenu/utama/edit/(:num)'] = function($param , $id){
    return 'menu/edit/'.$id;
};

// Login Routes
$route['/login/'] = 'Login/index';
$route['logout'] = 'login/logout';

//frontand
$route['about'] = 'misi/index';
//$route['default_controller'] = 'login/index';
$route['default_controller'] = 'homefrontand/';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

