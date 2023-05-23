<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}
		//$this->load->model('guru_model','guru');
		$this->load->model('guru/Profile_db', 'Profile');

			$this->load->model('Admin_db', 'Admin');
	}

	public function index()
	{
		$data['profile_guru'] = $this->Profile->Profile_data_guru($this->session->userdata('nip'));
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul'] = "Detail Petugas";
		$data['mod'] = strtolower(get_class($this));
		$data['content'] = $this->load->view('guru/detailGuru',$data,true);
		$this->load->view('tmp/index', $data);
	}

		public function ajax_edit_guru($id) {
			$data = $this->Profile->get_by_id_guru($id);
			echo json_encode($data);
	}

	public function ajax_update_guru() {
			$this->_validate_guru();

      $data = array(
					'nama' => $this->input->post('nama'),
					'id_mapel' => $this->input->post('id_mapel'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'alamat' => $this->input->post('alamat'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'status' => $this->input->post('status'),
					'no_tlp' => $this->input->post('no_tlp'),
			);

  		if($this->input->post('remove_photo')) {
  			if(file_exists('assets/images/guru/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
  				unlink('assets/images/guru/'.$this->input->post('remove_photo'));
  			$data['photo'] = '';
  		}

  		if(!empty($_FILES['photo']['name'])) {
  			$upload = $this->_do_upload();

  			//delete file
  			$guru = $this->Profile->get_by_id_guru($this->input->post('nip'));
  			if(file_exists('assets/images/guru/'.$guru->photo) && $guru->photo)
  				unlink('assets/images/guru/'.$guru->photo);

  			$data['photo'] = $upload;
  		}

			$this->Profile->update_guru(array('id' => $this->input->post('nip')), $data);
			echo json_encode(array("status" => TRUE));
	}

	private function _do_upload() {
			$config['upload_path']          = 'assets/images/guru/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 500; //set max size allowed in Kilobyte
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

	private function _validate_guru() {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

			if($this->input->post('name') == '') {
					$data['inputerror'][] = 'name';
					$data['error_string'][] = 'Nama belum diisi';
					$data['status'] = FALSE;
			}

			if($this->input->post('gender') == '') {
					$data['inputerror'][] = 'gender';
					$data['error_string'][] = 'Jenis Kelamin belum dipilih';
					$data['status'] = FALSE;
			}

			if($this->input->post('birth_place') == '') {
					$data['inputerror'][] = 'birth_place';
					$data['error_string'][] = 'Tempat Lahir belum diisi';
					$data['status'] = FALSE;
			}

			if($this->input->post('birth_date') == '') {
					$data['inputerror'][] = 'birth_date';
					$data['error_string'][] = 'Tanggal Lahir belum diisi';
					$data['status'] = FALSE;
			}

			if($this->input->post('address') == '') {
					$data['inputerror'][] = 'address';
					$data['error_string'][] = 'Alamat belum diisi';
					$data['status'] = FALSE;
			}

			if($this->input->post('zip_code') == '') {
					$data['inputerror'][] = 'zip_code';
					$data['error_string'][] = 'Kode Pos belum diisi';
					$data['status'] = FALSE;
			}

			if($this->input->post('phone') == '') {
					$data['inputerror'][] = 'phone';
					$data['error_string'][] = 'Phone belum diisi';
					$data['status'] = FALSE;
			}

			if($this->input->post('email') == '') {
					$data['inputerror'][] = 'email';
					$data['error_string'][] = 'E-Mail belum diisi';
					$data['status'] = FALSE;
			}

      if($data['status'] === FALSE) {
          echo json_encode($data);
          exit();
      }
  }

  public function ajax_check_password_guru(){
			$data = array('password' => md5($this->input->post('old_password', TRUE)));
			$result = $this->Profile->check_password_guru($data);
			$data['json'] = $result->num_rows();
			$this->load->view('ajax',$data);
	}

  public function ajax_update_password_guru() {
			$this->_validate_password_guru();

      $data = array(
					'password' => md5($this->input->post('new_password_guru'))
			);

			$this->Profile->update_password_guru(array('id' => $this->session->userdata('user_id')), $data);
			echo json_encode(array("status" => TRUE));
	}

  private function _validate_password_guru() {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

			if($this->input->post('old_password_guru') == '') {
					$data['inputerror'][] = 'old_password_guru';
					$data['error_string'][] = 'Password Lama belum diisi';
					$data['status'] = FALSE;
			}

			if($this->input->post('new_password_guru') == '') {
					$data['inputerror'][] = 'new_password_guru';
					$data['error_string'][] = 'Password Baru belum diisi';
					$data['status'] = FALSE;
			}

			if($this->input->post('confirm_new_password_guru') == '') {
					$data['inputerror'][] = 'confirm_new_password_guru';
					$data['error_string'][] = 'Konfirmasi Password Baru belum diisi';
					$data['status'] = FALSE;
			}

      if($data['status'] === FALSE) {
          echo json_encode($data);
          exit();
      }
  }


}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */