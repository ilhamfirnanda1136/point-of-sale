<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('user_m');    
	}
	
	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}

	public function process()
	{
		$pos=$this->input->post(null,true);
		if(isset($pos['login']))
		{
			$query=$this->user_m->login($pos);
			if($query->num_rows()>0)
			{
				$row=$query->row();
				$params=array(
					'userid'=>$row->iduser,
					'level'=>$row->level,
				);
				$this->session->set_userdata($params);
				?>
				<script>
					window.location='<?=site_url('dashboard')?>';
				</script>
				<?php
			}
			else{
				$this->session->set_flashdata('gagal', 'maaf gagal login cek username dan password');
				redirect('auth/login');
			}
		}
	}

	public function logout()
	{
		$params=array('userid','level');
		session_destroy();
		redirect('auth/login');
	}
}