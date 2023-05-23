<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

public function index()
	{
		if ($this->session->userdata('role')=='Admin') {
			redirect(base_url("dsb/home"));
		}else if ($this->session->userdata('role')=='Guru') {
			redirect(base_url("beranda"));
		}
		$data['mod'] = strtolower(get_class($this));
		$data['content'] = $this->load->view('login/login_admin',$data,true);
		$this->load->view('tmp/login_admin', $data);
	}
}