<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_inpelanggan();
    }
    public function index()
    {
        $data = array(
            'title' => 'Dashboard Pelanggan',
            'userpelanggan' => $this->db->get_where('userpelanggan', ['id_pelanggan' =>
            $this->session->userdata('id_pelanggan')])->row_array(),
            'konten' => $this->Konten_model->getAllKonten(),
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbarpelanggan', $data);
        $this->load->view('pelanggan/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }

    public function kuisionerkeluhan()
    {
        if ($this->input->post()) {
            // print_r($this->input->post());
            // die();
            $kuisioner  = $this->db->get_where('tb_kuisioner', ['status' => 'terupdate'])->result_array();

            foreach ($kuisioner as $key) {
                $this->db->insert('tb_hasilkuis', [
                    'id_pelanggan'  => $this->session->id_pelanggan,
                    'id_kuis'       => $key['id_kuis'],
                    'kinerja'       => $this->input->post('kinerja' . $key['id_kuis']),
                    'harapan'       => $this->input->post('harapan' . $key['id_kuis']),
                ]);
            }
            redirect('Konsumen/Pelanggan/kuisionerkeluhan');
        }
        $data['title'] = 'Kuisioner keluhan';
        $data['user'] = $this->db->get_where('userpelanggan', ['id_pelanggan' =>
        $this->session->userdata('id_pelanggan')])->row_array();

        $data['kuisioner'] = $this->db->get_where('tb_kuisioner', ['status' => 'terupdate'])->result();

        $data['hasil']  = $this->db->get_where('tb_hasilkuis', ['id_pelanggan'  => $this->session->id_pelanggan, 'status' => 'terupdate'])->result_array();
        // print_r($data['hasil']);
        // die();
        if ($data['hasil']) {
            $data['isi_kuisioner']  = 'disabled';
        } else {
            $data['isi_kuisioner']  = '';
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbarpelanggan', $data);
        $this->load->view('pelanggan/kuisionerkeluhan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getKuis()
    {
        header('Content-Type: application/json');
        echo $this->Kuis_model->getKuis();
    }

    public function profil()
    {
        $data['title'] = 'My Profil';
        $data['userpelanggan'] = $this->db->get_where('userpelanggan', ['id_pelanggan' =>
        $this->session->userdata('id_pelanggan')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbarpelanggan', $data);
        $this->load->view('Pelanggan/profil', $data);
        $this->load->view('templates/footer', $data);
    }

    public function editpelanggan() //1
    {
        $data['title'] = 'Edit Profile';
        $data['userpelanggan'] = $this->db->get_where('userpelanggan', ['id_pelanggan' =>
        $this->session->userdata('id_pelanggan')])->row_array();
        $this->form_validation->set_rules('nama', 'Full Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbarpelanggan', $data);
            $this->load->view('Pelanggan/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');


            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image =  $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('userpelanggan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('Konsumen/Pelanggan/profil');
        }
    }
}
