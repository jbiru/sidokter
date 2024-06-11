<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen_model extends CI_Model {
    public function upload_dokumen($tabel,$data)
    {
        $this->db->insert($tabel,$data);
    }
}