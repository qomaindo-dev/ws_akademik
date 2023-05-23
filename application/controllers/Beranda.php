<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		    if ($this->session->userdata('logged_in')==0) {
			redirect(base_url());
		}
		$this->load->model('jadwal_model','Jadwal');
		
		$this->load->model('Admin_db', 'Admin');
	}

	public function index()
	{

		// $field	= '*';
		// $tbl1	= 'jadwal';
		// $tbl2	= 'guru';
		// $tbl3	= 'mata_pelajaran';
		// $tbl4	= 'kelas';
		// $id1	= 'jadwal.nip';
		// $id2	= 'guru.nip';
		// $id3	= 'jadwal.mapel_id';
		// $id4	= 'mata_pelajaran.id';
		// $id5	= 'jadwal.id_kelas';
		// $id6	= 'kelas.id_kelas';
		// // $key	= 'jadwal.id_jadwal';
		// $key	= $kodeGuru;
		// // $args	= $kodeGuru;
		// $args	= 'asc';

		 
         // $data['jadwal'] = $this->jadwal->getJoinEX(['jadwal', 'guru', 'mata_pelajaran','kelas'], ['id_jadwal','id', 'id_kelas', 'jam'] , ['nip', 'mapel_id'], ['jadwal.nip' => $kodeGuru])->result();


		 $data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		 $data['judul'] = "Jadwal";
		 $data['mod'] = strtolower(get_class($this));
         $data['jadwalNya'] = $this->Jadwal->data_jadwal($this->session->userdata('nip'));
         $data['content'] = $this->load->view('guru/jadwalguru',$data,true);
         $this->load->view('tmp/index', $data);
	}

}

/* End of file Jadwal.php */
/* Location: ./application/controllers/Jadwal.php */