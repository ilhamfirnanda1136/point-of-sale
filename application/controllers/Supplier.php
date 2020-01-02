<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login(); 
        $this->load->model('supplier_m');
        $this->load->library('form_validation');     
	}
		public function index()
	{
		$data['baris']=$this->supplier_m->get()->result();
		return $this->template->load('template','supplier/supplier_data',$data);
	}
	protected function valueTambah()
	{
		$supplier=new stdClass();
		$supplier->idsupplier=null;
		$supplier->nama_supplier=null;
		$supplier->kode_supplier=null;
		$supplier->alamat=null;
		$supplier->notelp=null;
		$data=array(
			'baris'=>$supplier,
			'page'=>'tambah',
		);
		return $data;
	}
	public function add()
	{
		$data=$this->valueTambah();
		$this->template->load('template','supplier/supplier_form',$data);	
	}
	public function edit($id)
	{
		$query=$this->supplier_m->get($id);
		$supplier=$query->row();
		$data=array(
			'baris'=>$supplier,
			'page'=>'edit',
		);
		$this->template->load('template','supplier/supplier_form',$data);
	}
	public function delete($id)
	{
		$this->supplier_m->hapus($id);
		echo "<script> alert ('data berhasil dihapus')</script>";
		redirect('supplier');
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
				$data=array(
					'nama_supplier'=>$post['nama'],
					'alamat'=>$post['alamat'],
					'notelp'=>$post['nomor'],
				);
				$this->supplier_m->add($data);
				if ($this->db->affected_rows()>0) {
					$this->session->set_flashdata('success', 'data berhasil ditambah');
				}
				redirect('supplier');
			}
			elseif (isset($post['edit'])) {
				$data=array(
					'idsupplier'=>$post['id'],
					'nama_supplier'=>$post['nama'],
					'alamat'=>$post['alamat'],
					'notelp'=>$post['nomor'],
				);
				$this->supplier_m->update($data);
				if ($this->db->affected_rows()>0) {
					$this->session->set_flashdata('success', 'data berhasil diedit');
				}
				redirect('supplier');
			}
		}
	}

}