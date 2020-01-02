<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stokin extends CI_Controller {

	 public function __construct()
	 {
	 	parent::__construct();
	 	check_not_login(); 
	    $this->load->model(['stokin_m','merk_m','supplier_m','barang_m']);
	    $this->load->library('form_validation');
	 }

	 public function index()
	 {
	 	$data['baris']=$this->stokin_m->get()->result();
	 	$data['merk']=$this->merk_m->get()->result();
	 	return $this->template->load('template','transaksi/stokin/stokin_data',$data);
	 }
	 public function add()
	 {
	 	$post=$this->input->post(null,true);
	 	$merk=$this->merk_m->get($post['id'])->row();
	 	$barang=$this->barang_m->getMerk($post['id'])->result();
	 	$data=array(
	 		'merk'=>$merk,
	 		'page'=>'tambah',
	 		'barang'=>$barang,
	 		 	);
	 	return $this->template->load('template','transaksi/stokin/stokin_form',$data);
	 }
	 public function livesupplier()
	 {
	 	$sup=$this->input->get('supplier');
	 	$query=$this->supplier_m->getNamaSupplier($sup);
	 	echo json_encode($query);
	 }
	 public function prosesTambah()
	 {
	 	$post=$this->input->post(null,true);
	 	$cekBarang=$this->barang_m->get($post['barang'])->row();
	 	//var_dump($cekBarang->stok);
	 	$total_harga=str_replace('.','',$post['harga'])*$post['stok'];
	 	$total=$cekBarang->stok;
	 	$totalStok=$total+$post['stok'];
	 	$dataStok=array(
	 		'idbarang'=>$post['barang'],
	 		'stok'=>$totalStok,
	 	);
	 	$this->barang_m->update($dataStok);
	 	$data=array(
	 		'supplier'=>$post['supplier'],
	 		'merk'=>$post['merk'],
	 		'barang'=>$post['barang'],
	 		'total'=>$post['stok'],
	 		'harga_supplier'=>$total_harga,
	 		'created_at'=>date('Y-m-d'),
	 		'penjelasan'=>$post['penjelasan'],
	 	);
		 	$this->stokin_m->add($data);
		 	$this->session->set_flashdata('success', 'berhasil menambahkan stok');
		 	redirect('stokin');
	 }
	 public function prosesEdit(){
		 	$post=$this->input->post(null,true);
		 	$cekBarangKurang=$this->barang_m->get($post['barang'])->row();
		 	//var_dump($cekBarang->stok);
		 	$stokcurrent = $this->stokin_m->get($post['id'])->row();
		 	$stoksekarang = $stokcurrent->total;
		 	$total=$cekBarangKurang->stok;
		 	$kurang=$total-$stoksekarang;
		 	$dataStokKurang=array(
		 		'idbarang'=>$post['barang'],
		 		'stok'=>$kurang,
		 	);
		 	$this->barang_m->update($dataStokKurang);
		 	$cekBarangTambah=$this->barang_m->get($post['barang'])->row();
		 	$totalTambah=$cekBarangTambah->stok;
		 	$total_harga=str_replace('.','',$post['harga'])*$post['stok'];
	 		$tambah = $totalTambah+$post['stok'];
		 		$dataStokTambah=array(
		 		'idbarang'=>$post['barang'],
		 		'stok'=>$tambah,
		 	);
		 	$this->barang_m->update($dataStokTambah);
		 	$data=array(
		 		'idstokin' => $post['id'],
		 		'total'=>$post['stok'],
		 		'harga_supplier'=>$total_harga,
		 		'updated_at'=>date('Y-m-d'),
		 	);
			 	$this->stokin_m->update($data);
			 	$this->session->set_flashdata('success', 'berhasil mengubah stok');
			 	redirect('stokin');
	 }
	 public function delete($id,$barang)
	 {
		 	
		 	$cekBarang=$this->barang_m->get($barang)->row();
		 	$total=$cekBarang->stok;
		 	$stokcurrent = $this->stokin_m->get($id)->row();
		 	$stoksekarang = $stokcurrent->total;
		 	$kurang = $total-$stoksekarang;
		 	$datastok = array(
		 		'idbarang' => $barang,
		 		'stok' => $kurang
		 	);
		 	$this->barang_m->update($datastok);
		 	$this->stokin_m->hapus($id);
			$this->session->set_flashdata('success', 'berhasil menghapus stok');
			redirect('stokin');
	 }

}
