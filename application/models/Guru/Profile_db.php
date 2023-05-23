<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_db extends CI_Model {

    // Maint Profile guru
    var $table_guru = 'guru';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_by_id_guru($id) {
        $this->db->select('*');
        $this->db->from($this->table_guru);
        $this->db->where('nip',$id);
        $this->db->where('is_delete','0');
        $query = $this->db->get();

        return $query->row();
    }

  	public function update_employee($where, $data) {
    		$this->db->update($this->table_guru, $data, $where);
    		return $this->db->affected_rows();
  	}

    public function check_password_guru($data) {
  			$query = $this->db->get_where('petugas', $data);
  			return $query;
		}

  	public function update_password_guru($where, $data) {
    		$this->db->update('petugas', $data, $where);
    		return $this->db->affected_rows();
  	}

    function Profile_data_guru($id){
  		  $this->db->select('
                          guru.nip as nip,
                          guru.nama,
                          guru.id_mapel,
                          guru.jenis_kelamin,
                          guru.alamat,
                          guru.tempat_lahir,
                          guru.tgl_lahir,
                          guru.status,
                          guru.no_tlp,
                          guru.photo,
                          role_petugas.role,
                          petugas.username
                       ');
    		$this->db->from($this->table_guru);
    		$this->db->where('guru.nip',$id);
        $this->db->where('guru.is_delete','0');
        $this->db->where('petugas.is_delete','0');
        $this->db->join('petugas', 'petugas.nip = guru.nip');
        $this->db->join('role_petugas', 'role_petugas.id = petugas.role_id');
        $query = $this->db->get();
    		if ($query->num_rows() >0){
    				foreach ($query->result() as $data) {
      					$profile[] = $data;
    				}
      			return $profile;
  			}
		}
}
