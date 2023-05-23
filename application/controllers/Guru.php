<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}
		$this->load->model('guru_model','guru');
		
		$this->load->model('Admin_db', 'Admin');
	}

	public function index()
	{
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul'] = "Guru";
		$data['mapelData']= $this->guru->dataMapel();
		$data['mod'] = strtolower(get_class($this));
		$data['content'] = $this->load->view('Guru/guru',$data,true);
		$this->load->view('tmp/index', $data);
	}

	public function detailGuru($id){

			$data['judul'] = 'Detail Guru';
			//$data['nav_menu'] = 'employee';
			//$data['employee'] = $this->Admin->guru_data($this->session->userdata('nip'));
			$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
	    	$data['DataGuru'] = $this->guru->getdetailguru($id);

	    $data['mod'] = strtolower(get_class($this));
	    $data['content'] = $this->load->view('guru/detailGuru',$data,true);
	   $this->load->view('tmp/index', $data);

	}

	public function ajax_list()
	{
		$this->load->helper('url');

		$list = $this->guru->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $guru) {
			$no++;
			$row = array();
			$row[] = $guru->nip;
			$row[] = $guru->nama;
			$row[] = $guru->mata_pelajaran;
			$row[] = $guru->jenis_kelamin;
			$row[] = $guru->alamat;
			/*$row[] = $guru->tempat_lahir;
			$row[] = $guru->tgl_lahir;
			$row[] = $guru->status;*/
			$row[] = $guru->no_tlp;
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_guru('."'".$guru->nip."'".')"><i class="fa fa-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_guru('."'".$guru->nip."'".')"><i class="fa fa-trash"></i> Hapus</a>
				  <a class="btn btn-sm btn-default" href="'.base_url().'guru/detailGuru/'.$guru->nip.'" title="Detail"><i class="fa fa-search"></i> Detail</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->guru->count_all(),
						"recordsFiltered" => $this->guru->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($nip)
	{
		$data = $this->guru->get_by_id($nip);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		
		$data = array(
				'nip' 			=> $this->input->post('nip'),
				'nama' 			=> $this->input->post('nama'),
				'id_mapel'		=> $this->input->post('id_mapel'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' 		=> $this->input->post('alamat'),
				'tempat_lahir' 	=> $this->input->post('tempat_lahir'),
				'tgl_lahir' 	=> $this->input->post('tgl_lahir'),
				'status' 		=> $this->input->post('status'),
				'no_tlp'		=> $this->input->post('no_tlp'),
				'is_delete'     => '0',
			);

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			$data['photo'] = $upload;
		}

		$insert = $this->guru->save($data);

		echo json_encode(array("status" => TRUE));
	}



	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'nip' 			=> $this->input->post('nip'),
				'nama' 			=> $this->input->post('nama'),
				'id_mapel' 		=> $this->input->post('id_mapel'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' 		=> $this->input->post('alamat'),
				'tempat_lahir' 	=> $this->input->post('tempat_lahir'),
				'tgl_lahir' 	=> $this->input->post('tgl_lahir'),
				'status' 		=> $this->input->post('status'),
				'no_tlp'		=> $this->input->post('no_tlp'),
				'is_delete'     => '0',
			);

		if($this->input->post('remove_photo')) // if remove photo checked
		{
			if(file_exists('assets/images/guru/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('assets/images/guru/'.$this->input->post('remove_photo'));
			$data['photo'] = '';
		}

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$guru = $this->guru->get_by_id($this->input->post('nip'));
			if(file_exists('assets/images/guru/'.$guru->photo) && $guru->photo)
				unlink('assets/images/guru/'.$guru->photo);

			$data['photo'] = $upload;
		}

		$this->guru->update(array('nip' => $this->input->post('nip')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$guru = $this->guru->get_by_id($id);
		if(file_exists('assets/images/guru/'.$guru->photo) && $guru->photo)
			unlink('assets/images/guru/'.$guru->photo);

		$data = array(
					'is_delete' => '1',
	     );
		$this->guru->update(array('nip' => $id), $data);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'assets/images/guru/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('nip') == '')
		{
			$data['inputerror'][] = 'nip';
			$data['error_string'][] = 'Nip kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama') == '')
		{
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'Nama kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_mapel') == '')
		{
			$data['inputerror'][] = 'id_mapel';
			$data['error_string'][] = 'Mata pelajaran Kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('jenis_kelamin') == '')
		{
			$data['inputerror'][] = 'jenis_kelamin';
			$data['error_string'][] = 'Harap Pilih Jenis Kelamin';
			$data['status'] = FALSE;
		}

		if($this->input->post('alamat') == '')
		{
			$data['inputerror'][] = 'alamat';
			$data['error_string'][] = 'Alamat kosong';
			$data['status'] = FALSE;
		}


		if($this->input->post('tempat_lahir') == '')
		{
			$data['inputerror'][] = 'tempat_lahir';
			$data['error_string'][] = 'Tempat Lahir kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('tgl_lahir') == '')
		{
			$data['inputerror'][] = 'tgl_lahir';
			$data['error_string'][] = 'Tanggal kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('status') == '')
		{
			$data['inputerror'][] = 'status';
			$data['error_string'][] = 'status lahir kosong';
			$data['status'] = FALSE;
		}


		if($this->input->post('no_tlp') == '')
		{
			$data['inputerror'][] = 'no_tlp';
			$data['error_string'][] = 'Nomor Telepon kosong';
			$data['status'] = FALSE;
		}


		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}

	}
}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */