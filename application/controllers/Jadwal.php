<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}
		$this->load->model('jadwal_model','jadwal');
		
		$this->load->model('Admin_db', 'Admin');
	}

	public function index()
	{
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul'] = "Jadwal";
		$data['mod'] = strtolower(get_class($this));
		$data['kelasData']= $this->jadwal->dataKelas();
		$data['mapelData']= $this->jadwal->dataMapel();
		$data['dataguru'] = $this->jadwal->guruData();
		$data['content'] = $this->load->view('jadwal/jadwal',$data,true);
		$this->load->view('tmp/index', $data);
	}

	public function ajax_list()
	{
		$list = $this->jadwal->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $jadwal) {
			$no++;
			$row = array();
			$row[] = $jadwal->mata_pelajaran;
			$row[] = $jadwal->kelas;
			$row[] = $jadwal->nama;
			$row[] = $jadwal->hari;
			$row[] = $jadwal->jam;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$jadwal->id_jadwal."'".')"><i class="fa fa-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_mapel('."'".$jadwal->id_jadwal."'".')"><i class="fa fa-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->jadwal->count_all(),
						"recordsFiltered" => $this->jadwal->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id_jadwal)
	{
		$data = $this->jadwal->get_by_id($id_jadwal);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'id_mapel' => $this->input->post('id_mapel'),
				'id_kelas' => $this->input->post('id_kelas'),
				'nip' 	   => $this->input->post('nip'),
				'hari' 	   => $this->input->post('hari'),
				'jam'      => $this->input->post('jam'),

			);
		$insert = $this->jadwal->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'id_mapel' => $this->input->post('id_mapel'),
				'id_kelas' => $this->input->post('id_kelas'),
				'nip' 	   => $this->input->post('nip'),
				'hari' 	   => $this->input->post('hari'),
				'jam'      => $this->input->post('jam'),
			);
		$this->jadwal->update(array('id_jadwal' => $this->input->post('id_jadwal')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id_jadwal)
	{
		$this->jadwal->delete_by_id($id_jadwal);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_mapel') == '')
		{
			$data['inputerror'][] = 'id_mapel';
			$data['error_string'][] = 'Data Kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_kelas') == '')
		{
			$data['inputerror'][] = 'id_kelas';
			$data['error_string'][] = 'Data Kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('nip') == '')
		{
			$data['inputerror'][] = 'nip';
			$data['error_string'][] = 'Data Kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('hari') == '')
		{
			$data['inputerror'][] = 'hari';
			$data['error_string'][] = 'Data Kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('jam') == '')
		{
			$data['inputerror'][] = 'jam';
			$data['error_string'][] = 'jam kosong';
			$data['status'] = FALSE;
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}


}

/* End of file Jadwal.php */
/* Location: ./application/controllers/Jadwal.php */