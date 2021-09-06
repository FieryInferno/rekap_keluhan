<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page'; //gbisa
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // ketika validasinya succses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            //jika usernya ada
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'nama' => $user['nama']
                    ];

                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else if ($user['role_id'] == 2) {
                        redirect('user');
                    } else if ($user['role_id'] == 3) {
                        redirect('direktur');
                    } else {
                        redirect('Koordinator/Index');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Email has not activited</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered</div>');
            redirect('auth');
        }
    }
    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
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
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 4, //member
                'is_active' => 0,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
        }
    }

    public function loginpelanggan()
    {
        if ($this->session->userdata('id_pelanggan')) {
            redirect('pelanggan/dashboard');
        }
        $this->form_validation->set_rules('id_pelanggan', 'Id_pelanggan', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Pelanggan';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/loginpelanggan');
            $this->load->view('templates/auth_footer');
        } else {
            // ketika validasinya succses
            $this->_loginpelanggan();
        }
    }

    private function _loginpelanggan()
    {
        $id_pelanggan = $this->input->post('id_pelanggan');
        $password = $this->input->post('password');

        $user = $this->db->get_where('userpelanggan', ['id_pelanggan' => $id_pelanggan])->row_array();

        if ($user) {
            //jika usernya ada
            if ($user['is_active'] == 1) {
                //cek password

                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_pelanggan' => $user['id_pelanggan'],
                        'role_id' => $user['role_id'],
                        'nama' => $user['nama'],
                        'image' => $user['image']

                    ];

                    $this->session->set_userdata($data);
                    redirect('Konsumen/pelanggan');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
                    redirect('auth/loginpelanggan');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Id Pelanggan Tidak aktif</div>');
                redirect('auth/loginpelanggan');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Id Pelanggan Tidak terdaftar</div>');
            redirect('auth/loginpelanggan');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_pelanggan');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout</div>');
        redirect('home');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
