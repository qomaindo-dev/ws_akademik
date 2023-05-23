<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_db extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function dataKelas(){
        $this->db->order_by('kelas','ASC');
        $this->db->where('kelas.is_delete', '0');
        $countries= $this->db->get('kelas');
        return $countries->result_array();
    }

      public function dataSiswa($postData){
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where(array('siswa.id_kelas'=>$postData));
       
        $query = $this->db->get();
            if($query->num_rows() >0){
                foreach ($query->result() as $data) {
                    $siswa[] = $data;
                }
            return $siswa;
            } 
    }

    public function dataMapel(){
        $this->db->order_by('mata_pelajaran','ASC');
        $this->db->where('mata_pelajaran.is_delete', '0');
        $countries= $this->db->get('mata_pelajaran');
        return $countries->result_array();
    }

    public function cari($key){
        $this->db->like('id_kelas',$key);
        //$this->db->like('id_mapel',$key);
        $query = $this->db->get('siswa');
        //$query = $this->db->get('guru');
        return $query->result();
    }
    
public function getData($tbl,$field,$key,$args)
    {   
        $this->db->select($field);
        $this->db->from($tbl);
        $this->db->where($key,$args);
        $query = $this->db->get();  

        if($query->num_rows()>0){
            return $query->result();
        }else{
            return 0;
        }
    }

    function getSiswa($postData){
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('nilai', 'nilai.nis = siswa.nis','inner');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas','inner');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = nilai.id_mapel','inner');
        $this->db->where(array('siswa.id_kelas'=>$postData));
       
        $query = $this->db->get();
            if($query->num_rows() >0){
                foreach ($query->result() as $data) {
                    $siswa[] = $data;
                }
            return $siswa;
            } 
    }

}
