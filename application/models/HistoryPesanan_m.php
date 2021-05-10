<?php

class HistoryPesanan_m extends CI_Model
{
    public function getAllHistoryPesanan()
    {
        return $this->db->get('tbl_transaksi')->result_array();
    }

    public function id_transaksi()
    {
        $query = $this->db->query(
            "SELECT IFNULL(MAX(SUBSTRING(id_transaksi,5)),0)+1 AS no_urut FROM tbl_transaksi"
        );
        $data = $query->row_array();
        $no_urut = sprintf("%'.04d", $data['no_urut']);

        $id = 'K' . $no_urut;


        return $id;
    }
}
