<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konten_model', 'Jaringan_model', 'Pelanggan_model');
        is_logged_in();
    }
    public function kendalajaringan()
    {
        $data['title'] = 'Kendala Jaringan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jaringan'] = $this->db->get('rekapkendalajaringan')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/kendalajaringan', $data);
        $this->load->view('templates/footer', $data);
    }
    public function addKendalajaringan()
    {
        $this->form_validation->set_rules('id_pelanggan', 'Id_pelanggan', 'required|trim');

        if ($this->form_validation->run() == 0) {
            $data['title'] = 'Kendala Jaringan';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['jaringan'] = $this->db->get('rekapkendalajaringan')->result_array();

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data gagal di input, ada data yang salah atau kosong!</div>');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/kendalajaringan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $tgl = $this->input->post('tgl');
            $id_pelanggan = $this->input->post('id_pelanggan');
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $nometer = $this->input->post('nometer');
            $sektor = $this->input->post('sektor');
            $masalah = $this->input->post('masalah');
            $keterangan = $this->input->post('keterangan');
            $solusi = $this->input->post('solusi');
            $tanggalkunjungan = $this->input->post('tanggalkunjungan');
            $tanggalterakhir = $this->input->post('tanggalterakhir');
            $status = $this->input->post('status');
            $teknisi = $this->input->post('teknisi');

            $data = array(
                'tgl' => $tgl,
                'id_pelanggan' => $id_pelanggan,
                'nik' => $nik,
                'nama' => $nama,
                'nometer' => $nometer,
                'sektor' => $sektor,
                'masalah' => $masalah,
                'keterangan' => $keterangan,
                'solusi' => $solusi,
                'tanggalkunjungan' => $tanggalkunjungan,
                'tanggalterakhir' => $tanggalterakhir,
                'status' => $status,
                'teknisi' => $teknisi
            );

            $this->db->insert('rekapkendalajaringan', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">New Kendala added</div>');
        }
        redirect('kendala/kendalajaringan');
    }
    public function ubahjaringan($id)
    {
        $data['title'] = 'Ubah Data Kendala Jaringan ';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['jaringan'] = $this->Jaringan_model->getkendalajaringanById($id);

        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('id_pelanggan', 'Id_pelanggan', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nometer', 'Nometer', 'required');
        $this->form_validation->set_rules('sektor', 'sektor', 'required');
        $this->form_validation->set_rules('masalah', 'masalah', 'required');
        $this->form_validation->set_rules('solusi', 'solusi', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('tanggalterakhir', 'tanggalterakhir', 'required');
        $this->form_validation->set_rules('teknisi', 'teknisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/jaringan/ubah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Jaringan_model->ubahjaringan();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Kendala Jaringan berhasil diubah!</div>');
            redirect('kendala/kendalajaringan');
        }
    }

    public function hapuskendalajaringan($id)
    {
        $this->Jaringan_model->hapusjaringan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data dihapus!</div>');
        redirect('kendala/kendalajaringan');
    }
    public function kendalatidakaktif()
    {
        $data['title'] = 'Kendala Tidak Aktif';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tidakaktif'] = $this->db->get('rekaptidakaktif')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/kendalatidakaktif', $data);
        $this->load->view('templates/footer', $data);
    }
    public function addKendalatidakaktif()
    {
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $kampung = $this->input->post('kampung');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $sektor = $this->input->post('sektor');
        $nometer = $this->input->post('nometer');
        $status = $this->input->post('status');
        $tglkunjungan = $this->input->post('tglkunjungan');
        $tgleksekusi = $this->input->post('tgleksekusi');
        $kendala = $this->input->post('kendala');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'nik' => $nik,
            'nama' => $nama,
            'kampung' => $kampung,
            'rt' => $rt,
            'rw' => $rw,
            'sektor' => $sektor,
            'nometer' => $nometer,
            'status' => $status,
            'tglkunjungan' => $tglkunjungan,
            'tgleksekusi' => $tgleksekusi,
            'kendala' => $kendala,
            'keterangan' => $keterangan
        );
        $this->db->insert('rekaptidakaktif', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">data berhasil ditambahkan</div>');
        redirect('kendala/kendalatidakaktif');
    }
    public function ubahtidakaktif($id)
    {
        $data['title'] = 'Ubah Data Kendala Tidak Aktif';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tidakaktif'] = $this->Tidakaktif_model->getTidakaktifById($id);

        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kampung', 'Kampung', 'required');
        $this->form_validation->set_rules('rt', 'Rt', 'required');
        $this->form_validation->set_rules('rw', 'Rw', 'required');
        $this->form_validation->set_rules('sektor', 'Sektor', 'required');
        $this->form_validation->set_rules('nometer', 'Nometer', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('tglkunjungan', 'Tglkunjungan', 'required');
        $this->form_validation->set_rules('tgleksekusi', 'Tgleksekusi', 'required');
        $this->form_validation->set_rules('kendala', 'Kendala', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/tidakaktif/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Tidakaktif_model->ubahtidakaktif();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Pelanggan berhasil diubah!</div>');
            redirect('kendala/kendalatidakaktif');
        }
    }

    public function hapustidakaktif($id)
    {
        $this->Tidakaktif_model->hapustidakaktif($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data dihapus!</div>');
        redirect('kendala/kendalatidakaktif');
    }
    public function getTidakaktif()
    {
        header('Content-Type: application/json');
        echo $this->Tidakaktif_model->getTidakaktif();
    }
    public function getJaringan()
    {
        header('Content-Type: application/json');
        echo $this->Jaringan_model->getJaringan();
    }

    public function trackkendala()
    {
        $data['title'] = 'Tracking Kendala';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jaringan'] = $this->db->get('rekapkendalajaringan')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/trackingkendala', $data);
        $this->load->view('templates/footer', $data);
    }
}
