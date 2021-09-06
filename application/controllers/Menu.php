<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konten_model', 'Menu_model', 'Pelanggan_model');
        is_logged_in();
    }

    public function dashboard()
    {
        $role_id = 'role_id';
        if ($role_id = 5) {
            redirect('Pelanggan/dashboard');
        } else {
            redirect('admin/index');
        }
    }
    public function cariuser()
    {
        $data['title'] = 'Kelola User';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $keyword = $this->input->post('keyword');
        $data['kelolauser'] = $this->User_model->get_keyword($keyword);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/kelolauser', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edituser($id_karyawan)
    {
        $data['title'] = 'Edit User';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kelolauser'] = $this->User_model->getUserById($id_karyawan);

        $this->form_validation->set_rules('id_karyawan', 'Id_karyawan', 'required');
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/datauser/edituser', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $upload_image = $_FILES['image']['name'];

            if (!empty($upload_image)) {
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
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $new_image = isset($new_image) ? $new_image : $data['user']['image'];
            $this->User_model->ubahuser($new_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('menu/kelolauser');
        }
    }

    public function konten()
    {
        $data['title'] = 'Konten';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['konten'] = $this->db->get('tb_konten')->result_array();

        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('image', 'Image', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/konten', $data);
            $this->load->view('templates/footer', $data);
        } else {
            print_r($data);
        }
    }

    public function addKonten()
    {
        $judul = $this->input->post('judul');
        $keterangan = $this->input->post('keterangan');

        $config['upload_path']          = './assets/img/profile';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            $_data = array('upload_data' => $this->upload->data());
            $data = array(
                'judul' => $judul,
                'keterangan' => $keterangan,
                'image' => $_data['upload_data']['file_name']
            );
            echo "TRUE";
            $this->db->insert('tb_konten', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added</div>');
            redirect('menu/konten');
        }
    }
    public function hapus($id)
    {
        $this->Konten_model->hapusKonten($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('menu/konten');
    }
    public function ubah($id)
    {
        $data['title'] = 'Form Ubah Data Konten';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['konten'] = $this->Konten_model->getKontenById($id);

        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/konten/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];

            if (!empty($upload_image)) {
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
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Upload Gambar ' . $this->upload->display_errors() . '!!</div>');
                    redirect('menu/konten');
                }
            }
            $new_image = isset($new_image) ? $new_image : $data['user']['image'];
            $this->Konten_model->ubahkonten($new_image);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Menu berhasil diubah!</div>');
            redirect('menu/konten');
        }
    }

    public function kelolauser()
    {
        $data['title'] = 'Kelola User';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kelolauser'] = $this->db->get('user')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/kelolauser', $data);
        $this->load->view('templates/footer', $data);
    }

    public function adduser()
    {
        $this->form_validation->set_rules('id_karyawan', 'Id_karyawan', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'password dont match!',
                'min_length' => 'password too short'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if (!$this->form_validation->run() == false) {
            $data['title'] = 'Kelola User';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/kelolauser', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id_karyawan = $this->input->post('id_karyawan', true);
            $jabatan = $this->input->post('jabatan', true);

            $data = [
                'id_karyawan' => $id_karyawan,
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' =>  password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'jabatan' => $jabatan,
                'image' => 'default.jpg'
            ];
        }
        $this->db->insert('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added</div>');
        redirect('menu/kelolauser');
    }
    public function hapususer($id)
    {
        $this->User_model->hapususer($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data dihapus!</div>');
        redirect('menu/kelolauser');
    }
    public function pesan()
    {
        $data['title'] = 'Pesan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pesan'] = $this->db->get('tb_kontak')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/pesan', $data);
        $this->load->view('templates/footer', $data);
    }


    public function kelolauserpelanggan()
    {
        $data['title'] = 'Kelola User Pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $keyword = $this->input->post('keyword');
        $data['kelolauserpelanggan'] = $this->Userpelanggan_model->get_keyword($keyword);

        $data['kelolauserpelanggan'] = $this->db->get('userpelanggan')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/kelolauserpelanggan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function adduserpelanggan()
    {
        $this->form_validation->set_rules('id_pelanggan', 'Id_pelanggan', 'required|trim', [
            'required' => 'This id has already registered!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'password dont match!',
                'min_length[3]' => 'password too short'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password]');
        $this->form_validation->set_rules('nometer', 'Nometer', 'required|trim');

        if ($this->form_validation->run() == false) {
            // $this->session->set_flashdata('warning', '<div class="alert alert-danger" role="alert">
            // Data ada yang salah !</div>');

            $data['title'] = 'Kelola User Pelanggan';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();


            $keyword = $this->input->post('keyword');
            $data['kelolauserpelanggan'] = $this->Userpelanggan_model->get_keyword($keyword);

            $data['kelolauserpelanggan'] = $this->db->get('userpelanggan')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/kelolauserpelanggan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id_pelanggan = $this->input->post('id_pelanggan', true);

            $data = [
                'id_pelanggan' => $id_pelanggan,
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'nometer' => htmlspecialchars($this->input->post('nometer', true)),
                'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'image' => 'default.jpg',
                'role_id' => 5,
                'is_active' => 1
            ];

            $this->db->insert('userpelanggan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added</div>');
        }
        redirect('menu/kelolauserpelanggan');
    }
    public function hapususerpelanggan($id)
    {
        $this->Userpelanggan_model->hapususerpelanggan($id);
        $this->session->set_flashdata('warning', '<div class="alert alert-danger" role="alert">
        Data dihapus!</div>');
        redirect('menu/kelolauserpelanggan');
    }

    public function getUser()
    {
        header('Content-Type: application/json');
        echo $this->User_model->getUser();
    }
    public function getUserpelanggan()
    {
        header('Content-Type: application/json');
        echo $this->Userpelanggan_model->getUserpelanggan();
    }
    public function getKonten()
    {
        header('Content-Type: application/json');
        echo $this->Konten_model->getKonten();
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
    public function getPesan()
    {
        header('Content-Type: application/json');
        echo $this->Pesan_model->getPesan();
    }
    public function getPelangganmeter()
    {
        header('Content-Type: application/json');
        echo $this->Pelangganmeter_model->getPelangganmeter();
    }
    public function getPelanggantidakaktif()
    {
        header('Content-Type: application/json');
        echo $this->Pelangganmeter_model->getPelanggantidakaktif();
    }
}
