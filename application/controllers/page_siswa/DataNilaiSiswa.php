<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DataNilaiSiswa extends CI_Controller {
public function __construct()
	{
		parent::__construct();
			    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}
		$this->load->model('siswa_front/NilaiSiswa_db','DataNilai');
		$this->load->model('BerandaSiswa_db', 'Siswa');
	}

	public function index()
	{
		$data['Datasiswa'] = $this->Siswa->siswaData($this->session->userdata('nis'));
		$data['Datanilai'] = $this->DataNilai->Data_Nilaisiswa($this->session->userdata('nis'));
		$data['judul'] = "Data Siswa";
		$data['mod'] = strtolower(get_class($this));
		// $data['kelasData']= $this->Siswa->dataKelas();
		$data['content'] = $this->load->view('front/DataNilaiSiswa',$data,true);
		$this->load->view('tmp/index_siswa', $data);
	// }
	// public function loginsiswa(){
	// $data['mod'] = strtolower(get_class($this));
	//     $data['content'] = $this->load->view('login_siswa/login_siswa',$data,true);
	//     $this->load->view('tmp/login_siswa',$data);

	}

	public function datasiswa(){
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
	    // $data['datasiswa'] = $this->input->post('kelas');
	    $data['judul']= 'Pilih Kelas';
	    $data['kelasData']= $this->Siswa->dataKelas();
	    $data['mod'] = strtolower(get_class($this));
	    $data['content'] = $this->load->view('siswa/daftarsiswa',$data,true);
	    $this->load->view('tmp/index',$data);

	}

	public function cari(){
		$tbl	= 'siswa';
		$field 	= '*';
		$key	= 'id_kelas';
		$args	= $this->input->post('kelas');

	    $data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		// $key = $this->input->post('kelas');
		$data['judul']= 'Data Siswa';
	    $data['siswaData']= $this->Siswa->getData($tbl,$field,$key,$args);
	    $data['mod'] = strtolower(get_class($this));
	    $data['content'] = $this->load->view('siswa/datasiswa',$data,true);
	    $this->load->view('tmp/index',$data);
	}
	public function detailSiswa(){

			$data['judul'] = 'Detail Siswa';
			//$data['nav_menu'] = 'employee';
			//$data['employee'] = $this->Admin->guru_data($this->session->userdata('nip'));
			$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
	    	$data['siswaData'] = $this->Siswa->getdetailsiswa($id);

	    $data['mod'] = strtolower(get_class($this));
	    $data['content'] = $this->load->view('siswa/detailSiswa',$data,true);
	   $this->load->view('tmp/index', $data);

	}


	public function siswaDetail($id) {
	
			$data['judul'] = 'Detail Siswa';
			//$data['nav_menu'] = 'employee';
			//$data['employee'] = $this->Admin->guru_data($this->session->userdata('nip'));
			$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
	    	$data['siswaData'] = $this->Siswa->getdetailsiswa($id);

	    $data['mod'] = strtolower(get_class($this));
	    $data['content'] = $this->load->view('siswa/detailSiswa',$data,true);
	   $this->load->view('tmp/index', $data);


	}

 //  public function ajax_list() {
	// 		$list = $this->Siswa->get_datatables();
	// 		$data = array();
	// 		$no = $_POST['start'];
	// 		foreach ($list as $siswa) {
	// 			$no++;
	// 			$row = array();
	// 			$row[] = $siswa->nis;
	// 			$row[] = $siswa->nama_siswa;
	// 			$row[] = $siswa->id_kelas;
	// 			$row[] = $siswa->no_tlp;
	// 			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$siswa->nis."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
	// 				  		  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="deleted('."'".$siswa->nis."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
	// 				  		  <a class="btn btn-sm btn-default" href="'.base_url().'siswa/siswaDetail/'.$siswa->nis.'" title="Detail"><i class="glyphicon glyphicon-search"></i> Detail</a>';
	// 			$data[] = $row;
	// 		}
	// 		$output = array(
	// 						"draw" => $_POST['draw'],
	// 						"recordsTotal" => $this->Siswa->count_all(),
	// 						"recordsFiltered" => $this->Siswa->count_filtered(),
	// 						"data" => $data,
	// 		);
	// 		echo json_encode($output);
	// }

	public function ajax_edit($id) {

		$data['nis'] = $this->input->post('nis');
			$data = $this->DataDiri->Profile_data_siswa($id);
			echo json_encode($data);
	}

	public function ajax_add() {
			$this->_validate();

			$data = array(
					'nis'	 		=> $this->input->post('nis'),
					'nisn'			=> $this->input->post('nisn'),
					'nama_siswa' 	=> $this->input->post('nama_siswa'),
					'password'	 	=> md5($this->input->post('tgl_lahir')),
					'tempat_lahir'	=> $this->input->post('tempat_lahir'),
					'tgl_lahir' 	=> $this->input->post('tgl_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'agama' 		=> $this->input->post('agama'),
					'id_kelas' 		=> $this->input->post('id_kelas'),
					'tahun_ajaran' 	=> $this->input->post('tahun_ajaran'),
					'semester' 		=> $this->input->post('semester'),
					'role_id' 		=> '3',
					'nama_ayah'		=> $this->input->post('nama_ayah'),
					'pekerjaan'		=> $this->input->post('pekerjaan'),
					'nama_ibu' 		=> $this->input->post('nama_ibu'),
					'no_tlp' 		=> $this->input->post('no_tlp'),
					'alamat' 		=> $this->input->post('alamat'),
					'is_delete' 	=> '0',
			);

			if(!empty($_FILES['photo']['name'])) {
				$upload = $this->_do_upload();
				$data['photo'] = $upload;
			}

			$insert = $this->Siswa->save($data);
			echo json_encode(array("status" => TRUE));
	}

	public function ajax_update() {
			$this->_validate();

      $data = array(
					'nis'	 		=> $this->input->post('nis'),
					'nisn'			=> $this->input->post('nisn'),
					'nama_siswa' 	=> $this->input->post('nama_siswa'),
					// 'password'	 	=> md5('123'),
					'tempat_lahir'	=> $this->input->post('tempat_lahir'),
					'tgl_lahir' 	=> $this->input->post('tgl_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'agama' 		=> $this->input->post('agama'),
					'id_kelas' 		=> $this->input->post('id_kelas'),
					// 'role_id' 		=> 'Siswa',
					'nama_ayah'		=> $this->input->post('nama_ayah'),
					'pekerjaan'		=> $this->input->post('pekerjaan'),
					'nama_ibu' 		=> $this->input->post('nama_ibu'),
					'no_tlp' 		=> $this->input->post('no_tlp'),
					'alamat' 		=> $this->input->post('alamat'),
					'is_delete' => '0',
			);

			if($this->input->post('remove_photo')) {
				if(file_exists('assets/images/siswa/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
					unlink('assets/images/siswa/'.$this->input->post('remove_photo'));
				$data['photo'] = '';
			}

			if(!empty($_FILES['photo']['name'])) {
				$upload = $this->_do_upload();

				//delete file
				$siswa = $this->Siswa->get_by_id($this->input->post('nis'));
				if(file_exists('assets/images/siswa/'.$siswa->photo) && $siswa->photo)
						unlink('assets/images/siswa/'.$siswa->photo);

				$data['photo'] = $upload;
			}

			$this->Siswa->update(array('nis' => $this->input->post('nis')), $data);
			echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id) {
			$siswa = $this->Siswa->get_by_id($id);
			if(file_exists('assets/images/siswa/'.$siswa->photo) && $siswa->photo)
				unlink('assets/images/siswa/'.$siswa->photo);

			$data = array(
					'is_delete' => '1',
			);

			$this->Siswa->update(array('nis' => $id), $data);
			echo json_encode(array("status" => TRUE));
	}

	private function _do_upload() {
			$config['upload_path']          = 'assets/images/siswa/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 1000; //set max size allowed in Kilobyte
			$config['max_width']            = 1500; // set max width image allowed
			$config['max_height']           = 1500; // set max height allowed
			$config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('photo')) {
					$data['inputerror'][] = 'photo';
					$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
					$data['status'] = FALSE;
					echo json_encode($data);
					exit();
			}

			return $this->upload->data('file_name');
	}

	private function _validate() {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

      if($this->input->post('nis') == '') {
          $data['inputerror'][] = 'nis';
          $data['error_string'][] = 'nis is required';
          $data['status'] = FALSE;
      }

      if($this->input->post('nisn') == '') {
          $data['inputerror'][] = 'nisn';
          $data['error_string'][] = 'nisn is required';
          $data['status'] = FALSE;
      }

			if($this->input->post('nama_siswa') == '') {
				$data['inputerror'][] = 'nama_siswa';
				$data['error_string'][] = 'Nama Siswa of birth is required';
				$data['status'] = FALSE;
			}

			if($this->input->post('tempat_lahir') == '') {
					$data['inputerror'][] = 'tempat_lahir';
					$data['error_string'][] = 'Date of birth is required';
					$data['status'] = FALSE;
			}

			if($this->input->post('tgl_lahir') == '') {
				$data['inputerror'][] = 'tgl_lahir';
				$data['error_string'][] = 'Tanggal Lahir is required';
				$data['status'] = FALSE;
			}


			if($this->input->post('jenis_kelamin') == '') {
				$data['inputerror'][] = 'jenis_kelamin';
				$data['error_string'][] = 'Jenis Kelamin Code is required';
				$data['status'] = FALSE;
			}

			if($this->input->post('agama') == '') {
					$data['inputerror'][] = 'agama';
					$data['error_string'][] = 'agama is required';
					$data['status'] = FALSE;
			}

			if($this->input->post('id_kelas') == '') {
					$data['inputerror'][] = 'id_kelas';
					$data['error_string'][] = 'Id Kelas is required';
					$data['status'] = FALSE;
			}
			if($this->input->post('nama_ayah') == '') {
					$data['inputerror'][] = 'nama_ayah';
					$data['error_string'][] = 'nama ayah is required';
					$data['status'] = FALSE;
			}
			if($this->input->post('pekerjaan') == '') {
					$data['inputerror'][] = 'pekerjaan';
					$data['error_string'][] = 'pekerjaan is required';
					$data['status'] = FALSE;
			}
			if($this->input->post('nama_ibu') == '') {
					$data['inputerror'][] = 'nama_ibu';
					$data['error_string'][] = 'nama ibu is required';
					$data['status'] = FALSE;
			}
			if($this->input->post('no_tlp') == '') {
					$data['inputerror'][] = 'no_tlp';
					$data['error_string'][] = 'No Telphone is required';
					$data['status'] = FALSE;
			}
			if($this->input->post('alamat') == '') {
					$data['inputerror'][] = 'alamat';
					$data['error_string'][] = 'Alamat is required';
					$data['status'] = FALSE;
			}

      if($data['status'] === FALSE) {
          echo json_encode($data);
          exit();
      }
  }

}
/* End of file Halamansiswa.php */
/* Location: ./application/controllers/Halamansiswa.php */