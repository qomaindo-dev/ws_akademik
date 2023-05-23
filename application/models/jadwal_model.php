<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal_model extends CI_Model {

	var $table = 'jadwal';
  var $table_jadwal = 'jadwal';
	var $column_order = array('id_mapel','id_kelas','nip','hari','jam',null); //set column field database for datatable orderable
	var $column_search = array('nip','id_kelas','id_mapel'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_jadwal' => 'desc'); // default order

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function dataMapel(){
        $this->db->order_by('mata_pelajaran','ASC');
       	$this->db->where('mata_pelajaran.is_delete', '0');
        $countries= $this->db->get('mata_pelajaran');
        return $countries->result_array();
    }

    public function dataKelas(){
        $this->db->order_by('kelas','ASC');
       	$this->db->where('kelas.is_delete', '0');
        $countries= $this->db->get('kelas');
        return $countries->result_array();
    }

    public function guruData(){
      $this->db->order_by('nama','ASC');
    	$this->db->where('guru.is_delete', '0');
      $countries= $this->db->get('guru');
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
 
 public function joinTiga($field,$tbl1,$tbl2,$tbl3,$tbl4,$id1,$id2,$id3,$id4,$id5,$id6,$key,$args) {
        $this->db->select($field);
        $this->db->from($tbl1);
        $this->db->join($tbl2, $id1.'='.$id2);    
        $this->db->join($tbl3, $id3.'='.$id4);    
        $this->db->join($tbl4, $id5.'='.$id6); 
        $this->db->where($key,$args); 

        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return 0;
        }
    }


   public function data_jadwal($id){
        $this->db->select('
                          jadwal.nip as nip,
                         
                          jadwal.id_mapel,
                          jadwal.id_kelas,
                          jadwal.hari,
                          jadwal.jam,
                          mata_pelajaran.mata_pelajaran,
                          kelas.kelas
                       ');
        $this->db->from($this->table_jadwal);
        $this->db->where('jadwal.nip',$id);
        // $this->db->where('jadwal.is_delete','0');
        // $this->db->where('petugas.is_delete','0');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal.id_kelas');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = jadwal.id_mapel');
        $query = $this->db->get();
        if ($query->num_rows() >0){
            foreach ($query->result() as $data) {
                $profile[] = $data;
            }
            return $profile;
        }
    }

	private function _get_datatables_query()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = jadwal.id_mapel','left');
        $this->db->join('kelas', 'kelas.id_kelas = jadwal.id_kelas');
        $this->db->join('guru', 'guru.nip = jadwal.nip');

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		//$this->db->where('guru.is_delete', '0');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		//$this->db->where('guru.is_delete', '0');
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->select('*');
		$this->db->where('id_jadwal',$id);
		//$this->db->where('guru.is_delete', '0');
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_jadwal', $id);
		$this->db->delete($this->table);
	}

	    /*public function getdetailguru($id) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('nip',$id);
            $this->db->where('guru.is_delete', '0');

        $query = $this->db->get();
        if ($query->num_rows() >0){
          foreach ($query->result() as $data) {
            $siswaData[] = $data;
          }
        return $siswaData;
        }
    }*/


}

/* End of file jadwal_model.php */
/* Location: ./application/models/jadwal_model.php */