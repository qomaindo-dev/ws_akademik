<?php
	class NilaiSiswa_db extends CI_Model{

var $table_nilai = 'nilai';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    function Data_Nilaisiswa($id){
  		  $this->db->select('
                          nilai.nis as nis,
                          nilai.uh1,
                          nilai.uh2,
                          nilai.uh3,
                          nilai.uh4,
                          nilai.uts,
                          nilai.uas,
                          nilai.hasil,
                          nilai.grade,
                          mata_pelajaran.mata_pelajaran
                       ');
    		$this->db->from($this->table_nilai);
    		$this->db->where('nilai.nis',$id);
        $this->db->where('nilai.is_delete','0');
        // $this->db->where('kelas.is_delete','0');
        // $this->db->join('kelas', 'kelas.id_kelas = nilai.id_kelas');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = nilai.id_mapel');
        $query = $this->db->get();
    		if ($query->num_rows() >0){
    				foreach ($query->result() as $data) {
      					$profile[] = $data;
    				}
      			return $profile;
  			}
		}

	}
