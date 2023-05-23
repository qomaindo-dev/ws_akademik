<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ruang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}
		$this->load->model('ruang_model','ruang');
		$this->load->model('Admin_db', 'Admin');
	}

	public function index()
	{
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul'] = "Ruangan";
		$data['mod'] = strtolower(get_class($this));
		$data['content'] = $this->load->view('kelas/ruang',$data,true);
		$this->load->view('tmp/index', $data);
	}

	public function ajax_list()
	{
		$list = $this->ruang->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $ruang) {
			$no++;
			$row = array();
			$row[] = $ruang->kelas;
			$row[] = $ruang->jml_siswa;


			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_ruang('."'".$ruang->id_kelas."'".')"><i class="fa fa-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_ruang('."'".$ruang->id_kelas."'".')"><i class="fa fa-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->ruang->count_all(),
						"recordsFiltered" => $this->ruang->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id_kelas)
	{
		$data = $this->ruang->get_by_id($id_kelas);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'kelas' => $this->input->post('kelas'),
				'jml_siswa' => $this->input->post('jml_siswa'),
				
			);
		$insert = $this->ruang->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'kelas'     => $this->input->post('kelas'),
				'jml_siswa' => $this->input->post('jml_siswa'),
				
			);
		$this->ruang->update(array('id_kelas' => $this->input->post('id_kelas')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id_kelas)
	{
		$this->ruang->delete_by_id($id_kelas);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('kelas') == '')
		{
			$data['inputerror'][] = 'kelas';
			$data['error_string'][] = 'Pilih kelas';
			$data['status'] = FALSE;
		}

		if($this->input->post('jml_siswa') == '')
		{
			$data['inputerror'][] = 'jml_siswa';
			$data['error_string'][] = 'Jumlah Siswa kosong';
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
