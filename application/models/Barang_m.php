<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_m extends CI_Model 
{
	private $table = 'barang';

	public function getMerk($id)
	{
		$this->db->select('barang.*,merk.*');
		$this->db->from($this->table);
		 $this->db->join('merk','merk.idmerk=barang.merk');
		if ($id!=null) {
			$this->db->where('merk',$id);
		}
		return $this->db->get();
	}
	public function get($id=null)
	{
		$this->db->select('barang.*,merk.*');
		$this->db->from($this->table);
		 $this->db->join('merk','merk.idmerk=barang.merk');
		if ($id!=null) {
			$this->db->where('idbarang',$id);
		}
		return $this->db->get();
	}
	public function getKodeBarang($type)
	{
		$q = $this->db->query("SELECT MAX(RIGHT(kode_barang,4)) AS kd_max FROM $this->table ");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return "BRG".strtoupper($type).$kd;
	}
	public function add($data)
	{
	  $this->db->insert($this->table,$data);
	   return $this->db->insert_id();
	}
	public function update($data)
	{
		$this->db->where('idbarang',$data['idbarang']);
		return $this->db->update($this->table,$data);
	}
	public function hapus($id)
	{
		$this->db->where('idbarang',$id);
		return $this->db->delete($this->table);	
	}
	
}