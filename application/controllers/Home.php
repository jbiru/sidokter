<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['tiga']=$this->db->query('SELECT * FROM activity_document ORDER BY id_activity_document DESC ')->result();
		$data['unduh']=$this->db->query('SELECT SUM(down) as jumlah_unduh FROM monitoring')->row();
		$data['view']=$this->db->query('SELECT SUM(view) as jumlah_view FROM monitoring')->row();
		$this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
		$this->load->view('home',$data);
		$this->load->view('layouts/footer');
	}
	public function baru()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
		$this->load->view('home');
		$this->load->view('layouts/footer');
	}
	public function livesearch()
	{
		$keyword = $this->input->post('input');
		$this->db->like('judul_dokumen',$keyword);
		$this->db->where('status',1);
        $data['results'] = $this->db->get('activity_document')->result();
		$this->load->view('livesearch',$data);
	}
	public function viewDocument($id)
	{
		$count=$this->db->get_where('monitoring',array('id_activity_document'=>$id))->result();
		if(!$count){
			$this->db->insert('monitoring',array(
				'id_activity_document'	=>$id,
				'view'					=>1,
			));
		}else{
			$jumlah=intval($count[0]->view)+1;
			$this->db->query("UPDATE `monitoring` SET `view`='$jumlah' WHERE `id_activity_document`='$id'");
		}
		$data['jumlah']=$this->db->get_where('monitoring',array('id_activity_document' =>$id))->row();
		$data['dokumen']=$this->db->get_where('activity_document',array('id_activity_document' =>$id))->row();
		$this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
		$this->load->view('detail',$data);
		$this->load->view('layouts/footer');

	}
	public function download($id,$nama_file) {
        // Lakukan validasi atau keamanan di sini sesuai kebutuhan
		$this->load->helper('download');
        // Lokasi dokumen yang akan diunduh
        $lokasi = './upload/' . $nama_file;
		$count=$this->db->get_where('monitoring',array('id_activity_document'=>$id))->result();
		$jumlah=intval($count[0]->down)+1;
		$this->db->query("UPDATE `monitoring` SET `down`='$jumlah' WHERE `id_activity_document`='$id'");

        // Periksa apakah file ada
        if (file_exists($lokasi)) {
            // Lakukan proses unduh
            force_download($nama_file, file_get_contents($lokasi));
        } else {
            // Tampilkan pesan jika file tidak ditemukan
            echo 'File not found';
        }
    }
}
