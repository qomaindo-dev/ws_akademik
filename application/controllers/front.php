<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
		$data['mod'] = strtolower(get_class($this));
    	//$data['content'] = $this->load->view('login_siswa/login_siswa',$data,true);
    	$this->load->view('tmp/index_front',$data);
	}

	public function informasi()
	{
		/*if ($this->session->userdata('role')=='Siswa') {
			redirect(base_url("dsb/home"));
		}
*/
		$data['mod'] = strtolower(get_class($this));
    	//$data['content'] = $this->load->view('login_siswa/login_siswa',$data,true);
    	$this->load->view('front/informasi',$data);
	}

	public function kontak()
	{
		if ($this->session->userdata('role')=='Siswa') {
			redirect(base_url("dsb/home"));
		}

		$data['mod'] = strtolower(get_class($this));
    	//$data['content'] = $this->load->view('login_siswa/login_siswa',$data,true);
    	$this->load->view('front/kontak',$data);
	}

	public function student()
	{
		if ($this->session->userdata('role')=='Siswa') {
			redirect(base_url("dsb/home"));
		}

		$data['mod'] = strtolower(get_class($this));
    	//$data['content'] = $this->load->view('login_siswa/login_siswa',$data,true);
    	$this->load->view('front/student',$data);
	}
}



/* End of file front.php */
/* Location: ./application/controllers/front.php */