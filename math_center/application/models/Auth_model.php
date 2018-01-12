<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function check()
    {
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
        }else{
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu');
            redirect('auth/login');
        }

    }

    public function checkLogin($username, $password)
    {

        $query = $this->db->query("select * from user where id_user='$username' AND password='$password'");

            
        if($query->num_rows()>0){
                $data = $query->row();
                $userData = array(
                        'username' => $data->id_user,
                        'role' => $data->role,
                        'logged_in' => true
                        );
            
                $this->session->set_userdata($userData);
                redirect('home');
            
            }else {
                $this->session->set_flashdata('error', 'Username atau kata sandi salah');
                redirect('auth/login');
            }
        }
        
}