<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login(); 
        $this->load->model('merk_m');
        $this->load->library('form_validation');     
	}
	protected function valueTambah()
	{
		$merk=new stdClass();
		$merk->idmerk=null;
		$merk->nama_merk=null;
		$data=array(
			'baris'=>$merk,
			'page'=>'tambah',
		);
		return $data;
	}

	public function index()
	{
		$data['baris']=$this->merk_m->get()->result();
		$this->template->load('template','merk/merk_data',$data);
	}
	public function add()
	{
		$data=$this->valueTambah();
		$this->template->load('template','merk/merk_form',$data);	
	}
	public function edit($id)
	{
		$query=$this->merk_m->get($id);
		$merk=$query->row();
		$data=array(
			'baris'=>$merk,
			'page'=>'edit',
		);
		$this->template->load('template','merk/merk_form',$data);
	}
	public function delete($id)
	{
		$this->merk_m->hapus($id);
		echo "<script> alert ('data berhasil dihapus')</script>";
		redirect('merk');
	}
	public function proses()
	{
		$post=$this->input->post(null,true);
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_message('required','%s masih kosong perlu diisi');  
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
		else
		{
			if (isset($post['tambah'])) {
			 	$kodemrk=$this->merk_m->getKodemerk();
			 	$data=array(
					'kode_merk'=>$kodemrk,
					'nama_merk'=>$post['nama'],
				);
				$this->merk_m->add($data);
				if ($this->db->affected_rows()>0) {
					$this->session->set_flashdata('success', 'data berhasil ditambah');
				}
				redirect('merk');
			}
			elseif (isset($post['edit'])) {
				$data=array(
					'idmerk'=>$post['id'],
					'nama_merk'=>$post['nama'],
				);
				$this->merk_m->update($data);
				if ($this->db->affected_rows()>0) {
					$this->session->set_flashdata('success', 'data berhasil diedit');
				}
				redirect('merk');
			}
		}

	}

}