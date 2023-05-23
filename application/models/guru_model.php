<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class guru_model extends CI_Model {

	var $table = 'guru';
	var $column_order = array('nip','nama','mata_pelajaran','jenis_kelamin','alamat','no_tlp',null); //set column field database for datatable orderable
	var $column_search = array('nip','nama','jenis_kelamin'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('nip' => 'desc'); // default order

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

	private function _get_datatables_query()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('mata_pelajaran', 'mata_pelajaran.id_mapel = guru.id_mapel','left');
        $this->db->where('guru.is_delete', '0');

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
		$this->db->where('guru.is_delete', '0');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		$this->db->where('guru.is_delete', '0');
		return $this->db->count_all_results();
	}

	public function get_by_id($nip)
	{
		$this->db->from($this->table);
		$this->db->select('*');
		$this->db->where('nip',$nip);
		$this->db->where('guru.is_delete', '0');
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

	public function delete_by_id($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->delete($this->table);
	}

	    public function getdetailguru($id) {
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
    }


}

/* End of file guru_model.php */
/* Location: ./application/models/guru_model.php */