<?php
//mengambil fitur session dengn variabel $ci
function is_logged_in()
{
    $ci = get_instance(); //memanggil instansiasi ci dengan memakai fungsi get_instace(untuk memanggil library ci ) dengan variabel $ci
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id'); //cek role_id = akses menu
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        // if ($userAccess->num_rows() < 1) {
        //     redirect('auth/blocked');
        // }
    }
}

function is_logged_inpelanggan()
{
    $ci = get_instance(); //memanggil instansiasi ci dengan memakai fungsi get_instace(untuk memanggil library ci ) dengan variabel $ci
    if (!$ci->session->userdata('id_pelanggan')) {
        redirect('auth/loginpelanggan');
    } else {
        $role_id = $ci->session->userdata('role_id'); //cek role_id = akses menu
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        // if ($userAccess->num_rows() < 1) {
        //     redirect('auth/blocked');
        // }
    }
}

function check_access($role_id, $menu_id) //mencari data di tbl user_acces_menu yg role_id= menu_id
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
