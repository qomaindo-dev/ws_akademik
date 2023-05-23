<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}
		$this->load->model('nilai/Nilai_db','Nilai');
		$this->load->model('Admin_db', 'Admin');
		$this->load->model('jadwal_model','Jadwal');
	}

	public function index()
	{
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['jadwalNya'] = $this->Nilai->findJadwal($this->session->userdata('nip'));	//untuk menampilkan id mapel
		$data['judul'] = "Data Siswa";
		$data['kelasData']= $this->Nilai->dataKelas();
		$data['mod'] = strtolower(get_class($this));
		// $data['kelasData']= $this->Siswa->dataKelas();
		$data['content'] = $this->load->view('nilai/inputnilai',$data,true);
		$this->load->view('tmp/index', $data);
	}

	public function loginsiswa(){
	    $data['mod'] = strtolower(get_class($this));
	    $data['content'] = $this->load->view('login_siswa/login_siswa',$data,true);
	    $this->load->view('tmp/login_siswa',$data);

	}

	public function addNilai(){
		$data['nisnya'] = $this->Nilai->getDAll();
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul'] = "Add Nilai";
		$data['mod'] = strtolower(get_class($this));
		// $data['kelasData']= $this->Siswa->dataKelas();
		$data['content'] = $this->load->view('nilai/addNilai',$data,true);
		$this->load->view('tmp/index', $data);		
	}

	public function getNama(){

		$tbl 	= "siswa";
		$field 	= "*";
		$key	= "nis";
		$args	= $this->input->post('recid');
		$dat 	= $this->Nilai->getData($tbl,$field,$key,$args);

		foreach ($dat as $dt) {
			$arr = array(
				'nama_siswa' => $dt->nama_siswa
				 );
		}
		echo json_encode($arr);
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

	public function datasiswa(){
		$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
	    $data['datasiswa'] = $this->input->post('kelas');
	    $data['judul']= 'Data Kelas';
	    $data['kelasData']= $this->Siswa->dataKelas();
	    $data['mod'] = strtolower(get_class($this));
	    $data['content'] = $this->load->view('nilai/datasiswa',$data,true);
	    $this->load->view('tmp/index',$data);

	}

	public function cari(){
		$tbl	= 'siswa';
		$field	= '*';
		$key	= 'id_kelas';
		$args	= $this->input->post('kelas');

		$data['id_mapel'] 	= $this->input->post('id_mapel');
		$data['semester'] 	= $this->input->post('semester');

	    $data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		$data['judul']= 'Input Nilai Siswa';
	    $data['siswaData']= $this->Nilai->getData($tbl,$field,$key,$args);
	    $data['mod'] = strtolower(get_class($this));
	    // print_r($data);
	    $data['content'] = $this->load->view('nilai/nilai_siswa',$data,true);
	    $this->load->view('tmp/index',$data);
	}

	public function saveNilai(){

		$nis       = $this->input->post('nis');
        $id_mapel   = $this->input->post('id_mapel');
        $semester	=  $this->input->post('semester');
        $uts   		= $this->input->post('uts');
        $uas   		= $this->input->post('uas');
        $uh1		= $this->input->post('uh1');
        $uh2		= $this->input->post('uh2');
        $uh3		= $this->input->post('uh3');
        $uh4		= $this->input->post('uh4');
        // $id_mapel   = $this->input->post('hasil');
        // $id_mapel   = $this->input->post('id_mapel');

    	for ($i = 0; $i < count($this->input->post('nis')); $i++) {
        
        $uh[$i] = ($uh1[$i]+$uh2[$i]+$uh3[$i]+$uh4[$i])/4;

        $hasil[$i] = ($uh[$i]+$uts[$i]+$uas[$i])/3;

        if(($hasil[$i] >= 90) && ($hasil[$i] <= 100))
        {
          $grade[$i] = 'A';
        }
        elseif(($hasil[$i] >= 80 ) && ($hasil[$i] <= 89))
        {
          $grade[$i] = 'B';
        }
        elseif(($hasil[$i] >= 70 ) && ($hasil[$i] <= 79))
        {
          $grade[$i] = 'C';
        }
        elseif(($hasil[$i] >= 60 ) && ($hasil[$i] <= 69))
        {
          $grade[$i] = 'D';
        }
        else
        {
          $grade[$i] = 'E';
        }

          $data = array(
          	'id_mapel'	=> $id_mapel,
          	'semester'	=> $semester,
          	'nis'		=> $nis[$i],
          	'uh1'		=> $uh1[$i],
          	'uh2'		=> $uh2[$i],
          	'uh3'		=> $uh3[$i],
          	'uh4'		=> $uh4[$i],
          	'uts'		=> $uts[$i],
          	'uas'		=> $uas[$i],
          	'hasil'		=> $hasil[$i],
          	'grade'		=> $grade[$i]
          );
          	$insert = $this->Nilai->save($data);
        }
        redirect('nilai/Nilai');
    }
  
}
/* End of file Ruang.php */
/* Location: ./application/controllers/Ruang.php */
