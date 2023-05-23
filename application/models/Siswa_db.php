<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_db extends CI_Model {

    // mst siswa
    var $table = 'Siswa';
    var $column_order = array('nis','nama_siswa','kelas','no_tlp'); //set column field database for datatable orderable
    var $column_search = array('nis','nama_siswa','kelas','no_tlp'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('nis' => 'desc'); // default order

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

    // public function cari($key){
    //     $this->db->like('id_kelas',$key);
    //     $query = $this->db->get('siswa');
    //     return $query->result();
    // }

    private function _get_datatables_query() {
           /* $this->db->from($this->table);
            $this->db->where('Siswa.is_delete', '0');*/

            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas','left');
            $this->db->where('siswa.is_delete', '0');

            $i = 0;

            foreach ($this->column_search as $item)  {
                if($_POST['search']['value'])  {
                    if($i===0)  {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    } else {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }
                    if(count($this->column_search) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) {
                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } else if(isset($this->order)) {
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
    }

    function get_datatables() {
            $this->_get_datatables_query();
            if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
            return $query->result();
    }

    function count_filtered() {
            $this->_get_datatables_query();
            $this->db->where('Siswa.is_delete', '0');
            $query = $this->db->get();
            return $query->num_rows();
    }

    public function count_all() {
            $this->db->from($this->table);
            $this->db->where('Siswa.is_delete', '0');
            return $this->db->count_all_results();
    }

    public function get_by_id($id) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('nis',$id);
            $this->db->where('Siswa.is_delete', '0');
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data) {
            $this->db->update($this->table, $data, $where);
            return $this->db->affected_rows();
    }

    public function delete_by_id($id){
        $this->db->where('nis', $id);
        $this->db->delete($this->table);
    }

    public function getdetailsiswa($id) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('nis',$id);
            $this->db->where('Siswa.is_delete', '0');

        $query = $this->db->get();
        if ($query->num_rows() >0){
          foreach ($query->result() as $data) {
            $siswaData[] = $data;
          }
        return $siswaData;
        }
    }
}
