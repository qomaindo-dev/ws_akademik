<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DataDiriSiswa extends CI_Controller {
public function __construct()
	{
		parent::__construct();
			    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}
		$this->load->model('siswa_front/DataDiri_db','DataDiri');
		$this->load->model('BerandaSiswa_db', 'Siswa');
	}

	public function index()
	{
		$data['Datasiswa'] = $this->Siswa->siswaData($this->session->userdata('nis'));
		$data['Siswa'] = $this->DataDiri->Profile_data_siswa($this->session->userdata('nis'));
		$data['judul'] = "Data Siswa";
		$data['mod'] = strtolower(get_class($this));
		$data['content'] = $this->load->view('front/DataSiswa',$data,true);
		$this->load->view('tmp/index_siswa', $data);

	}

public function update_diri(){
			$update = array(	
						// 'class_id'    => $this->input->post('kelas'),
						// 'nis'         => $this->input->post('nis'),
						'nisn'        => $this->input->post('nisn'),
						'nama_siswa'        => $this->input->post('nama'),
						'tempat_lahir'      => $this->input->post('tlahir'),
						'tgl_lahir' => $this->input->post('tgl'),
						'jenis_kelamin' => $this->input->post('jkel'),
						'agama'  => $this->input->post('agama'),
						'no_tlp'       => $this->input->post('notelp'),
						'agama'  => $this->input->post('agama'),
						'tahun_ajaran'  => $this->input->post('tahun_ajaran'),
						// 'address'     => $this->input->post('alamat'),
						'alamat'    => $this->input->post('alamat')
				);

			$this->DataDiri->update_profile(array('nis' => $this->input->post('nis')), $update);
			redirect('page_siswa/DataDiriSiswa');
	}

}
/* End of file Halamansiswa.php */
/* Location: ./application/controllers/Halamansiswa.php */