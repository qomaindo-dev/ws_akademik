<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginsiswa extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('Login_model', 'login');

	}

	function index() {
		if ($this->session->userdata('role')=='Siswa') {
			redirect(base_url("dsb/BerandaSiswa"));
		}

		$data['mod'] = strtolower(get_class($this));
    	$data['content'] = $this->load->view('login/login',$data,true);
    	$this->load->view('tmp/login_tmp',$data);

	}

	function login_action() {
	$data = array('nis' => $this->input->post('nis', TRUE),
									'password' => md5($this->input->post('password', TRUE))
		);
		$result = $this->login->check_user($data);
		if ($result->num_rows() >= 1) {
			foreach ($result->result() as $sess) {
				$sess_data['logged_in'] = TRUE;
				// $sess_data['nis'] = $sess->nis;
				$sess_data['nis'] = $sess->nis;
				$sess_data['role'] = $sess->role;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('role')=='Siswa') {
				redirect(base_url("dsb/BerandaSiswa"));
			}
		} else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

	function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('role');
		$this->session->sess_destroy();
		redirect('Loginsiswa');
	}
}
