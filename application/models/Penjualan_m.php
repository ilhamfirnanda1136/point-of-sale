<?php
class Penjualan_m extends CI_Model{
    private $table = 'nota_head';
    public function __construct(){
        parent::__construct();
        check_not_login();
    }
    public function get($id=null){
        $this->db->select('pelanggan.nama_pelanggan, nota_head.*');
        $this->db->from($this->table);
        $this->db->join('pelanggan','pelanggan.idpelanggan=nota_head.idpelanggan');
        return $this->db->get();
    }
    public function get2($id=null){
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get();
    }
    public function add($data){
        $check = "select max(idnota) as id from nota_head";
        $ex = $this->db->query($check);
        $res = $ex->result_array();
        $nourut = $res[0]['id'];
        $nourut++;
        foreach ($data['cart'] as $datas){
            $query = "insert into nota_body(idnota, jumlah_beli, total_harga, barang, imei) values('$nourut','$datas[jumlah_beli]','$datas[total_harga]','$datas[idbarang]','$datas[imei]')";
            $query2 = "update barang set stok=stok-'$datas[jumlah_beli]' where kode_barang='$datas[kode_barang]'";
            $ex = $this->db->trans_start();
            $ex = $this->db->query($query);
            $ex = $this->db->query($query2);
            $ex = $this->db->trans_complete();
        }
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d");
        $jam = date("H:i:s");
        // QUERY
        $query = "insert into nota_head(idnota,tanggal_pembelian, jam, idpelanggan) values ('$nourut','$tanggal','$jam','$data[idpelanggan]')";
        $ex = $this->db->query($query);
        $this->session->unset_userdata('cart');
        $this->session->set_flashdata('success', 'Berhasil menghapus data');
        redirect(base_url("penjualan"));
        return $ex;
    }
    public function get_pembelian($idnota){
        $this->db->where('nota_body.idnota', $idnota);
        $this->db->select('barang.kode_barang,barang.nama_barang,barang.harga,nota_head.tanggal_pembelian,nota_head.jam,nota_body.*');
        $this->db->from('nota_body');
        $this->db->join('barang','barang.idbarang=nota_body.barang');
        $this->db->join('nota_head', 'nota_head.idnota=nota_body.idnota');
        return $this->db->get();
    }
    public function hapus_data($key){
        $jumlah_beli = $this->input->post('jumlahbeli');
        $kodebarang = $this->input->post('kodebarang');
        $query_delete = "delete from nota_body where idnota_body='$key'";
        $query_min_stock = "update barang set stok=stok+'$jumlah_beli' where kode_barang='$kodebarang'";
        $ex = $this->db->trans_start();
        $ex = $this->db->query($query_min_stock);
        $ex = $this->db->query($query_delete);
        $ex = $this->db->trans_complete();
        return $ex;
    }
    public function hapus_nota($key){
        $query_check = "select * from nota_body where idnota='$key'";
        $ex = $this->db->query($query_check);
        $result = $ex->result_array();
        foreach ($result as $data){
            $query_delete = "delete from nota_body where idnota='$key'";
            $query_update = "update barang set stok=stok+$data[jumlah_beli] where idbarang='$data[barang]'";
            $ex = $this->db->trans_start();
            $ex = $this->db->query($query_update);
            $ex = $this->db->query($query_delete);
            $ex = $this->db->trans_complete();
        }
        $query_delete_nota = "delete from nota_head where idnota='$key'";
        $ex = $this->db->query($query_delete_nota);
        $this->session->set_flashdata('success', 'Berhasil menghapus data');
        redirect(base_url("penjualan"));
        return $ex;
    }
}
?>