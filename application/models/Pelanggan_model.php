<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
     public function getAllPelanggan()
     {
          return $this->db->get('tb_pelanggan')->num_rows();
          return $this->db->get('tb_pelanggan')->result_array();
     }
     public function getPelanggan()
     {
          $this->datatables->select('tb_pelanggan.*, tb_pelanggan.nik, tb_pelanggan.id_pelanggan, tb_pelanggan.nama, tb_meter.no,tb_meter.sektor, tb_meter.nometer');
          $this->datatables->join('tb_meter', 'tb_meter.id_p=tb_pelanggan.idp');
          $this->datatables->from('tb_pelanggan');
          return $this->datatables->generate();

          // $this->datatables->select('*');
          // $this->datatables->from('tb_pelanggan');
          // return $this->datatables->generate();
     }
     public function getPelangganById($id)
     {
          return $this->db->get_where('tb_pelanggan', ['id_pelanggan' => $id])->row_array();
     }
     public function hapusdatapelanggan($id)
     {
          $this->db->where('id_pelanggan', $id);
          $this->db->delete('tb_pelanggan');
     }
     public function ubahpelanggan($image)
     {
          $nik = $this->input->post('nik', true);
          $id_pelanggan = $this->input->post('id_pelanggan', true);
          $nama = $this->input->post('nama', true);
          $status = $this->input->post('status', true);
          $alamat = $this->input->post('alamat', true);
          $kampung = $this->input->post('kampung', true);
          $rt = $this->input->post('rt', true);
          $rw = $this->input->post('rw', true);
          $nohp = $this->input->post('nohp', true);

          $this->db->set('nik', $nik);
          $this->db->set('id_pelanggan', $id_pelanggan);
          $this->db->set('nama', $nama);
          $this->db->set('status', $status);
          $this->db->set('alamat', $alamat);
          $this->db->set('kampung', $kampung);
          $this->db->set('rt', $rt);
          $this->db->set('rw', $rw);
          $this->db->set('nohp', $nohp);
          if (!is_null($image))
               $this->db->set('image', $image);

          $this->db->where('id_pelanggan', $id_pelanggan);
          $this->db->update('tb_pelanggan');
          $this->db->where('id_pelanggan', $id_pelanggan)->update('tb_pelanggan', [
               'nik' => $nik,
               'nama' => $nama,
               'status' => $status,
               'alamat' => $alamat,
               'kampung' => $kampung,
               'rt' => $rt,
               'rw' => $rw,
               'nohp' => $nohp,
               'image' => $image


          ]);
     }

     public function get_keyword($keyword)
     {
          $this->db->select('*');
          $this->db->from('tb_pelanggan');
          $this->db->like('nama', $keyword);
          $this->db->or_like('kampung', $keyword);
          $this->db->or_like('id_pelanggan', $keyword);
          $this->db->or_like('alamat', $keyword);
          $this->db->or_like('id_pelanggan', $keyword);
          $this->db->or_like('nohp', $keyword);

          return $this->db->get()->result_array();
     }
}
