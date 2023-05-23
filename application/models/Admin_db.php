<?php
	class Admin_db extends CI_Model{

		function guru_data($id){
		$this->db->select('
												guru.nama,
												guru.photo,
												role_petugas.role
										 ');
		$this->db->from('guru');
		$this->db->where('guru.nip',$id);
		$this->db->where('guru.is_delete', '0');
		$this->db->join('petugas', 'petugas.nip = guru.nip');
		$this->db->join('role_petugas', 'role_petugas.id = petugas.role_id');
		$query = $this->db->get();
			if ($query->num_rows() >0){
				foreach ($query->result() as $data) {
					$guru[] = $data;
				}
			return $guru;
			}
		}

	}
