<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

    function __construct(){
        parent::__construct();
        
    }

	public function index()
	{
		$this->load->view('signin.php');
	}
	public function aksi()
	{
		$username = $this->input->post('username');
        $password = $this->input->post('password');

        // Validate user input
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

		$u=array('username'=>$username);
		$p=array('password'=>$password);
        $query=$this->db->get_where('user',$u,$p)->result();
        if($query){
        foreach ($query as $row) {
            if($row->username==$username && $row->password==$password) {
                $this->session->set_userdata('username',"$row->username");
                $this->session->set_userdata('password',"$row->password");
                $this->session->set_userdata('level',"$row->level");
                $this->session->set_userdata('nama_user',"$row->nama_user");
                $this->session->set_userdata('id_user',"$row->id_user");
            }else{}
            }
            redirect('dashboard/index');
        }
        redirect('signin/index');
	}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('signin');
    }
}
