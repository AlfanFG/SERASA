<?php
class M_Transaksi extends CI_Model
{
    public function getDataTransaksi()
    {
        return $this->db->get('tbl_pesanan')->result_array();
    }
}
