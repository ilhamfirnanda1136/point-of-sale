<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class supplier_m extends CI_Model 
{
	private $table = 'supplier';

	public function get($id=null)
	{
		$this->db->from($this->table);
		if ($id!=null) {
			$this->db->where('idsupplier',$id);
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
		$this->db->where('idsupplier',$data['idsupplier']);
		return $this->db->update($this->table,$data);
	}
	public function hapus($id)
	{
		$this->db->where('idsupplier',$id);
		return $this->db->delete($this->table);	
	}
	public function getNamaSupplier($nama)
	{
		$this->db->select('*');
		$this->db->limit(10);
		$this->db->from($this->table);
		$this->db->like('nama_supplier',$nama);
		return $this->db->get()->result();
	}
}