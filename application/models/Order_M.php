<?php

class Order_M extends CI_Model
{
    public function getAllOrder()
    {
        $this->db->select('id_pesanan,namaPegawai,tgl_pesan,nama_Customer');
        $this->db->from('tbl_pesanan');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_pesanan.id_pegawai');
        return $query = $this->db->get()->result_array();


        // return $this->db->get('tbl_pesanan')->result_array();
    }

    public function getOrderDetails($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_detailpesanan');
        $this->db->join('tbl_pesanan', 'tbl_pesanan.id_pesanan = tbl_detailpesanan.id_pesanan');
        $this->db->join('tbl_menu', 'tbl_menu.id_menu = tbl_detailpesanan.id_menu');
        $this->db->where('tbl_detailpesanan.id_pesanan', $id);
        return $query = $this->db->get()->result_array();
    }

    public function getCustomerName($id)
    {
        $query = $this->db->select('nama_Customer as Nama')->from('tbl_pesanan')->where('id_pesanan', $id)->get();
        return $query->row()->Nama;
        // $this->db->select('nama_Customer');
        // $this->db->from('tbl_pesanan');
        // $this->db->where('id_pesanan', $id);
        // $query = $this->db->get();

    }

    public function cetakStruk($id)
    {
    }
}
