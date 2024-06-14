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
		$this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
		$this->load->view('home');
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
		$keyword = $this->input->post('keyword');
        $data['results'] = $this->Search_model->search($keyword);
		$this->load->view('livesearch',$data);
	}
}
