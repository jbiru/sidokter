<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model {

    public function __construct()
        {
            parent::__construct();
        }

    public function get($tabel) {
        return $query = $this->db->get($tabel)->result();
    }

    public function add($data,$tabel) {
        $this->db->insert($tabel, $data);
    }

    public function get_by($where,$tabel) {
        return $this->db->get_where($tabel, $where)->result();
    }

    public function update($tabel,$where,$data) {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    public function delete($data,$tabel) {
        $this->db->where($data);
        $this->db->delete($tabel);
    }
}
