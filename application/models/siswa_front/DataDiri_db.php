<?php
	class DataDiri_db extends CI_Model{

var $table_siswa = 'siswa';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    function Profile_data_siswa($id){
  		  $this->db->select('
                          siswa.nis as nis,
                          siswa.nama_siswa,
                          siswa.nisn,
                          siswa.tempat_lahir,
                          siswa.jenis_kelamin,
                          siswa.tgl_lahir,
                          siswa.agama,
                          siswa.tahun_ajaran,
                          siswa.nama_ayah,
                          siswa.pekerjaan,
                          siswa.nama_ibu,
                          siswa.no_tlp,
                          siswa.alamat,
                          siswa.photo,
                          role_petugas.role,
                          kelas.kelas
                       ');
    		$this->db->from($this->table_siswa);
    		$this->db->where('siswa.nis',$id);
       // $this->db->where('siswa.is_delete','0');
        //$this->db->where('kelas.is_delete','0');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $this->db->join('role_petugas', 'role_petugas.id = siswa.role_id');
        $query = $this->db->get();
    		if ($query->num_rows() >0){
    				foreach ($query->result() as $data) {
      					$profile[] = $data;
    				}
      			return $profile;
  			}
		}


  public function update_profile($where, $data) {
        $this->db->update($this->table_siswa, $data, $where);
        return $this->db->affected_rows();
    }


	}
