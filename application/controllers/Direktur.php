<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Direktur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data = array(
            'title' => 'Dashboard',
            'user' => $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array(),
            'konten' => $this->db->get('tb_konten')->num_rows(),
            'tidakaktif' => $this->db->get('rekaptidakaktif')->num_rows(),
            'jaringan' => $this->db->get('rekapkendalajaringan')->num_rows(),
            'pelanggan' => $this->db->get('tb_pelanggan')->num_rows(),
            'kelolauser' => $this->db->get('user')->num_rows(),
            'hasilkuisioner' => $this->db->query("select *, 
        sum(harapan) as harapan, sum(kinerja) as kinerja
        from tb_hasilkuis 
        join tb_kuisioner on tb_hasilkuis.id_kuis = tb_kuisioner.id_kuis 
        group by tb_hasilkuis.id_kuis")->result_array()
        );

        $data['jumlahpelangganisi'] = $this->Kuis_model->getjumlahpelanggan();
        $data['jumlahuserpelanggan'] = count($this->Userpelanggan_model->getAllUserpelanggan());

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
