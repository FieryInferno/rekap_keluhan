<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuisioner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konten_model', 'Menu_model', 'Pelanggan_model');
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Kelola Kuisioner';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $keyword = $this->input->post('keyword');
        $data['carikelolakuis'] = $this->Kuis_model->get_keyword($keyword);

        $data['kelolakuis'] = $this->db->get('tb_kuisioner')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelolakuis', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getKuis()
    {
        header('Content-Type: application/json');
        echo $this->Kuis_model->getKuis();
    }
    public function getUserpelanggan()
    {
        header('Content-Type: application/json');
        echo $this->Userpelanggan_model->getUserpelanggan();
    }

    public function hasilkuis()
    {
        $data['title'] = 'Laporan Hasil Kuisioner';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['hasilkuisioner'] = $this->db->query("select *, 
        sum(harapan) as harapan, sum(kinerja) as kinerja
        from tb_hasilkuis 
        join tb_kuisioner on tb_hasilkuis.id_kuis = tb_kuisioner.id_kuis 
        where tb_hasilkuis.status = 'terupdate'
        group by tb_hasilkuis.id_kuis ")->result_array();

        $data['jumlahpelangganisi'] = $this->Kuis_model->getjumlahpelanggan();
        $data['jumlahuserpelanggan'] = count($this->Userpelanggan_model->getAllUserpelanggan());

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menulaporan/laporanhasilkuis', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahpertanyaan()
    {
        $id_kuis = $this->input->post('id_kuis');
        $pertanyaan = $this->input->post('pertanyaan');

        $data = array(
            'id_kuis' => $id_kuis,
            'pertanyaan' => $pertanyaan,

        );

        $this->db->insert('tb_kuisioner', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pertanyaan berhasil di tambahkan</div>');
        redirect('kuisioner');
    }

    public function hapusPertanyaan($id_kuis)
    {
        $this->db->where('id_kuis', $id_kuis);
        $this->db->delete('tb_kuisioner');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">data terhapus</div>');

        redirect('kuisioner');
    }
    public function simpanresetdatalaporan()
    {
        $this->Kuis_model->simpanresetdatalaporan();
        $this->session->set_flashdata('warning', '<div class="alert alert-danger" role="alert">
        Data telah disimpan kehistori dan direset!</div>');
        redirect('kuisioner/hasilkuis');
    }

    public function ubahPertanyaan($id_kuis)
    {
        $data['title'] = 'Ubah Data Pertanyaan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kelolakuis'] = $this->Kuis_model->getkuisById($id_kuis);

        $this->form_validation->set_rules('id_kuis', 'Id_kuis', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubahkuis', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kuis_model->ubahPertanyaan();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Kendala Jaringan berhasil diubah!</div>');
            redirect('kuisioner');
        }
    }

    public function historykuis()
    {
        $data['title'] = 'History Kuisioner';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($this->input->get()) {
            $tahun = $this->input->get('tahun');
            $data['hasilkuisioner'] = $this->db->query("select *, 
        sum(harapan) as harapan, sum(kinerja) as kinerja
        from tb_hasilkuis 
        join tb_kuisioner on tb_hasilkuis.id_kuis = tb_kuisioner.id_kuis 
        and year(tb_hasilkuis.tanggal) = $tahun
        group by tb_hasilkuis.id_kuis ")->result_array();

            $this->db->group_by("id_pelanggan");
            $data['jumlahpelangganisi'] = $this->db->get_where('tb_hasilkuis', [
                'year(tb_hasilkuis.tanggal)' => $tahun
            ])->num_rows();
            $data['jumlahuserpelanggan'] = count($this->Userpelanggan_model->getAllUserpelanggan());
        } else {
            $data['hasilkuisioner'] = $this->db->query("select *, 
        sum(harapan) as harapan, sum(kinerja) as kinerja
        from tb_hasilkuis 
        join tb_kuisioner on tb_hasilkuis.id_kuis = tb_kuisioner.id_kuis 
        where tb_hasilkuis.status = 'terupdate'
        group by tb_hasilkuis.id_kuis ")->result_array();

            $data['jumlahpelangganisi'] = $this->Kuis_model->getjumlahpelanggan();
            $data['jumlahuserpelanggan'] = count($this->Userpelanggan_model->getAllUserpelanggan());
        }

        $this->db->group_by('tanggal');
        $this->db->select('tanggal');
        $data['tahun'] = $this->db->get('tb_hasilkuis')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menulaporan/historykuisioner', $data);
        $this->load->view('templates/footer', $data);
    }

    public function editkeputusan($id_kuis)
    {
        $id = $id_kuis;
        $keputusan = $this->input->post('keputusan');

        $this->form_validation->set_rules('id_kuis', 'Id_kuis', 'required');
        $this->form_validation->set_rules('keputusan', 'Keputusan', 'required');

        $data = array(
            'keputusan' => $keputusan
        );

        $this->db->set('keputusan', $keputusan);
        $this->db->where('id_kuis', $id);

        $this->db->update('tb_kuisioner');
        $this->db->where('id_kuis', $id)->update('tb_kuisioner', [
            'keputusan' => $keputusan
        ]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Keputusan Diubah</div>');
        redirect('kuisioner/hasilkuis');
    }
}
