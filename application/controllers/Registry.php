<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: venkat
 * Date: 15/03/2018
 * Time: 12:07
 */
class Registry extends CI_Controller
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
        //$this->twt_eid = $this->session->twt_eid;
        $this->twt_eid = '24110';
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
            if($action=="add_newtask_data")
                $data = $this->_add_newtask_data($jodata);
            else if($action=="get_tickets_data")
                $data = $this->_get_tickets_data($jodata);



            echo json_encode($data);
        }
    }


    public function _add_newtask_data($input)
    {
        //return $input->adduser->name;


            $qry = "INSERT INTO TW_TICKETS (RAISEDBY,RAISEDDESC,TKT_DESC,COMMENTS,ASSIGNTO,ASSIGNDEPT,STATUS,CREATEDBY, CREATEDON)VALUES('".$input->location->LOC_ID."','".$input->location->LOC_NAME."','".$input->task."','".$input->comments."',,'".$input->assgndept."','A','".$this->twt_eid."','".date('Ymd')."')";


        //$reg_res = $this->obasemodel->execute_qry($qry);
       // $res = $this->basemodel->result_validation($reg_res);
        return $qry;
    }
    public function _get_tickets_data($input)
    {
        //return $input->adduser->name;
        $qry = "SELECT * TW_TICKETS";
        $reg_res = $this->obasemodel->fetch_records_from($qry);
        $res = $this->basemodel->result_validation($reg_res);
        return $res;
    }








}