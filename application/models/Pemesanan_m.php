<?php
class Pemesanan_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function getDataMenu()
    {
        $query = $this->db->get('tbl_menu');
        return $query->result_array();
    }

    public function getDataKategori()
    {
        $query = $this->db->get('tbl_kategoriMenu');
        return $query->result_array();
    }

    function getDataMenuById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_menu');
        $this->db->where('id_kategoriMenu', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getIdPesanan()
    {
        // $tahun_sekarang = date('Y');

        $query = $this->db->query(
            "SELECT IFNULL(MAX(SUBSTRING(id_pesanan,4)),0)+1 AS no_urut FROM tbl_pesanan"
        );
        $data = $query->row_array();
        $no_urut = sprintf("%'.04d", $data['no_urut']);

        $id = 'P' . $no_urut;

        return $id;
    }


    function insertPegawai($data)
    {
        $this->db->insert('tbl_pegawai', $data);
    }

    function updatePegawai($data, $id)
    {
        $this->db->where('id_pegawai', $id);
        $this->db->update('tbl_pegawai', $data);
        return TRUE;
    }

    function deletePegawai($id)
    {
        $this->db->query("DELETE FROM tbl_pegawai WHERE id_pegawai = '" . $id . "'");
    }

    function getById($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_pegawai WHERE id_pegawai = '" . $id . "'");
        return $query->row_array();
    }

    function insertDataPemesanan($batch)
    {
        $this->db->insert('tbl_detailpesanan', $batch);
    }

    public function getAllOrder()
    {
        $this->db->select('id_pesanan,namaPegawai,tgl_pesan,nama_Customer,bayar,total');
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

    public function getID($id)
    {
        $query = $this->db->select('id_pesanan as Id')->from('tbl_pesanan')->where('id_pesanan', $id)->get();
        return $query->row()->Id;
    }

    public function deleteOrder($id)
    {
        $this->db->delete('tbl_pesanan', array('id_pesanan' => $id));
    }
    public function deleteDetail($id)
    {
        $this->db->delete('tbl_detailpesanan', array('id_pesanan' => $id));
    }
}
