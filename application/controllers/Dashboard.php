<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if($this->session->userdata('username')==FALSE){
            $this->session->set_flashdata('pesan',' <div class="alert alert-danger alert-dismissible fade show" role="alert">
           Anda Belum login
            <button type="button" class="close" data-dismiss="alert" area-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('signin/index');
        }
    }

    public function index() {
        $data['title']='Dashboard';
        $data['top']=$this->db->query("SELECT * FROM activity_document ORDER BY id_activity_document LIMIT 5")->result();
        $data['dokumen']=$this->db->get('dokumen')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/dashboard/index',$data);
        $this->load->view('admin/footer');
    }
}