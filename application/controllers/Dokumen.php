<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title']='Dokumen';
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/dokumen/index',$data);
        $this->load->view('admin/footer');
    }
    public function addDokumen() {
        $data['title']='Formulir Tambah Dokumen';
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/dokumen/showDokumen',$data);
        $this->load->view('admin/footer');
    }
}