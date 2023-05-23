<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}
		$this->load->model('petugas_m','petugas');
		$this->load->model('Admin_db', 'Admin');
	}

	public function index()
	{
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['dataguru'] = $this->petugas->guruData();
		$data['datarole'] = $this->petugas->roleData();
		$data['judul'] = "Petugas";
		$data['mod'] = strtolower(get_class($this));
		$data['content'] = $this->load->view('petugas/petugas',$data,true);
		$this->load->view('tmp/index', $data);
	}

	public function ajax_list()
	{
		$list = $this->petugas->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $petugas) {
			$no++;
			$row = array();
			$row[] = $petugas->username;
			$row[] = $petugas->role_id;
			$row[] = $petugas->password;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_petugas('."'".$petugas->id."'".')"><i class="fa fa-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_petugas('."'".$petugas->id."'".')"><i class="fa fa-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->petugas->count_all(),
						"recordsFiltered" => $this->petugas->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->petugas->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'nip'	=> $this->input->post('nip'), 
				'username' => $this->input->post('username'),
				'role_id'	=> $this->input->post('role_id'), 
				'password' => md5($this->input->post('password')),
			);
		$insert = $this->petugas->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'nip'	=> $this->input->post('nip'), 
				'username' => $this->input->post('username'),
				'role_id'	=> $this->input->post('role_id'), 
				'password' => md5($this->input->post('password')),
			);
		$this->petugas->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->petugas->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('username') == '')
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'Username is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('password') == '')
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'Password is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}

/* End of file Petugas.php */
/* Location: ./application/controllers/Petugas.php */