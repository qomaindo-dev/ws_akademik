<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends CI_Controller {

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
		// $field  = '*';
		// $tbl1	= 'jadwal';
		// $tbl2	= 'guru';
		// $tbl3	= 'mata_pelajaran';
		// $tbl4	= 'kelas';
		// $id1	= ''
		// $id2
		// $id3
		// $id4
		// $id5
		// $id6
		// $key
		// $args
		 $kodeGuru = trim($this->session->userdata('nip'), "U");
         $data['jadwal'] = $this->jadwal->getJoinEX(['jadwal', 'guru', 'mata_pelajaran','kelas'], ['mata_pelajaran', 'kelas', 'jam'] , ['nip', 'mapel_id'], ['jadwal.nip' => $kodeGuru])->result();


		 $data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
		 $data['judul'] = "Jadwal";
		 $data['mod'] = strtolower(get_class($this));
         // $data['jadwal'] = $this->Jadwal->joinTiga($field,$tbl1,$tbl2,$tbl3,$tbl4,$id1,$id2,$id3,$id4,$id5,$id6,$key,$args);
         $data['content'] = $this->load->view('guru/jadwal',$data,true);
         $this->load->view('tmp/index', $data);
	}

}

/* End of file Jadwal.php */
/* Location: ./application/controllers/Jadwal.php */