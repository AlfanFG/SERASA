<?php
class M_Transaksi extends CI_Model
{
    public function getDataTransaksi()
    {
        return $this->db->get('tbl_pesanan')->result_array();
    }
    public function getFilter($tglawal, $tglakhir)
    {
        if (isset($tglawal) && $tglawal != '') {
            $this->db->where('tgl_pesan >=', $tglawal);
        }
        if (isset($tglakhir) && $tglakhir != '') {
            $this->db->where('tgl_pesan <=', $tglakhir);
        }
        return $this->db->get('tbl_pesanan')->result_array();
    }
}
