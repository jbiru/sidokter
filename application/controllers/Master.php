<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Jika pengguna sudah login, redirect ke halaman lain

        $username=$this->session->userdata('username');
        $password=$this->session->userdata('password');
        $level=$this->session->userdata('level');
        $nama_user=$this->session->userdata('nama_user');
        $id_user=$this->session->userdata('id_user');

        if(!$username ) {
            redirect('signin/index');
        }
    }

    public function index() {
        $data['title']='Master';
        $data['bidang']=$this->Master_model->get('bidang');
        $data['level']=$this->Master_model->get('level');
        $data['dokumen']=$this->Master_model->get('dokumen');
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/master/index',$data);
        $this->load->view('admin/footer');
    }
    public function add($tabel)
    {
        
        $column='';
        if ($tabel=='bidang') {
            $column='nama_bidang';
        }elseif($tabel=='level'){
            $column='nama_level';
        }elseif($tabel=='dokumen'){
            $column='nama_jenis_dokumen';
        }else{}


        if ($_POST) {
            $data = array(
                $column => $this->input->post('nam_r'),
            );
            $this->Master_model->add($data,$tabel);
        } else {}

        $this->session->set_flashdata('info', $this->input->post('nam_r'));
        redirect('master');
    }
    public function hapus($tabel)
    {
        $nama=$this->input->post('nama');
        $column='';
        if ($tabel=='bidang') {
            $column='id_bidang';
        }elseif($tabel=='level'){
            $column='id_level';
        }elseif($tabel=='dokumen'){
            $column='id_jenis_dokumen';
        }else{}


        if ($_POST) {
            $data = array(
                $column => $this->input->post('id_b'),
            );
            $this->Master_model->delete($data,$tabel);
        } else {}

        $this->session->set_flashdata('hapus', $nama);
        redirect('master');
    }

    public function update($tabel,$id)
    {
        $nama=$this->input->post('nam_r');
        $column='';
        $name='';
        if ($tabel=='bidang') {
            $column='id_bidang';
            $name='nama_bidang';
        }elseif($tabel=='level'){
            $column='id_level';
            $name='nama_level';
        }elseif($tabel=='dokumen'){
            $column='id_jenis_dokumen';
            $name='nama_jenis_dokumen';
        }else{}


        if ($_POST) {
            $where = array(
                $column => $id,
            );
            $data=array(
                $name=>$nama,
            );
            $this->Master_model->update($tabel,$where,$data);
        } else {}

        $this->session->set_flashdata('update', $nama);
        redirect('master');
    }

    
}