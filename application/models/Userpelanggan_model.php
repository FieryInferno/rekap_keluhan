<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userpelanggan_model extends CI_Model
{
    public function getAllUserpelanggan()
    {
        return $this->db->get('userpelanggan')->result_array();
    }
    public function getUserpelangganByid($id_pelanggan)
    {
        return $this->db->get_where('userpelanggan', ['id_pelanggan' => $id_pelanggan])->row_array();
    }
    public function getUserpelanggan()
    {
        $this->datatables->select('*');
        $this->datatables->from('userpelanggan');
        return $this->datatables->generate();
    }
    public function hapususerpelanggan($id_pelanggan)
    {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->delete('userpelanggan');
    }
    public function ubahuserpelanggan($image)
    {
        $id_pelanggan = $this->input->post('id_pelanggan', true);
        $nama = $this->input->post('nama', true);
        $email = $this->input->post('email', true);
        $nometer = $this->input->post('nometer', true);


        $this->db->set('nama', $nama);
        $this->db->set('email', $email);
        $this->db->set('nometer', $nometer);
        if (!is_null($image))
            $this->db->set('image', $image);

        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('userpelanggan');
        $this->db->where('id_pelanggan', $id_pelanggan)->update('userpelanggan', [
            'nama' => $nama,
            'email' => $email,
            'nometer' => $nometer,
            'image' => $image
        ]);
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('userpelanggan');
        $this->db->like('nama', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('nometer', $keyword);
        return $this->db->get()->result_array();
    }
}
