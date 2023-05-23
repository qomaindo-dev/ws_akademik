<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tahun extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}
		$this->load->model('tahun_model','tahun');
		$this->load->model('Admin_db', 'Admin');
	}

	public function index()
	{
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul'] = "Tahun Ajaran";
		$data['mod'] = strtolower(get_class($this));
		$data['content'] = $this->load->view('tahun Ajaran/tahun',$data,true);
		$this->load->view('tmp/index', $data);
	}

	public function ajax_list()
	{
		$list = $this->tahun->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $tahun) {
			$no++;
			$row = array();
			$row[] = $tahun->semester;
			$row[] = $tahun->tahun_ajaran;



			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_tahun('."'".$tahun->id_tahun."'".')"><i class="fa fa-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_tahun('."'".$tahun->id_tahun."'".')"><i class="fa fa-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->tahun->count_all(),
						"recordsFiltered" => $this->tahun->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id_tahun)
	{
		$data = $this->person->get_by_id($id_tahun);
		$data->tahun_ajaran = ($data->tahun_ajaran == '0000') ? '' : $data->tahun_ajaran; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

		public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'semester' => $this->input->post('semester'),
				'tahun_ajaran' => $this->input->post('tahun_ajaran'),
			);
		$insert = $this->tahun->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'semester' => $this->input->post('semester'),
				'tahun_ajaran' => $this->input->post('tahun_ajaran'),

			);
		$this->tahun->update(array('id_tahun' => $this->tahun->post('id_tahun')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id_tahun)
	{
		$this->tahun->delete_by_id($id_tahun);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

	if($this->input->post('semester') == '')
		{
			$data['inputerror'][] = 'semester';
			$data['error_string'][] = 'Semester kosong';
			$data['status'] = FALSE;
		}


		if($this->input->post('tahun_ajaran') == '')
		{
			$data['inputerror'][] = 'tahun_ajaran';
			$data['error_string'][] = 'Tahun Ajaran kosong';
			$data['status'] = FALSE;
		}


		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}

/* End of file Ruang.php */
/* Location: ./application/controllers/Ruang.php */
