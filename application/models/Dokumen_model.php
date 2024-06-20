<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen_model extends CI_Model {
    public function upload_dokumen($tabel,$data)
    {
        $this->db->insert($tabel,$data);
    }
    public function update_where($tabel,$where,$data)
    {
        $this->db->where($where);
        $this->db->update("$tabel",$data);
    }
    public function update($tabel,$where,$data,$gambar)
    {
        $this->db->where($where);
        $this->db->update("$tabel",$gambar);
        $this->db->where($where);
        $this->db->update("$tabel",$data);
    }
}