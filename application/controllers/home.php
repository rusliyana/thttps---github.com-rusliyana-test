<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller
 {
    public function index()
    {
        $data['news'] = $this->User_model->SemuaData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_data()
    {
        $data['news'] = $this->News_model->SemuaData();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('home/tambah_data', $data);
        $this->load->view('templates/footer');
    }
    public function proses_tambah_data()
    {
                $config['upload_path']          = './buku/';
                $config['allowed_types']        = 'jpg|png|pdf|docx|jpg';
                $config['max_size']             = 0;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                  
                }
                else
                {
                    $buku = $this->upload->data();
                    $buku = $buku['file_name'];
                    $title = $this->input->post('title' ,TRUE);
                    $text = $this->input->post('text' , TRUE);

                    $data = array(
                        'title' => $title,
                        'text' => $text,
                        'buku' => $buku,
                    );
                    $this->db->insert('news', $data);
                    redirect('home');
                }
    }

    public function download()
    {}

    public function delete_data($id)
    {
        $this->News_model->delete_data($id);
        redirect('home');
    }

    public function edit_data($id)
    {
        $data['news'] = $this->News_model->ambil_id_news($id);
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('home/edit_data', $data);
        $this->load->view('templates/footer');
    }

    public function proses_edit_data($id)
    {
        $this->News_model->proses_edit_data($id);
        redirect('home');
    }
}