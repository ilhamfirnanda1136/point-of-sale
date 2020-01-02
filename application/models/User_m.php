<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model 
{
	private $table='user';

    public function login($post)
    {
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('username',$post['username']);
        $this->db->where('password',sha1($post['password']));
        $query=$this->db->get();
        return $query;
    }
    public function get($id=null)
    {
        
    	$this->db->from($this->table);
    	if ($id!=null) {
    	  $this->db->where('iduser',$id);
    	}

    	$query=$this->db->get();
        return $query;
    }
    public function add($data)
    {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }
    public function update($data)
    {
        $this->db->where('iduser',$data['iduser']);
        $this->db->update($this->table,$data);
    }
    public function hapus($id)
    {
            $this->db->where('iduser',$id);
        $this->db->delete($this->table);
    }
    public function editProfile($post)
    {
        $params['username']=$post['username'];
        $params['nama_lengkap']=$post['nama'];
        if (!empty($post['password'])) { 
        $params['password']=sha1($post['password']);
        }
        $params['alamat']=$post['alamat']!= "" ? $post['alamat'] : null;
        $params['notelp']=$post['nomor'];
        $this->db->where('iduser',$post['id']);
        $this->db->update($this->table,$params);
    }
}