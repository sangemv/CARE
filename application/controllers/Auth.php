<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: venkat
 * Date: 28/03/2018
 * Time: 10:55
 */
class Auth extends CI_Controller
{
    public $shref = NULL;
    public $true_href = NULL;
    public $echs_content_type = NULL;
    public $echs_authorization = NULL;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->load->model('baseauth');
        $this->load->model('basemodel');
        $this->load->model('obasemodel');
        $this->load->model('token');
    }

    public function index()
    {
        include_once APPPATH.'libraries/REST_API/MainRest.php';

    }

    private function _key_rest($base_data='',$content_type='')
    {
        if(!is_null($base_data) && $content_type==$this->baseauth->appjson)
        {
            $data = array();
            $jodata = json_decode($base_data);
            $action = $jodata->action;
			if($action=="login_user_check")
                $data = $this->_login_user_check($jodata);
            else if($action=="check_session_exists")
                $data = $this->check_session_exists();

            echo json_encode($data);
        }
    }


    public function _login_user_check($input)
    {
        $user_id = $input->user_id;
        $pswd = md5($input->pswd);

        $qry = "SELECT * FROM TW_USERS WHERE emp_id = '".$user_id."' AND password = '".$pswd."' AND STATUS='A'";

        $res = $this->obasemodel->fetch_records_from($qry);
        $res = $this->basemodel->result_validation($res);

        $data = array();
        if($res['response'] == SUCCESSDATA)
        {
            $data['response'] = SUCCESSDATA;
            //$data['list'] = $res['list'][0];
            $res_arr = array("usrdtls" => $res['list'][0]);
            //return $res_arr['usrdtls']['EMP_NAME'];
            $data['list'] = $res_arr;

            $usersession['twt_ename']   = $res_arr['usrdtls']['EMP_NAME'];
            $usersession['twt_eid']     = $res_arr['usrdtls']['EMP_ID'];
            $usersession['twt_mob']     = $res_arr['usrdtls']['MOBILE_NO'];
            $usersession['twt_email']   = $res_arr['usrdtls']['EMAIL_ID'];
            $usersession['twt_mob']     = $res_arr['usrdtls']['ISADMIN'];
            $this->session->set_userdata($usersession);

            $data['status'] = "Successful Login";
        }
        else if($res['response'] == EMPTYDATA)
        {
            $data['response'] = EMPTYDATA;
            $data['status'] = "Invalid Credentials";
        }
        else if($res['response'] == FAILEDDATA)
        {
            $data['response'] = FAILEDDATA;
            $data['status'] = "Something Went Wrong";
        }
        return $data;
    }

    public function logout()
    {
        $user_session_ary = array('twt_ename','twt_eid');
        $this->session->unset_userdata($user_session_ary);
        redirect(base_url(),'refresh');
    }

    public function check_session_exists()
    {
        $data = array();
        if(isset($this->session->twt_eid))
        {
            $data['response'] = SUCCESSDATA;
            $data['status'] = "Session Exists";
        }
        else
        {
            $data['response'] = FAILEDDATA;
            $data['status'] = "Session Failed";
        }
        return $data;
    }


}