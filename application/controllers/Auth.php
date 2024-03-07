<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
      parent::__construct();
      $this->load->library('form_validation');
    }

    public function index() 
    {
      $this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');

      if($this->form_validation->run () == false){       
        $data['title'] = 'Login Page';
         $this->load->view('templates/auth_header', $data); 
         $this->load->view('auth/login'); 
         $this->load->view('templates/auth_footer'); 
      } else {
        // validasi success 
        $this->_login();
      }
    }



    private function _login()
    {
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $user = $this->db->get_where('user', ['email' => $email])->row_array();
     
      // usernya ada
      if($user) {
        // cek password
        if(password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            redirect('home');
          } else {
            redirect('user');
          }
        } else {
          $this->session->set_flashdata('message','<div class="alert 
        alert-danger" role="alert">wrong password!</div>');
        redirect('auth');
        }

      } else {
        $this->session->set_flashdata('message','<div class="alert 
        alert-danger" role="alert">Email is not registered!</div>');
        redirect('auth');

      }
    }

    public function registration()
    {
      $this->form_validation->set_rules('name','Name','required|trim');
      $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]');
      $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]');
      $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

      if($this->form_validation->run() == false) {
        $data['title'] = 'login registration';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/registration');
        $this->load->view('templates/auth_footer');
      } else {
        $data = [
          'name' => $this->input->post('name'),
          'email'=> $this->input->post('email'),
          'password'=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
        ];

        $this->db->insert('user',$data);
        $this->session->set_flashdata('message','<div class="alert 
        alert-success" role="alert">Congratulation your account has been created.
        Plase Login</div>');
        redirect('auth');
    } 
  }
  public function logout()
  {
    $this->session->unset_userdata('email');

    $this->session->set_flashdata('message','<div class="alert 
    alert-success" role="alert">you have been logged out</div>');
    redirect('auth');
  }
  //login
  public function login()
  {
   $email = $this->input->post('email');
   $password = $this->input->post('password');
   
   $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
   
 $data['title'] = 'Login';

if ($this->form_validation->run() === FALSE) {
   $this->load->view('templates/auth_header', $data);
   $this->load->view('auth/login');
   $this->load->view('templates/auth_footer');

} else {
   if ($user = $this->user_model->get_user_login($email, $password)) {
       $this->session->set_userdata('email', $email);
       $this->session->set_userdata('user_id', $user['id']);
       $this->session->set_userdata('is_logged_in', true);

       $this->session->set_flashdata('msg_success', 'Login Successful!');
       redirect('news');
   } else {
       $this->session->set_flashdata('msg_error', 'Login credentials does not match!');

       $currentClass = $this->router->fetch_class(); // class = controller
       $currentAction = $this->router->fetch_method(); // action = function

       redirect("$currentClass/$currentAction");
       //redirect('user/login');
   }
}
}

  
}