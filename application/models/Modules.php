<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: uday
 * Date: 13/12/2018
 * Time: 14:48
 */
class Modules extends CI_Model
{
    public $tbl_name    = "modules";
    public $MOD_ID   	= "MOD_ID";
    public $MOD_DESC    = "MOD_DESC";
    public $CREATED_BY  = "CREATED_BY";
    public $CREATED_ON  = "CREATED_ON";
    public $CREATED_AT  = "CREATED_AT";
    public $EDITED_BY  = "EDITED_BY";
    public $EDITED_ON  = "EDITED_ON";
    public $EDITED_AT  = "EDITED_AT";
    public $STATUS      = "STATUS";
}