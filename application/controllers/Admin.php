<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
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


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer', $data);
    }
    public function roleAccess($role_id) //roleid dan tampil semua menu
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }
    public function changeAccess() //
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Change</div>');
    }
}
