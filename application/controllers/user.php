<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class user extends CI_Controller 
{

    public function index()
    {
    
        $data['user'] = $this->db->get_where('user',['email' =>
        $this->session->userdata('email')])->row_array();

        $data['news'] = $this->User_model->SemuaData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function download($id){

        $data = $this->db->get_where('news', ['id'=>$id])->row_array();
        force_download('buku/'.$data['buku'],NULL);
    }


}