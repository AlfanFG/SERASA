<?php
class M_dataMasterManajer extends CI_Model
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
            "SELECT IFNULL(MAX(SUBSTRING(id_pegawai,5)),0)+1 AS no_urut FROM tbl_pegawai"
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
            "SELECT IFNULL(MAX(SUBSTRING(id_pegawai,5)),0)+1 AS no_urut FROM tbl_pegawai"
        );
        $data = $query->row_array();
        $no_urut = sprintf("%'.04d", $data['no_urut']);

        $id = 'B' . $no_urut;


        return $id;
    }

    function insertPegawai()
    {
        $id = $this->idManajer();
        $file_name = $_FILES['foto']['name'];

        $data = array(
            'id_pegawai' => $id,
            'id_jabatan' => $this->input->post('idJabatan'),
            'namaPegawai' => $this->input->post('namaPegawai'),
            'tgl_lahir' => $this->input->post('tglLahir'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('noTelp'),
            'foto' => $file_name

        );
        $this->db->insert('tbl_pegawai', $data);
    }
}
