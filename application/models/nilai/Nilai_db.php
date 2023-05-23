<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_db extends CI_Model {

    var $table = 'nilai';
    var $column_order = array('nis','id_mapel','uh','uts','uas'); //set column field database for datatable orderable
    var $column_search = array('nis','id_mapel','uh','uts','uas'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id' => 'desc'); // default order

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


    public function cari($key){
        $this->db->like('id_kelas',$key);
        $query = $this->db->get('siswa');
        return $query->result();
    }
     

     public function findJadwal($key)//,$orderby)
    {   
        //$this->db->order_by($field, $orderby);
        $this->db->select('
                    jadwal.nip as nip,
                    jadwal.id_mapel,
                    mata_pelajaran.mata_pelajaran
            ');
        $this->db->from('jadwal');
        $this->db->where('jadwal.nip',$key);
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = jadwal.id_mapel');
        $this->db->limit(1);

        $query = $this->db->get();  
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return 0;
        }
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



    public function getDAll()
    {   
        $this->db->order_by('nis', 'asc');
        $this->db->select('*');
        $this->db->from('siswa');

        $query = $this->db->get();  
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return 0;
        }
    }

    private function _get_datatables_query() {
    		$this->db->from($this->table);
    		$this->db->where('nilai.is_delete', '0');

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
    		$this->db->where('nilai.is_delete', '0');
    		$query = $this->db->get();
    		return $query->num_rows();
  	}

    public function count_all() {
    		$this->db->from($this->table);
    		$this->db->where('nilai.is_delete', '0');
    		return $this->db->count_all_results();
  	}

    public function get_by_id($id) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id',$id);
    	$this->db->where('nilai.is_delete', '0');
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
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function getdetailtransaction($id) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id',$id);
    		$this->db->where('nilai.is_delete', '0');

        $query = $this->db->get();
        if ($query->num_rows() >0){
          foreach ($query->result() as $data) {
            $EmployeeData[] = $data;
          }
        return $EmployeeData;
        }
    }

    public function INVcode()   {
        $tgl = date("Ymd");
          $this->db->select('RIGHT(nilai.id,4) as kode', FALSE);
          $this->db->order_by('id','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('nilai');      //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
           //jika kode ternyata sudah ada.      
           $data = $query->row();      
           $kode = intval($data->kode) + 1;    
          }
          else {      
           //jika kode belum ada      
           $kode = 1;    
          }
          $kodemax = str_pad($kode, 4, "000", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
          $kodejadi = "INV".$tgl.$kodemax;    // hasilnya ODJ-9921-0001 dst.
          return $kodejadi;  
    }
}
