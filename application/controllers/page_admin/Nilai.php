<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}
		$this->load->model('admin/Nilai_db','Nilai');
		$this->load->model('Admin_db', 'Admin');
	}

	public function index()
	{
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul'] = "Cari Kelas";
		$data['kelasData']= $this->Nilai->dataKelas();
		$data['mapelData']= $this->Nilai->dataMapel();
		$data['mod'] = strtolower(get_class($this));
		// $data['kelasData']= $this->Siswa->dataKelas();
		$data['content'] = $this->load->view('admin/inputnilai',$data,true);
		$this->load->view('tmp/index', $data);
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

	public function datanilai(){
		$data['data_nilai'] = $this->Nilai->data_nilai($this->session->userdata('nis'));
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul'] = "DataNilai";
		//$data['kelasData']= $this->Nilai->dataKelas();
		$data['mod'] = strtolower(get_class($this));
		$data['content'] = $this->load->view('nilai/datanilai',$data,true);
		$this->load->view('tmp/index', $data);
	}

	public function cari(){
		$postData         = $this->input->post('id_kelas');      
	    $data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul']= 'Data Siswa';
		$data['siswaData']= $this->Nilai->dataSiswa($postData);
	    $data['mod'] = strtolower(get_class($this));
	    $data['content'] = $this->load->view('admin/tampilnilaisiswa',$data,true);
	    $this->load->view('tmp/index',$data);

	}

	public function mapel(){
		$tbl	= 'mata_pelajaran';
		$field	= '*';
		$key	= 'mata_pelajaran';
		$args	= $this->input->post('nilai');

	    $data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		// $key = $this->input->post('id_kelas');
		$data['judul']= 'Data Siswa';
	    $data['siswaData']= $this->Nilai->getData($tbl,$field,$key,$args);
	    $data['mod'] = strtolower(get_class($this));
	    // print_r($data);
	    $data['content'] = $this->load->view('nilai/nilai_siswa',$data,true);
	    $this->load->view('tmp/index',$data);
	}
  

  public function cetak_rapor($id) {
      $postData         = $this->input->post('id_kelas');
      $data['judul']= 'Data Siswa';
      $data['siswaData']= $this->Rapot->getSiswa($postData);
      
        $dompdf = new Dompdf();

          $html = $this->load->view('laporan/rapor',$dat,true);

          $dompdf->load_html($html);

          $dompdf->set_paper('A4', 'potrait');

          $dompdf->render();

          $pdf = $dompdf->output();

          $dompdf->stream('laporanku.pdf', array("Attachment" => false));
          
               
      }

}
/* End of file Ruang.php */
/* Location: ./application/controllers/Ruang.php */
