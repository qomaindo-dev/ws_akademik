<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 * 
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['mod'] = strtolower(get_class($this));
		$data['content'] = $this->load->view('dsb/dashboard',$data,true);
		$this->load->view('tmp/index', $data);
//		 $this->load->view('tmp/index');
		// if ($this->session->userdata('role')=='Admin') {
		// 	redirect(base_url("dsb/admin"));
		// }

		// $data['mod'] = strtolower(get_class($this));
  //   	$data['content'] = $this->load->view('login/login',$data,true);
		// $this->load->view('tmp/auth_tmp', $data);
	}
}
