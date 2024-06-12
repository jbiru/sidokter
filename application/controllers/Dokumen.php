<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {
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
        $data['title']='Semua Dokumen';
        $data['dokumen']=$this->db->get('activity_document')->result();
        
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/dokumen/index',$data);
        $this->load->view('admin/footer');
    }
    public function myDokumen() {
        $data['title']='Data Dokumen';
        $this->session->userdata('id_user');
        $where=array('id_user'=>$this->session->userdata('id_user'));
        $data['dokumen']=$this->db->get_where('activity_document',$where)->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/dokumen/index',$data);
        $this->load->view('admin/footer');
    }
    public function addDokumen() {
        $data['title']='Formulir Tambah Dokumen';
        $data['jenis']=$this->db->query("SELECT * FROM dokumen")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/dokumen/showDokumen',$data);
        $this->load->view('admin/footer');
    }
    public function upload()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 100000;
        $config['encrypt_name']         = FALSE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('dokumen')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {

            $judul=$this->input->post('judul');
            $jenis_dokumen=$this->input->post('jenis_dokumen');
            $tgl_terbit=$this->input->post('tgl_terbit');
            $tgl_upload=date("Y-m-d H:i:s");
            $dokumen=$_FILES['dokumen']['name'];
            $sumber=$this->input->post('sumber');
            $status=$this->input->post('status');
            $nama_user=$this->session->userdata('nama_user');

            $id_bidang_user=$this->session->userdata('id_bidang');
            $nama_bidang=$this->db->get_where('bidang',array('id_bidang'=>$id_bidang_user))->row();
            // echo $nama_bidang->nama_bidang;die;

            $data_insert=array(
                'judul_dokumen' => $judul,
                'jenis_dokumen' => $jenis_dokumen,
                'tgl_terbit'    => $tgl_terbit,
                'tgl_upload'    => $tgl_upload,
                'file'          => str_replace(" ", "_",$dokumen),
                'status'        => $status,
                'sumber'        => $sumber,
                'nama_user'     => $nama_user,
                'id_user'       => $this->session->userdata('id_user'),
                'bidang'     => $nama_bidang->nama_bidang,
            );

            $data = $this->upload->data();
            $image_path = 'upload/' . $data['file_name'];
            // Simpan path gambar ke database
            $this->db->insert('activity_document',$data_insert);
            // Redirect atau tampilkan pesan sukses
            redirect('dokumen/index');
        }
    }
    public function delete()
    {
        $nama=$this->input->post('nama');
        $tabel='activity_document';
        if ($_POST) {
            $data = array(
                'id_activity_document' => $this->input->post('id_activity_document'),
            );
            $this->Master_model->delete($data,'activity_document');
            $file=$this->input->post('file');
            $file_path = './upload/'.$file;
            unlink($file_path);
        } else {}

        $this->session->set_flashdata('hapus', $nama);
        redirect('dokumen/myDokumen');
    }
    public function lihatDokumen($id)
    {
        $data['title']='Lihat Dokumen ';
        $where=array(
            'id_activity_document'  => $id,
        );
        $data['dokumen']=$this->db->get_where('activity_document',$where)->row();
        // var_dump($data);die;
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/dokumen/view',$data);
        $this->load->view('admin/footer');
    }
    public function update($id)
    {

        $judul=$this->input->post('judul');
        $jenis_dokumen=$this->input->post('jenis_dokumen');
        $tgl_terbit=$this->input->post('tgl_terbit');
        $tgl_upload=date("Y-m-d H:i:s");
        $sumber=$this->input->post('sumber');
        $status=$this->input->post('status');
        $file_old=$this->input->post('file_old');
        $nama_user=$this->session->userdata('nama_user');
        $id_bidang_user=$this->session->userdata('id_bidang');

        $img=$_FILES['file']['name'];

        $data=array(
            'judul_dokumen' => $judul,
            'jenis_dokumen' => $jenis_dokumen,
            'tgl_terbit'    => $tgl_terbit,
            'tgl_upload'    => $tgl_upload,
            'file'          => str_replace(" ", "_",$img),
            'status'        => $status,
            'sumber'        => $sumber,
            'nama_user'     => $nama_user,
            'id_user'       => $this->session->userdata('id_user'),
            'bidang'        => $nama_bidang->nama_bidang,
        );

        $where=array(
            'id_activity_document'   =>$id
        );
        $file_old=$this->input->post('file_old');
        if($img==''){
            $gl=array('file'=>$file_old);
            $this->m_app->update_where('activity_document',$where,$data);
            $this->m_app->update_where('activity_document',$where,$gl);
        }else{
                    
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['max_size']             = 100000;
            $config['encrypt_name']         = FALSE;

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('file')){
                echo "Gambar Gagal Upload, Periksa tipe gambar !!!!";
            }else{
                $img=$this->upload->data('file_name');
            }
            $gambar=array('file'=>$img);
            $this->m_app->update('activity_document',$where,$data,$gambar);
            $path='./upload/'.$file_old;
			unlink($path);
        }
        $this->session->set_flashdata('msg','');
        redirect('dokumen/index');
        
    }
}