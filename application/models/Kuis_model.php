<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuis_model extends CI_Model
{
    public function getKuis()
    {
        $this->datatables->select('*');
        $this->datatables->from('tb_kuisioner');
        return $this->datatables->generate();
    }
    public function getkuisById($id_kuis)
    {
        return $this->db->get_where('tb_kuisioner', ['id_kuis' => $id_kuis])->row_array();
    }

    public function getjoinkuis()
    {
        $this->db->query("SELECT * FROM tb_hasilkuis JOIN tb_kuisioner USING(id_kuis)");
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_kuisioner');
        $this->db->like('id_kuis', $keyword);
        $this->db->or_like('pertanyaan', $keyword);
        return $this->db->get()->result_array();
    }

    public function getangkahasilkuis()
    {
        $this->db->query('select pertanyaan,(sum(kinerja) / sum(harapan)) * 100 as hasil
        from tb_hasilkuis
        join tb_kuisioner on tb_hasilkuis.id_kuis = tb_kuisioner.id_kuis 
        group by tb_hasilkuis.id_kuis');
    }
    public function hapusdatalaporan()
    {
        $this->db->query('DELETE FROM tb_hasilkuis');
    }

    public function simpanresetdatalaporan()
    {
        $this->db->update('tb_kuisioner', ['status' => 'hapus']);
        $this->db->update('tb_hasilkuis', ['status' => 'hapus']);
    }

    public function ubahPertanyaan()
    {
        $id_kuis = $this->input->post('id_kuis', true);
        $pertanyaan = $this->input->post('pertanyaan', true);
        $status = $this->input->post('status', true);

        $this->db->set('pertanyaan', $pertanyaan);
        $this->db->set('status', $status);
        $this->db->where('id_kuis', $id_kuis);
        $this->db->update('tb_kuisioner');
        $this->db->where('id_kuis', $id_kuis)->update('tb_kuisioner', [
            'pertanyaan' => $pertanyaan,
            'status' => $status,
        ]);
    }
    public function getjumlahpelanggan()
    {
        $this->db->group_by("id_pelanggan");
        return $this->db->get_where('tb_hasilkuis', ['status' => 'terupdate'])->num_rows();
    }
}
