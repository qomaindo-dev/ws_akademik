<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}
		$this->load->model('kategori_model','kategori');
		$this->load->model('Admin_db', 'Admin');
	}

	public function index()
	{
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul'] = "Kategori Nilai";
		$data['mod'] = strtolower(get_class($this));
		$data['content'] = $this->load->view('nilai/kategori',$data,true);
		$this->load->view('tmp/index', $data);
	}

	public function ajax_list()
	{
		$list = $this->kategori->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kategori) {
			$no++;
			$row = array();
			$row[] = $kategori->kategori_nilai;
			$row[] = $kategori->bobot;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kategori('."'".$kategori->id_kategori."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kategori('."'".$kategori->id_kategori."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kategori->count_all(),
						"recordsFiltered" => $this->kategori->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id_kategori)
	{
		$data = $this->kategori->get_by_id($id_kategori);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'kategori_nilai' => $this->input->post('kategori_nilai'),
				'bobot' => $this->input->post('bobot'),

			);
		$insert = $this->kategori->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'kategori_nilai' => $this->input->post('kategori_nilai'),
				'bobot' => $this->input->post('bobot'),
			);
		$this->kategori->update(array('id_kategori' => $this->input->post('id_kategori')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id_kategori)
	{
		$this->kategori->delete_by_id($id_kategori);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('kategori_nilai') == '')
		{
			$data['inputerror'][] = 'kategori_nilai';
			$data['error_string'][] = 'kategori nilai is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('bobot') == '')
		{
			$data['inputerror'][] = 'bobot';
			$data['error_string'][] = 'bobot is required';
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