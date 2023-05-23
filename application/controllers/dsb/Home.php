<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();

    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}

		$this->load->model('Admin_db', 'Admin');
		$this->load->model('rowcount_model', 'rw');
		
	}

public function index()
	{
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul'] = "Beranda";
		$data['mod'] = strtolower(get_class($this));
		$data['total_mapel'] = $this->rw->Jumlahmapel();
		$data['total_guru'] = $this->rw->Jumlahguru();
		$data['total_siswa'] = $this->rw->Jumlahsiswa();
		$data['total_kelas'] = $this->rw->Jumlahkelas();
		$data['content'] = $this->load->view('dsb/dashboard',$data,true);
		$this->load->view('tmp/index', $data);
		$data['employee'] = $this->Admin->guru_data($this->session->userdata('nip'));
	}
}