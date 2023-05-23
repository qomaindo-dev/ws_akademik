<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BerandaSiswa extends CI_Controller {

	function __construct() {
		parent::__construct();

    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}

    // $this->load->model('mst/Customer_db', 'Customer');
		$this->load->model('BerandaSiswa_db', 'Siswa');
	}

public function index()
	{
		$data['Datasiswa'] = $this->Siswa->siswaData($this->session->userdata('nis'));
		$data['judul'] = "Beranda";
		$data['mod'] = strtolower(get_class($this));
		$data['content'] = $this->load->view('dsb/Beranda',$data,true);
		$this->load->view('tmp/index_siswa', $data);
		$data['SiswaData'] = $this->Siswa->siswaData($this->session->userdata('nis'));
	}
}