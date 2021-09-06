<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelangganmeter_model extends CI_Model
{
    public function getPelangganmeter()
    {
        $this->datatables->select('tb_pelanggan.idp, tb_pelanggan.nik, tb_pelanggan.id_pelanggan, tb_pelanggan.nama, tb_meter.no,tb_meter.sektor, tb_meter.nometer');
        $this->datatables->from('tb_pelanggan');
        $this->datatables->join('tb_meter', 'tb_meter.id_p=tb_pelanggan.idp');
        $this->datatables->where('tb_pelanggan.id_pelanggan > ', 0);
        return $this->datatables->generate();
    }
    public function getPelanggantidakaktif()
    {
        $this->datatables->select('tb_pelanggan.idp, tb_pelanggan.nik, tb_pelanggan.id_pelanggan, tb_pelanggan.nama, tb_pelanggan.kampung, tb_pelanggan.rt, tb_pelanggan.rw, tb_meter.sektor, tb_meter.nometer');
        $this->datatables->join('tb_meter', 'tb_meter.idp=tb_pelanggan.idp');
        //$this->datatables->where('id_pelanggan', null);
        $this->datatables->from('tb_pelanggan');
        return $this->datatables->generate();
    }
}
