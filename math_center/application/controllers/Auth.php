<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function check()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        if($username != null && $password != null){
            $this->load->model('auth_model');
            
            $this->auth_model->checkLogin($username, $password);
        }else {
            $this->session->set_flashdata('error', 'Harap masukan data login');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
