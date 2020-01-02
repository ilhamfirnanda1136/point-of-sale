<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
        $this->load->model('pelanggan_m');
        $this->load->library('form_validation');     
	}

	public function index()
	{
		$data['baris']=$this->pelanggan_m->get()->result();
		return $this->template->load('template','pelanggan/pelanggan_data',$data);
	}
	protected function valueTambah()
	{
		$pelanggan=new stdClass();
		$pelanggan->idpelanggan=null;
		$pelanggan->nama_pelanggan=null;
		$pelanggan->kode_pelanggan=null;
		$pelanggan->alamat=null;
		$pelanggan->notelp=null;
		$data=array(
			'baris'=>$pelanggan,
			'page'=>'tambah',
		);
		return $data;
	}
	public function add()
	{
		$data=$this->valueTambah();
		$this->template->load('template','pelanggan/pelanggan_form',$data);	
	}
	public function edit($id)
	{
		$query=$this->pelanggan_m->get($id);
		$pelanggan=$query->row();
		$data=array(
			'baris'=>$pelanggan,
			'page'=>'edit',
		);
		$this->template->load('template','pelanggan/pelanggan_form',$data);
	}
	public function delete($id)
	{
		$this->pelanggan_m->hapus($id);
		echo "<script> alert ('data berhasil dihapus')</script>";
		redirect('pelanggan');
	}
	public function proses()
	{
		$post=$this->input->post(null,true);
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Merk', 'required');
		$this->form_validation->set_rules('nomor', 'nomor telpon', 'required|numeric');
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
				$kodePel=$this->pelanggan_m->getKodepelanggan();	
				$data=array(
					'kode_pelanggan'=>$kodePel,
					'nama_pelanggan'=>$post['nama'],
					'alamat'=>$post['alamat'],
					'notelp'=>$post['nomor'],
				);
				$this->pelanggan_m->add($data);
				if ($this->db->affected_rows()>0) {
					$this->session->set_flashdata('success', 'data berhasil ditambah');
				}
				redirect('pelanggan');
			}
			elseif (isset($post['edit'])) {
				$data=array(
					'idpelanggan'=>$post['id'],
					'nama_pelanggan'=>$post['nama'],
					'alamat'=>$post['alamat'],
					'notelp'=>$post['nomor'],
				);
				$this->pelanggan_m->update($data);
				if ($this->db->affected_rows()>0) {
					$this->session->set_flashdata('success', 'data berhasil diedit');
				}
				redirect('pelanggan');
			}
		}
	}

}