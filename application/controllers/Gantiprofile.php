<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gantiprofile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login(); 
        $this->load->model('user_m');
        $this->load->library('form_validation');  
	}

	public function index()
	{
		$iduser=$this->fungsi->user_login()->iduser;
		$data['baris']=$this->user_m->get($iduser)->row();
		$data['page']='editprofile';
		return $this->template->load('template','editprofile/editprofile_form',$data);
	}
	public function proses()
	{
		$post=$this->input->post(null,true);
		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[5]');
		$queryd=$this->db->query("select * from user where username='$post[username]' and iduser !='$post[id]'");
		if($queryd->num_rows()>0){
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
			$this->form_validation->set_message('is_unique','username ini sudah dipakai '); 
		}
		elseif ($post['id']=='') {
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
			$this->form_validation->set_message('is_unique','username ini sudah dipakai '); 
		}
		else{
			$this->form_validation->set_rules('username', 'Username', 'required');
		}
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('nomor', 'Notelp', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_message('required','%s masih kosong perlu diisi'); 
		$this->form_validation->set_message('min_length','{field} minimal lima karakter'); 
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else{
			$this->user_m->editProfile($post);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('success', 'Profile sudah diganti');
			}
			echo "<script>window.location='".site_url('dashboard')."'</script>";
		}
	}
}