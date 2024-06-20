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
        $this->db->ORDER_BY('id_activity_document','DESC');
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
        date_default_timezone_set('Asia/Jakarta');
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 1000000;
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
            $this->session->set_flashdata('info', $judul);
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

        date_default_timezone_set('Asia/Jakarta');
        $judul=$this->input->post('judul');
        $jenis_dokumen=$this->input->post('jenis_dokumen');
        $tgl_terbit=$this->input->post('tgl_terbit');
        $tgl_upload=date("Y-m-d H:i:s");
        $sumber=$this->input->post('sumber');
        $status=$this->input->post('status');
        $file_old=$this->input->post('file_old');
        $nama_user=$this->session->userdata('nama_user');
        $id_bidang_user=$this->session->userdata('id_bidang');

        $img=$_FILES['dokumen']['name'];
        $nama_bidang=$this->db->get_where('bidang',array('id_bidang'=>$id_bidang_user))->row();
        $data=array(
            'judul_dokumen' => $judul,
            'jenis_dokumen' => $jenis_dokumen,
            'tgl_terbit'    => $tgl_terbit,
            'tgl_edit'      => date("Y-m-d H:i:s"),
            'tgl_upload'    => $tgl_terbit,
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
            $this->Dokumen_model->update_where('activity_document',$where,$data);
            $this->Dokumen_model->update_where('activity_document',$where,$gl);
        }else{
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['max_size']             = 1000000;
            $config['encrypt_name']         = FALSE;

            $this->load->library('upload', $config);
            // echo 'ganti gambar';die;
            if(!$this->upload->do_upload('dokumen')){
                echo "Gambar Gagal Upload, Periksa tipe gambar !!!!";
            }else{
                // $img=$this->upload->data('file_name');
                $img = $this->upload->data();
                echo $image_path = 'upload/' . $img['file_name'];
            }
            // die;
            $gambar=array('file'=>$img);
            $this->Dokumen_model->update('activity_document',$where,$data,$gambar);
            $path='./upload/'.$file_old;
			unlink($path);
        }
        $this->session->set_flashdata('update',$judul);
        redirect('dokumen/index');
        
    }
}