<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    public function get_user($username,$password) {

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        return $query->num_rows();
    }
}
