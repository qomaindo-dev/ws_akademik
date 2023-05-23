<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rowcount_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function Jumlahsiswa()
	{   
	    $query = $this->db->get('siswa');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function Jumlahmapel()
	{   
	    $query = $this->db->get('mata_pelajaran');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function Jumlahguru()
	{   
	    $query = $this->db->get('guru');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function Jumlahkelas()
	{   
	    $query = $this->db->get('kelas');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}
}

/* End of file rowcount_model.php */
/* Location: ./application/models/rowcount_model.php */