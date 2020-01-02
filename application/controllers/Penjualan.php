<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(['barang_m','penjualan_m','pelanggan_m']);
        $kosong = array();
        if (!$this->session->has_userdata('cart')){
            $this->session->set_userdata('cart', $kosong);
        }
    }
    public function index(){
        $data['penjualan'] = $this->penjualan_m->get()->result();
        $data['penjualan2'] = $this->penjualan_m->get2()->result();
        return $this->template->load('template','penjualan/penjualan_data', $data);
    }
    public function listpembelian(){
        $data = $this->session->userdata('cart');
        echo json_encode($data);
    }
    public function listpembeliancurrent($idnota){
        $data = $this->penjualan_m->get_pembelian($idnota)->result_array();
        echo json_encode($data);
    }

    // TAMBAH
    public function tambah(){
        $data['pelanggan'] = $this->pelanggan_m->get()->result();
        return $this->template->load('template', 'penjualan/penjualan_form', $data);
    }
    public function action_tambah(){
        $harga = $this->input->post('harga');
        $jumlah_beli = $this->input->post('jumlah_beli');
        $total = $harga * $jumlah_beli;
        $data = array(
            'kode_barang' => $this->input->post('kode_produk'),
            'harga' => $harga,
            'jumlah_beli' => $jumlah_beli,
            'nama_barang' => $this->input->post('nama_barang'),
            'total_harga' => $total,
            'idbarang' => $this->input->post('idbarang'),
            'imei' => $this->input->post('imei'),
        );
        $cart = $this->session->userdata('cart');
        array_push($cart, $data);
        $this->session->set_userdata('cart', $cart);
        echo json_encode($data);
    }
    public function action_tambah_database($idpelanggan){
        $data = array(
            'cart' => $this->session->userdata('cart'),
            'idpelanggan' => $idpelanggan,
        );
        $this->penjualan_m->add($data);
    }

    // HAPUS
    public function hapus($key){
        $datas = array(
            'key' => $this->input->post('key'),
        );
        if ($key == 0){
            $data = $this->session->userdata('cart');
            array_shift($data);
            $this->session->set_userdata('cart', $data);
            echo json_encode($datas);
        }else{
            $data = $this->session->userdata('cart');
            unset($data[$key]);
            $array2 = array_values($data);
            $this->session->set_userdata('cart', $array2);
            echo json_encode($datas);
        }
    }
    public function hapus_semua(){
        $datas = array(
            'success' => 'success'
        );
        $data = $this->session->userdata('cart');
        $this->session->unset_userdata('cart');
        echo json_encode($datas);
    }
    public function hapus_data($key){
        $data = $this->penjualan_m->hapus_data($key);
        echo json_encode($data);
    }
    public function hapus_nota($key){
        $this->penjualan_m->hapus_nota($key);
    }

    public function livebarang(){
        $barang = $this->barang_m->get()->result();
        echo json_encode($barang);
    }
    public function livecustomer(){
        $customer = $this->pelanggan_m->get()->result();
        echo json_encode($customer);
    }
    public function print($key){
        $data['print'] = $this->penjualan_m->get_pembelian($key)->result();
        $this->template->load('template2', 'penjualan/penjualan_print', $data);
    }
}