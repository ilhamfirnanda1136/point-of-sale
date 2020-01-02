<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin(); 
        $this->load->model('user_m');
        $this->load->library('form_validation');     
	}
	protected function valueTambah()
	{
		$user=new stdClass();
		$user->nama_lengkap=null;
		$user->iduser=null;
		$user->username=null;
		$user->alamat=null;
		$user->notelp=null;
		$user->level=null;
		$data=array(
			'baris'=>$user,
			'page'=>'tambah',
		);
		return $data;
	}

	public function index()
	{
		$data['row']=$this->user_m->get()->result();
		return $this->template->load('template','user/user_data',$data);
	}
	public function add()
	{
		$data=$this->valueTambah();
		return $this->template->load('template','user/user_form',$data);
	}
	public function edit($id)
	{
		$query=$this->user_m->get($id);
		$user=$query->row();
		$data=array(
			'baris'=>$user,
			'page'=>'edit',
		);
		return $this->template->load('template','user/user_form',$data);
	}
	public function delete($id)
	{
		$query=$this->user_m->hapus($id);
		echo "<script>alert ('data berhasil dihapus')</script>";
		redirect('user');
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
		$this->form_validation->set_rules('nomor', 'Notelp', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_message('required','%s masih kosong perlu diisi'); 
		$this->form_validation->set_message('min_length','{field} minimal lima karakter'); 
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		if ($this->form_validation->run() == FALSE)
		{
			if (isset($post['tambah'])) {
				$this->add();
			}
			elseif (isset($post['edit'])) {
				$this->edit($post['id']);
			}
		}
		else{
			if (isset($post['tambah'])) {
				$data=array(
					'nama_lengkap'=>$post['nama'],
					'username'=>$post['username'],
					'alamat'=>$post['alamat'],
					'notelp'=>$post['nomor'],
					'password'=>sha1($post['username']),
					'level'=>2,
				);
				$this->user_m->add($data);
				if ($this->db->affected_rows()>0) {
				 $this->session->set_flashdata('success', 'data berhasil ditambah');
				}
				redirect('user');
			}
			elseif (isset($post['edit'])) {
				$data=array(
					'iduser'=>$post['id'],
					'nama_lengkap'=>$post['nama'],
					'username'=>$post['username'],
					'alamat'=>$post['alamat'],
					'notelp'=>$post['nomor'],
				);
				$this->user_m->update($data);
				if ($this->db->affected_rows()>0) {
					$this->session->set_flashdata('success', 'data berhasil diedit');
				}
				redirect('user');
			}

		}
	}
}
