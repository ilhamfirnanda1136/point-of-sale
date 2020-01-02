<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stokin_m extends CI_Model 
{
	private $table = 'stockin';

	public function get($id=null)
	{
		$this->db->select('stockin.*,supplier.*,merk.*,barang.nama_barang,barang.kode_barang');
		$this->db->from($this->table);
		$this->db->join('supplier','supplier.idsupplier=stockin.supplier','left');
        $this->db->join('merk','merk.idmerk=stockin.merk','left');
        $this->db->join('barang','barang.idbarang=stockin.barang','left');
		if ($id!=null) {
			$this->db->where('idstokin',$id);
		}
		return $this->db->get();
	}
	public function add($data)
	{
	   $this->db->insert($this->table,$data);
	   return $this->db->insert_id();
	}
	public function update($data)
	{
		$this->db->where('idstokin',$data['idstokin']);
		return $this->db->update($this->table,$data);
	}
	public function hapus($id){
		$this->db->where('idstokin',$id);
		return $this->db->delete($this->table);	
	}
}

