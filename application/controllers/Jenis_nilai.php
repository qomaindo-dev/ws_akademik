<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}
		$this->load->model('jenis_m','jenis');
		
		$this->load->model('Admin_db', 'Admin');
	}

	public function index()
	{
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul'] = "Jenis Nilai";
		$data['mod'] = strtolower(get_class($this));
		$data['content'] = $this->load->view('nilai/jenis',$data,true);
		$this->load->view('tmp/index', $data);
	}

	public function ajax_list()
	{
		$list = $this->jenis->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $jenis) {
			$no++;
			$row = array();
			$row[] = $jenis->jenis_nilai;
			$row[] = $jenis->kode_nilai;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$jenis->id_jenis."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_jenis('."'".$jenis->id_jenis."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->jenis->count_all(),
						"recordsFiltered" => $this->jenis->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id_jenis)
	{
		$data = $this->jenis->get_by_id($id_jenis);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'jenis_nilai' => $this->input->post('jenis_nilai'),
				'kode_nilai' => $this->input->post('kode_nilai'),

			);
		$insert = $this->jenis->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'jenis_nilai' => $this->input->post('jenis_nilai'),
				'kode_nilai' => $this->input->post('kode_nilai'),
			);
		$this->jenis->update(array('id_jenis' => $this->input->post('id_jenis')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id_jenis)
	{
		$this->jenis->delete_by_id($id_jenis);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('jenis_nilai') == '')
		{
			$data['inputerror'][] = 'jenis_nilai';
			$data['error_string'][] = 'Jenis nilai is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('kode_nilai') == '')
		{
			$data['inputerror'][] = 'kode_nilai';
			$data['error_string'][] = 'Kode Nilai is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}


}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */