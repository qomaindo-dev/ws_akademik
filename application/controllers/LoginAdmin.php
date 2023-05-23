<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginAdmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_db', 'login');
	}

	public function index()
	{
		if ($this->session->userdata('role')=='Admin') {
			redirect(base_url("dsb/home"));
		// }else if ($this->session->userdata('role')=='Siswa') {
		// 	redirect(base_url("dsb/home"));
		}else if ($this->session->userdata('role')=='Guru') {
			redirect(base_url("beranda"));
		}

		$data['mod'] = strtolower(get_class($this));
    	$data['content'] = $this->load->view('login/login_admin',$data,true);
		$this->load->view('tmp/login_admin', $data);
	}

	function login_action() {
		$data = array('username' => $this->input->post('username', TRUE),
									'password' => md5($this->input->post('password', TRUE))
		);
		$result = $this->login->check_user($data);
		if ($result->num_rows() >= 1) {
			foreach ($result->result() as $sess) {
				$sess_data['logged_in'] = TRUE;
				$sess_data['user_id'] = $sess->user_id;
				$sess_data['nip'] = $sess->nip;
				$sess_data['role'] = $sess->role;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('role')=='Admin') {
				echo "<script>alert('Selamat Anda Berhasil Login Sebagai Admin');history.go(-1);</script>";
				// redirect(base_url("dsb/home"));
			}else if ($this->session->userdata('role')=='Guru') {
				echo "<script>alert('Selamat Anda Berhasil Login Sebagai Guru');history.go(-1);</script>";
				// redirect(base_url("Beranda"));
			}
		} else {
			echo "<script>alert('Gagal login: cek username, password!');history.go(-1);</script>";
		}
	}

	function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('role');
		$this->session->sess_destroy();
		redirect(base_url());
	}

}

/* End of file LoginAdmin.php */
/* Location: ./application/controllers/LoginAdmin.php */