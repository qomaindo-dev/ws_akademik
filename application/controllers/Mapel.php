<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}
		$this->load->model('mapel_m','mapel');
		$this->load->model('Admin_db', 'Admin');
	}

	public function index()
	{
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul'] = "Mata Pelajaran";
		$data['mod'] = strtolower(get_class($this));
		$data['content'] = $this->load->view('Mapel/mapel',$data,true);
		$this->load->view('tmp/index', $data);
	}

	public function ajax_list()
	{
		$list = $this->mapel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $mapel) {
			$no++;
			$row = array();
			$row[] = $mapel->mata_pelajaran;
			$row[] = $mapel->kkm;
			$row[] = $mapel->kelompok;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_mapel('."'".$mapel->id_mapel."'".')"><i class="fa fa-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_mapel('."'".$mapel->id_mapel."'".')"><i class="fa fa-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mapel->count_all(),
						"recordsFiltered" => $this->mapel->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id_mapel)
	{
		$data = $this->mapel->get_by_id($id_mapel);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'mata_pelajaran' => $this->input->post('mata_pelajaran'),
				'kkm' => $this->input->post('kkm'),
				'kelompok' => $this->input->post('kelompok'),
			);
		$insert = $this->mapel->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'mata_pelajaran' => $this->input->post('mata_pelajaran'),
				'kkm' => $this->input->post('kkm'),
				'kelompok' => $this->input->post('kelompok'),
			);
		$this->mapel->update(array('id_mapel' => $this->input->post('id_mapel')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id_mapel)
	{
		$this->mapel->delete_by_id($id_mapel);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('mata_pelajaran') == '')
		{
			$data['inputerror'][] = 'mata_pelajaran';
			$data['error_string'][] = 'Mata Pelajaran is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('kkm') == '')
		{
			$data['inputerror'][] = 'kkm';
			$data['error_string'][] = 'KKM is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('kelompok') == '')
		{
			$data['inputerror'][] = 'kelompok';
			$data['error_string'][] = 'kelompok is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	
}

/* End of file matapelajaran.php */
/* Location: ./application/controllers/matapelajaran.php */