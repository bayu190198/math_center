<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getUser($username)
    {
        $query = $this->db->query("select * from user where id_user='$username'");
        if($query->num_rows()>0)
        {
            return $query->row();
        }else {
            return "";
        }
    }

}
