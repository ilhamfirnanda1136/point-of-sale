<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['barang_m','pelanggan_m','supplier_m','merk_m']);	
	}

	public function index()
	{
		$data=[];
		$data['barang']=$this->barang_m->get()->num_rows();
		$data['pelanggan']=$this->pelanggan_m->get()->num_rows();
		$data['supplier']=$this->supplier_m->get()->num_rows();
		$data['merk']=$this->merk_m->get()->num_rows();
		$this->template->load('template','dashboard',$data);	
	}
}