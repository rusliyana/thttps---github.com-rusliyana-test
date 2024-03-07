<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model
{ 
    public function SemuaData()
    {
       return $this->db->get('news')->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [

            "title" => $this->input->post('title'),
            "text" => $this->input->post('text'),
        ];

        $this->db->insert('news' , $data);
    }

    public function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('news');
    }

    public function ambil_id_news($id)
    {
        return $this->db->get_where('news', ['id => $id'])->row_array();
    }

    public function proses_edit_data($id)
    {
        $data = [
            "title" => $this->input->post('title'),
            "text" => $this->input->post('text'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('news', $data);
    }
}
