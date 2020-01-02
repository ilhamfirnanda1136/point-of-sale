<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_m extends CI_Model 
{
	private $table = 'pelanggan';

	public function get($id=null)
	{
		$this->db->from($this->table);
		if ($id!=null) {
			$this->db->where('idpelanggan',$id);
		}
		return $this->db->get();
	}
	public function getKodepelanggan()
	{
		$q = $this->db->query("SELECT MAX(RIGHT(kode_pelanggan,4)) AS kd_max FROM $this->table ");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return "PLG".date('Y').$kd;
	}
	public function add($data)
	{
	  $this->db->insert($this->table,$data);
	   return $this->db->insert_id();
	}
	public function update($data)
	{
		$this->db->where('idpelanggan',$data['idpelanggan']);
		return $this->db->update($this->table,$data);
	}
	public function hapus($id)
	{
		$this->db->where('idpelanggan',$id);
		return $this->db->delete($this->table);	
	}
}