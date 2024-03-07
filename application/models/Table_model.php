<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table_model extends CI_Model
{
    public function Semuauser()
    {
       return $this->db->get('user')->result_array();
    }
}