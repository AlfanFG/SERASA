<?php

class databarang_m extends CI_Model
{


    public function getAllBarang()
    {
        return $this->db->get('tbl_barang')->result_array();
    }

    public function idBarang()
    {
        $query = $this->db->query(
            "SELECT IFNULL(MAX(SUBSTRING(id_barang,5)),0)+1 AS no_urut FROM tbl_barang"
        );
        $data = $query->row_array();
        $no_urut = sprintf("%'.04d", $data['no_urut']);

        $id = 'K' . $no_urut;


        return $id;
    }

    public function addBarang()
    {
        $data = [
            "id_barang" => $this->input->post('idBarang'),
            "id_menu" => $this->input->post('idBarang'),
            "namaBarang" => $this->input->post('namaBarang'),
            "qty" => $this->input->post('qty')
        ];
        $this->db->insert('tbl_barang', $data);
    }

    function hapusBarang($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('tbl_barang');
    }
}
