<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->get('news')->result_array();
    }

}