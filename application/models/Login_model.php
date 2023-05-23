<?php
	class Login_model extends CI_Model{

function check_user($data) {
			$this->db->select('siswa.nis as nis, role_petugas.role');
			$this->db->join('role_petugas', 'role_petugas.id = siswa.role_id');
			$this->db->where('siswa.is_delete', '0');
			$query = $this->db->get_where('siswa', $data);
			return $query;
		}




	}
