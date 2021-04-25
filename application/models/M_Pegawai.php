<?php
class M_Pegawai extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function getDataPegawai()
    {
        $query = $this->db->get('tbl_pegawai');
        $this->db->order_by('id_pegawai', 'desc');

        return $query->result_array();
    }



    public function idManajer()
    {
        // $tahun_sekarang = date('Y');

        $query = $this->db->query(
            "SELECT IFNULL(MAX(SUBSTRING(id_pegawai,5)),0)+1 AS no_urut FROM tbl_pegawai WHERE id_jabatan = 1"
        );
        $data = $query->row_array();
        $no_urut = sprintf("%'.04d", $data['no_urut']);

        $id = 'M' . $no_urut;


        return $id;
    }

    public function idBarista()
    {
        // $tahun_sekarang = date('Y');

        $query = $this->db->query(
            "SELECT IFNULL(MAX(SUBSTRING(id_pegawai,5)),0)+1 AS no_urut FROM tbl_pegawai WHERE id_jabatan = 2"
        );
        $data = $query->row_array();
        $no_urut = sprintf("%'.04d", $data['no_urut']);

        $id = 'B' . $no_urut;

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
}
