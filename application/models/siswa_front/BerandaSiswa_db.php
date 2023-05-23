<?php
	class BerandaSiswa_db extends CI_Model{

var $table_beranda = 'siswa';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
		// function siswa_data($id){
		// $this->db->select('
		// 										siswa.nama_siswa,
		// 										siswa.photo,
		// 										role_petugas.role
		// 								 ');
		// $this->db->from('siswa');
		// $this->db->where('siswa.nis',$id);
		// $this->db->where('siswa.is_delete', '0');
		// $this->db->join('role_petugas', 'role_petugas.id = siswa.role_id');
		// $query = $this->db->get();
		// 	if ($query->num_rows() >0){
		// 		foreach ($query->result() as $data) {
		// 			$siswa[] = $data;
		// 		}
		// 	return $siswa;
		// 	}
		// }

		 public function siswaData($id){
  		  $this->db->select('
                          siswa.nis as nis,
                         
                          siswa.nama_siswa,
                          siswa.photo,
                          role_petugas.role
                       ');
    		$this->db->from($this->table_beranda);
    		$this->db->where('siswa.nis',$id);
        // $this->db->where('siswa.is_delete','0');
        // $this->db->where('petugas.is_delete','0');
        $this->db->join('role_petugas', 'role_petugas.id = siswa.role_id');
        // $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = siswa.id_mapel');
        $query = $this->db->get();
    		if ($query->num_rows() >0){
    				foreach ($query->result() as $data) {
      					$profile[] = $data;
    				}
      			return $profile;
  			}
		}

	}
