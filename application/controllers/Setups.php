<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: uday
 * Date: 15/02/2018
 * Time: 12:07
 */
class Setups extends CI_Controller
{
    public $shref = NULL;
    public $true_href = NULL;
    public $dia_content_type = NULL;
    public $dia_authorization = NULL;




    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->load->model('token');
        $this->load->model('baseauth');
        $this->load->model('basemodel');
        $this->load->model('users');
        $this->load->model('result_hd');
        $this->load->model('results');
        $this->load->model('qgroups');
        $this->load->model('modules');
        $this->load->model('branchs');
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
            if($action=="fetch_qgroup_data")
                $data = $this->_fetch_qgroup_data($jodata);
            if($action=="fetch_mod_data")
                $data = $this->_fetch_mod_data($jodata);
			else if($action=="set_qgroup_data")
                $data = $this->_set_qgroup_data($jodata);
			else if($action=="qgroup_data_list")
                $data = $this->_qgroup_data_list($jodata);
			else if($action == "operate_question")
                $data = $this->_operate_question($jodata);
            else if($action == "upload_questions")
                $data = $this->_upload_questions($jodata);
            echo json_encode($data);
        }
    }

	
	public function _fetch_qgroup_data($input)
    {
        $res = $this->basemodel->fetch_records_from($this->qgroups->tbl_name,array($this->qgroups->STATUS=>'A', $this->qgroups->MOD_ID => $input->modid ),array($this->qgroups->GROUP_ID,$this->qgroups->GROUP_NAME,$this->qgroups->STATUS));
        $res = $this->basemodel->result_validation($res);
        return $res;
    }

	public function _fetch_mod_data($input)
    {
        $res = $this->basemodel->fetch_records_from($this->modules->tbl_name,array($this->modules->STATUS=>'A'),array($this->modules->MOD_ID,$this->modules->MOD_DESC,$this->modules->STATUS));
        $res = $this->basemodel->result_validation($res);
        return $res;
    }


	
	public function _set_qgroup_data($input)
    {
        $insert[$this->qgroups->GROUP_NAME] = $input->name;
        $insert[$this->qgroups->STATUS] = $input->status;

		if($input->qid == '')
        {
            $insert[$this->qgroups->CREATED_BY] = $input->user_id;
            $insert[$this->qgroups->CREATED_ON] = date('Y-m-d');
            $insert[$this->qgroups->CREATED_AT] = date('H:i:s');

            $res = $this->basemodel->insert_into_table($this->qgroups->tbl_name, $insert);
        }
        else
        {
            $insert[$this->qgroups->EDITED_BY] = $input->user_id;
            $insert[$this->qgroups->EDITED_ON] = date('Y-m-d');
            $insert[$this->qgroups->EDITED_AT] = date('H:i:s');

            $res = $this->basemodel->update_operation($insert, $this->qgroups->tbl_name, array($this->qgroups->GROUP_ID=> $input->qid));
        }

        $res = $this->basemodel->result_validation($res);
        return $res;
    }

    public function _operate_question($input)
    {
        $group = $input->group;
        $q_id = $input->q_id;
        $qst_desc = $input->qst_desc;
        $optlength = $input->optlength;
        $opt_arr = $input->opt_arr;
        $answer = $input->answer;

        if($q_id == '') {

            $qry = "SELECT `Q_ID` FROM `exam_m_qst` WHERE `Q_GROUP` = '".$group."' order by `SNO` desc limit 1 ";
            $res = $this->basemodel->execute_qry($qry);

            if (!empty($res)) {
                $q_id = (int)$res[0]['Q_ID'] + 1;
            }
            else
                $q_id = 100;

                $qry = "INSERT INTO `exam_m_qst`( `Q_GROUP`, `Q_TYPE`, `Q_ID`, `Q_DESC`, `ANS`,`MAX_OPT`,
 `OPT1`, `OPT2`, `OPT3`, `OPT4`, `OPT5`, `OPT6`, `OPT7`, `OPT8`, `OPT9`, `OPT10`, `OPT11`, `OPT12`, `OPT13`, `OPT14`, `OPT15`,
  `CREATED_BY`, `CREATED_ON`, `STATUS`) VALUES ('" . $group . "', 'R', '".$q_id."', '".$qst_desc."', '".$answer."','".$optlength."', ";

            $opt_str = array();
            for($i = 0; $i < sizeof($opt_arr); $i++)
                array_push( $opt_str, "'".$opt_arr[$i]."'");

            for($i = ($i -1); $i < 14; $i++)
                array_push( $opt_str, "'-'");

            $opt_str = implode(',',$opt_str);
            $qry .= $opt_str. ",". $this->session->exam_uid.",'".date('Y-m-d')."', 'A' )";
            //return $qry;

            $res = $this->basemodel->run_qry($qry);
        }
        else
        {
            $qry = "UPDATE `exam_m_qst` SET `Q_DESC` = '".$qst_desc."', `ANS` = '".$answer."' ,`MAX_OPT` = '".$optlength."', ";

            $opt_str = array();
            for($i = 0; $i < sizeof($opt_arr); $i++)
                array_push( $opt_str, " OPT".($i+1)." = '".$opt_arr[$i]."'");

            $opt_str = implode(',',$opt_str);
            $qry .= $opt_str. " WHERE Q_ID = '". $q_id."' AND Q_GROUP =  '".$group."' ";
            $res = $this->basemodel->run_qry($qry);
        }

        if($res)
            $data['response'] = SUCCESSDATA;
        else
            $data['response'] = FAILEDDATA;

        return $data;
    }

    public function curl_def()
    {
        //echo "success";

        //$res = $this->security->xss_clean($this->input->raw_input_stream);
        //$res = json_decode(file_get_contents('php://input'), true);
        $res = json_decode(file_get_contents("php://input"));
        // $res = $_POST['name'];


        echo $res;
    }


    public function _upload_questions($input)
    {
       for($j = 0; $j < sizeof($input->stg) ; $j++) {
            $group = $input->stg[$j]->Q_GROUP;
            //$q_id = $input->stg[$j]->Q_ID;
            $qst_desc = $input->stg[$j]->Q_DESC;
            $answer = $input->stg[$j]->ANS;
            $opt_sz = $input->stg[$j]->MAX_OPT;

            $opt1 = $input->stg[$j]->OPT1;
            $opt2 = $input->stg[$j]->OPT2;
            $opt3 = $input->stg[$j]->OPT3;
            $opt4 = $input->stg[$j]->OPT4;

           //$qry = "SELECT `Q_ID` FROM `exam_m_qst` WHERE `Q_GROUP` = '".$group."' order by `SNO` desc limit 1 ";

           //$res = $this->basemodel->fetch_single_row($this->q_mst->tbl_name,$where[$this->q_mst->Q_GROUP]=$group);

           $res = $this->basemodel->execute_qry($qry);
           if (!empty($res)) {
               $q_id = (int)$res[0]['Q_ID'] + 1;
           }
           else
               $q_id = 100;

            $qry = "INSERT INTO `exam_m_qst`( `Q_GROUP`, `Q_TYPE`, `Q_ID`, `Q_DESC`, `ANS`,`MAX_OPT`,
     `OPT1`, `OPT2`, `OPT3`, `OPT4`, `OPT5`, `OPT6`, `OPT7`, `OPT8`, `OPT9`, `OPT10`, `OPT11`, `OPT12`, `OPT13`, `OPT14`, `OPT15`,
      `CREATED_BY`, `CREATED_ON`, `STATUS`) VALUES ('" . $group . "', 'R', '".$q_id."', '".$qst_desc."', '".$answer."','".$opt_sz."','".$opt1."','".$opt2."','".$opt3."','".$opt4."',";

           $opt_str = array();
           //for($i = 1; $i <= 4; $i++)
             //  array_push( $opt_str, "'".$opt[$i]."'");

           for($i = 4; $i < 15; $i++)
               //if($input->stg[$j]->OPT[$i] == '-')
                array_push( $opt_str, "'-'");

            $opt_str = implode(',',$opt_str);
            $qry .= $opt_str. ",". $this->session->exam_uid.",'".date('Y-m-d')."', 'A' )";

           $res = $this->basemodel->run_qry($qry);
           //echo $qry;
        }
        if($res)
            $data['response'] = SUCCESSDATA;
        else
            $data['response'] = FAILEDDATA;

        return $data;
    }

	
}