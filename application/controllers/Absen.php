<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_db', 'Admin');
	}

	public function index()
	{
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul'] = "Absen";
		$data['mod'] = strtolower(get_class($this));
		$data['content'] = $this->load->view('master/absen',$data,true);
		$this->load->view('tmp/index', $data);
	}
	

}

/* End of file Absen.php */
/* Location: ./application/controllers/Absen.php */