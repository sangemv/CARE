<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: venkat
 * Date: 15/03/2018
 * Time: 12:07
 */
class Setups extends CI_Controller
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
            if($action=="fetch_users_data")
                $data = $this->_fetch_users_data($jodata);
            else if($action=="add_user_data")
                $data = $this->_add_user_data($jodata);
            else if($action=="getlocation_data")
                $data = $this->_getlocation_data($jodata);
            else if($action=="fetch_location_data")
                $data = $this->_fetch_location_data($jodata);
            else if($action=="add_master_data")
                $data = $this->_add_master_data($jodata);
            else if($action=="get_depertments_data")
                $data = $this->_get_depertments_data($jodata);
            else if($action=="get_tasks_data")
                $data = $this->_get_tasks_data($jodata);
            else if($action=="fetch_tasks_data")
                $data = $this->_fetch_tasks_data($jodata);
            else if($action=="add_tasks_data")
                $data = $this->_add_tasks_data($jodata);


            echo json_encode($data);
        }
    }

    public function _fetch_users_data($input)
    {
        $qry = "SELECT * FROM TW_USERS where STATUS = 'A'";
        $reg_res = $this->obasemodel->fetch_records_from($qry);
        $res = $this->basemodel->result_validation($reg_res);
        return $res;
    }

    public function _add_user_data($input)
    {
        //return $input->adduser->name;
        if (trim($input->stg) == 'Edit') {
            $qry = "UPDATE TW_USERS SET EMP_NAME ='".$input->adduser->name."', UPDATEDBY='".$this->twt_eid."', UPDATEDON = '".date('Ymd')."', ISADMIN='".$input->adduser->adm_sts."', EMAIL_ID='".$input->adduser->email."', MOBILE_NO='".$input->adduser->mob."', STATUS='".$input->adduser->sts."' WHERE EMP_ID = '".$input->adduser->userid."'";
        }
        else {
            $pwd = md5('hospital');
            $qry = "INSERT INTO TW_USERS (EMP_ID,PASSWORD,EMP_NAME,EMAIL_ID,MOBILE_NO,STATUS,CREATEDBY, CREATEDON,ISADMIN)VALUES('".$input->adduser->userid."','".$pwd."','".$input->adduser->name."','".$input->adduser->email."','".$input->adduser->mob."','".$input->adduser->sts."','".$this->twt_eid."','".date('Ymd')."','".$input->adduser->adm_sts."')";
        }

        $reg_res = $this->obasemodel->execute_qry($qry);
        $res = $this->basemodel->result_validation($reg_res);
        return $res;
    }

	public function _getlocation_data($input)
    {
		$qry = "SELECT LOC_ID,LOC_NAME FROM TW_LOCATIONS";
		//$qry = "SELECT LOC_ID,LOC_NAME FROM TW_LOCATIONS where LOC_NAME LIKE '%$input->data%'";
		//$qry = "SELECT LOC_NAME FROM TW_LOCATIONS where UPPER(LOC_NAME) LIKE UPPER('%$input->para%')";
        $reg_res = $this->obasemodel->fetch_records_from($qry);
        $res = $this->basemodel->result_validation($reg_res);
        return $res;
    }


	public function _fetch_location_data()
    {
		$qry = "SELECT * FROM TW_LOCATIONS";
        $reg_res = $this->obasemodel->fetch_records_from($qry);
        $res = $this->basemodel->result_validation($reg_res);
        return $res;
    }

    public function _add_master_data($input)
    {
        //$sts = (($input->locts->sts == 'Active')?'A':'I');
        if($input->stg == 'Add') {
            $qry = "SELECT max(TO_NUMBER(LOC_ID)) LOC_ID FROM TW_LOCATIONS";
            $reg_res = $this->obasemodel->fetch_records_from($qry);
            $locid = $reg_res['0']['LOC_ID'] + 1;
            $qry = "insert into TW_LOCATIONS(LOC_ID, LOC_NAME, STATUS, CREATEDBY, CREATEDON)values('".$locid."','".$input->locts->loc_name."','".$input->locts->sts."','".$this->twt_eid."','".date('Ymd')."')";
       }else{
            $qry = "UPDATE TW_LOCATIONS SET LOC_NAME = '".$input->locts->loc_name."',STATUS = '".trim($input->locts->sts)."', UPDATEDBY='".$this->twt_eid."', UPDATEDON = '".date('Ymd')."' WHERE LOC_ID='".$input->locts->loc_id."'";
        }
        $reg_res = $this->obasemodel->execute_qry($qry);
        $res = $this->basemodel->result_validation($reg_res);
        //return $qry;
        return $res;
    }


    public function _fetch_tasks_data($input)
    {
        $qry = "SELECT * FROM TW_TASKS ";
        //$qry = "SELECT SNO,TASKNAME FROM TW_TASKS WHERE LOC_ID IN('".$input->data."')";
        $reg_res = $this->obasemodel->fetch_records_from($qry);
        $res = $this->basemodel->result_validation($reg_res);
        return $res;
    }
    public function _add_tasks_data($input)
    {
        //$sts = (($input->locts->sts == 'Active')?'A':'I');
        if($input->stg == 'Add') {
            $qry = "SELECT max(TO_NUMBER(SNO)) SNO FROM TW_TASKS";
            $reg_res = $this->obasemodel->fetch_records_from($qry);
            $tid = $reg_res['0']['SNO'] + 1;
            $qry = "insert into TW_TASKS(SNO, TASKNAME, LOC_ID, STATUS, CREATEDBY, CREATEDON)values('".$tid."','".$input->tasks->task_name."','".$input->tasks->taskloc_id."','".$input->tasks->sts."','".$this->twt_eid."','".date('Ymd')."')";
       }else{
            $qry = "UPDATE TW_TASKS SET TASKNAME = '".$input->tasks->task_name."',LOC_ID = '".$input->tasks->taskloc_id."',STATUS = '".trim($input->tasks->sts)."', UPDATEDBY='".$this->twt_eid."', UPDATEDON = '".date('Ymd')."' WHERE SNO='".$input->tasks->task_id."'";
        }
        $reg_res = $this->obasemodel->execute_qry($qry);
        $res = $this->basemodel->result_validation($reg_res);
        //return $qry;
        return $res;
    }


    public function _get_depertments_data()
    {
        $qry = "SELECT * FROM TW_DEPARTMENTS";
        $reg_res = $this->obasemodel->fetch_records_from($qry);
        $res = $this->basemodel->result_validation($reg_res);
        return $res;
    }

    public function _get_tasks_data($input)
    {
        $qry = "SELECT SNO,TASKNAME FROM TW_TASKS ";
        //$qry = "SELECT SNO,TASKNAME FROM TW_TASKS WHERE LOC_ID IN('".$input->data."')";
        $reg_res = $this->obasemodel->fetch_records_from($qry);
        $res = $this->basemodel->result_validation($reg_res);
        return $res;
    }





	
	
	
}