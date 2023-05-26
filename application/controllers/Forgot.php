<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends MY_Controller {

    var $meta_title = "Global | Forgot";
    var $meta_desc = "Global ";
    var $main_title = "Forgot";
    var $base_url = "";
    var $upload_dir = "";
    var $upload_url = "";
    var $limit = "10";

    public function __construct() {
        parent::__construct();
        $this->base_url = base_url() . "forgot/";
        $this->load->model("forgot_model");
        $this->load->model("levelmenu_model");
    }

    public function index() {
//         echo(sha1('gunawan'));exit;
        $res = "";
        if (isset($_POST['submit'])) {
            $res = $this->checkLogin();
        }

        $dt["alert"] = $res;
        $this->load->view("login/forgot", $dt);
    }
    

    public function checkLogin() {
        $reset = random_string('almun', 50);
        echoPre($reset);exit;
        $res = array();
        $username = $this->security->xss_clean($this->input->post("email"));
    if(empty($username)){
         $res["status"] = "failed";
            $res["message"] = "Sorry You haven't filled out the form";
    } else {
       
        $userData = $this->forgot_model->getDataIndex( 0, 1, $username);
        if (count($userData) > 0 ) {
            $user = $userData[0];
            
            if ($user->status != 0) {
                $array = array('reset_password' => $reset);
                
//                if (($password_user)) {
//                    $dataMeta = $this->levelmenu_model->getDataIndex(0, 'all', $user->id_level);
//              
//                    $arrSession = array(
//                        "user_id" => $user->id,
//                        "user_name" => $user->nama,
//                        "user_username" => $user->username,
//                        "user_level" => $user->id_level,
//                        "user_status" => $user->status,
//                        "user_validated" => true,
//                    );
////                    $redirect_url = base_url()."home/";
//                    $this->session->set_userdata($arrSession);
//                    redirect($redirect_url);
//                } else {
//                    $res["status"] = "failed";
//                    $res["message"] = "Your Password Is Not Match";
//                }
            } else {
                $res["status"] = "failed";
                $res["message"] = "Your Account Has Been Deactivated";
            }
        } else {
            $res["status"] = "failed";
            $res["message"] = "You Don't Have Access To This CMS";
        }
        }
        return $res;
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("/");
    }

}
