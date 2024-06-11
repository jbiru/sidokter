<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Cont extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $data['title']='Data User';
        $data['user']=$this->db->get('user')->result();
        $data['bidang']=$this->db->get('bidang')->result();
        $data['level']=$this->db->get('level')->result();
        
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/user/index',$data);
        $this->load->view('admin/footer');
    }
    public function add() {
        $nama_user=$this->input->post('nama_user');
        $alamat=$this->input->post('alamat');
        $id_level=$this->input->post('id_level');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $id_bidang=$this->input->post('id_bidang');
        $no_telp=$this->input->post('no_telp');
        $data=array(
            'nama_user'     =>$nama_user,
            'alamat'        =>$alamat,
            'id_level'      =>$id_level,
            'id_bidang'     =>$id_bidang,
            'username'      =>$username,
            'password'      =>$password,
            'no_telp'       =>$no_telp,
        );
        $this->db->insert('user',$data);
        redirect('user_Cont/index');
    }
    public function update($id) {
        $nama_user  =$this->input->post('nama_user');
        $alamat     =$this->input->post('alamat');
        $id_level   =$this->input->post('id_level');
        $username   =$this->input->post('username');
        $password   =$this->input->post('password');
        $id_bidang  =$this->input->post('id_bidang');
        $no_telp    =$this->input->post('no_telp');
        $where=array('id_user'=>$id);
        $data=array(
            'nama_user'     =>$nama_user,
            'alamat'        =>$alamat,
            'id_level'      =>$id_level,
            'id_bidang'     =>$id_bidang,
            'username'      =>$username,
            'password'      =>$password,
            'no_telp'       =>$no_telp,
        );
        $this->db->where($where);
        $this->db->update('user',$data);
        redirect('user_Cont/index');
    }

    public function delete($id)
    {
        $nama=$this->input->post('nama');
        $this->db->where('id_user',$id);
        $this->db->delete('user');
        $this->session->set_flashdata('hapus', $nama);
        redirect('user_Cont/index');
    }
}