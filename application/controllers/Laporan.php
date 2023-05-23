<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    { 
        parent::__construct();
        require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
        $this->load->model('rapot_model','Rapot');
    }

    public function index() {
        //$data['guru'] = $this->Admin->guru_data($this->session->userdata('nip'));
        $data['nilai'] = $this->db->query("SELECT * FROM nilai ORDER BY nis DESC");
        $data['Datanilai'] = $this->DataNilai->Data_Nilaisiswa($this->session->userdata('nis'));
        $data['mod'] = strtolower(get_class($this));
        $data['content'] = $this->load->view('laporan/rapor',$data,true);
        $this->load->view('tmp/index', $data);
    }

    public function cetak_rapor($id) {
      // $postData         = $this->input->post('id_kelas');
      $data['judul']= 'Data Siswa';
      $data['cetakRaport']= $this->Rapot->getSiswa($id);
      $data['DataSiswa']= $this->Rapot->dataSiswa($id);
      
        $dompdf = new Dompdf();

          $html = $this->load->view('laporan/rapor',$data,true);

          $dompdf->load_html($html);

          $dompdf->set_paper('A4', 'potrait');

          $dompdf->render();

          $pdf = $dompdf->output();

          $dompdf->stream('laporanku.pdf', array("Attachment" => false));
       redirect('Nilai/cari');
               
      }

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
    