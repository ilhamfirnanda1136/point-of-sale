<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login(); 
        $this->load->model(['barang_m','merk_m']);
        $this->load->library('form_validation');     
	}
	protected function valueTambah()
	{
		$barang=new stdClass();
		$barang->idbarang=null;
		$barang->nama_barang=null;
		$barang->harga=null;
		$barang->merk=null;
		$barang->stok=null;
		$barang->type=null;
		$merk=$this->merk_m->get()->result();
		$data=array(
			'baris'=>$barang,
			'page'=>'tambah',
			'merk'=>$merk
		);
		return $data;
	}

	public function index()
	{
		$data['baris']=$this->barang_m->get()->result();
		$this->template->load('template','barang/barang_data',$data);
	}
	public function add()
	{
		$data=$this->valueTambah();
		$this->template->load('template','barang/barang_form',$data);	
	}
	public function edit($id)
	{
		$query=$this->barang_m->get($id);
		$barang=$query->row();
		$merk=$this->merk_m->get()->result();
		$data=array(
			'baris'=>$barang,
			'page'=>'edit',
			'merk'=>$merk
		);
		$this->template->load('template','barang/barang_form',$data);
	}
	public function delete($id)
	{
		$this->barang_m->hapus($id);
		echo "<script> alert ('data berhasil dihapus')</script>";
		redirect('barang');
	}
	public function proses()
	{
		$post=$this->input->post(null,true);
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');
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
			 	$kodebrg=$this->barang_m->getKodeBarang($post['type']);
			 	$harga=str_replace('.','',$post['harga']);

			 	$data=array(
					'kode_barang'=>$kodebrg,
					'type'=>$post['type'],
					'nama_barang'=>$post['nama'],
					'harga'=>$harga,
					'merk'=>$post['merk'],
					'stok'=>0,
				);
				$this->barang_m->add($data);
				if ($this->db->affected_rows()>0) {
					$this->session->set_flashdata('success', 'data berhasil ditambah');
				}
				redirect('barang');
			}
			elseif (isset($post['edit'])) {
				$harga=str_replace('.','',$post['harga']);
				$data=array(
					'idbarang'=>$post['id'],
					'type'=>$post['type'],
					'nama_barang'=>$post['nama'],
					'harga'=>$harga,
					'merk'=>$post['merk'],
					'updated_at'=>date('Y-m-d H:i:s')
				);
				$this->barang_m->update($data);
				if ($this->db->affected_rows()>0) {
					$this->session->set_flashdata('success', 'data berhasil diedit');
				}
				redirect('barang');
			}
		}

	}

}