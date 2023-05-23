<?php
	class Login_db extends CI_Model{

		function check_user($data) {
			$this->db->select('petugas.id as user_id, guru.nip as nip, role_petugas.role');
			$this->db->join('guru', 'guru.nip = petugas.nip');
			$this->db->join('role_petugas', 'role_petugas.id = petugas.role_id');
			$this->db->where('guru.is_delete', '0');
			$this->db->where('petugas.is_delete', '0');
			$query = $this->db->get_where('petugas', $data);
			return $query;
		}

	// function check($data) {
	// 		$this->db->select('sec_user.id as user_id, mst_employee.id as employee_id, sec_role.role');
	// 		$this->db->join('mst_employee', 'mst_employee.id = sec_user.employee_id');
	// 		$this->db->join('sec_role', 'sec_role.id = sec_user.role_id');
	// 		$this->db->where('mst_employee.is_delete', '0');
	// 		$this->db->where('sec_user.is_delete', '0');
	// 		$query = $this->db->get_where('sec_user', $data);
	// 		return $query;
	// 	}

	}
