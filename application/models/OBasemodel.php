<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: venkat
 * Date: 31/01/2019
 * Time: 11:55
 */
class OBasemodel extends CI_Model
{
    public $odbc;
    public function __construct()
    {
        parent::__construct();
        $this->odbc = odbc_connect("CORPDB" , "HIDDB" , "HIDDB");
    }

    function fetch_records_from($qry)
    {
        $result = array();
        if($qry!='')
        {
            $res = odbc_exec($this->odbc , $qry );
            $count = 0;
            while($row = odbc_fetch_array($res))
            {
                $result[$count] = $row;
                $count++;
            }
            return $result;
        }
        else
        {
            return $result;
        }
    }

    function execute_qry($qry='')
    {
        if($qry!='')
        {
            $res = odbc_exec($this->odbc , $qry );
            if($res)
                return true;
            else
                return false;
        }
        else
        {
            return false;
        }
    }




}