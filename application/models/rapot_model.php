<?php
	class rapot_model extends CI_Model{

var $table_nilai = 'nilai';
var $tbl_siswa = 'siswa';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    function Data_Nilaisiswa($id){
  		  $this->db->select('
                          nilai.nis as nis,
                          nilai.uh,
                          nilai.uts,
                          nilai.uas,
                          mata_pelajaran.mata_pelajaran
                          siswa.nama
                          siswa.kelas
                          siswa.tahun_ajaran
                          nilai,semester
                       ');
    		$this->db->from($this->table_nilai);
    		$this->db->where('nilai.nis',$id);
        $this->db->where('nilai.is_delete','0');
        // $this->db->where('kelas.is_delete','0');
        // $this->db->join('kelas', 'kelas.id_kelas = nilai.id_kelas');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = nilai.id_mapel');
        $this->db->join('siswa', 'siswa.nis = nilai.nis');
        $query = $this->db->get();
    		if ($query->num_rows() >0){
    				foreach ($query->result() as $data) {
      					$profile[] = $data;
    				}
      			return $profile;
  			}
		}



  function getSiswa($id){
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('nilai', 'nilai.nis = siswa.nis','inner');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas','inner');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = nilai.id_mapel','inner');
        $this->db->where('siswa.nis',$id);
        $this->db->order_by('mata_pelajaran','ASC');
        
        $query = $this->db->get();
            if($query->num_rows() >0){
                foreach ($query->result() as $data) {
                    $siswa[] = $data;
                }
            return $siswa;
            } 
    }


public function dataSiswa($id)
  {
    $this->db->select('*');
    $this->db->from('siswa');
    $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas','inner');
    $this->db->join('nilai', 'nilai.nis = siswa.nis','inner');
     // $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas','inner');
    $this->db->where('siswa.nis',$id);
     $this->db->limit(1);
        $query = $this->db->get();  
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return 0;
        }
  }

	}