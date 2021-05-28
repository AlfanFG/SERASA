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
}
