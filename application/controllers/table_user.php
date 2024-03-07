<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class table_user extends CI_Controller
 {
    public function index()
    {
        $data['user'] = $this->Table_model->SemuaUser();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/admin_sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('table_user/index', $data);
        $this->load->view('templates/footer');
    }
}