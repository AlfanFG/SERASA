<?php

class KategoriMenu_m extends CI_Model
{
    public function getAllKategoriMenu()
    {
        return $this->db->get('tbl_kategorimenu')->result_array();
    }

    public function idKategoriMenu()
    {
        $query = $this->db->query(
            "SELECT IFNULL(MAX(SUBSTRING(id_kategoriMenu,5)),0)+1 AS no_urut FROM tbl_kategoriMenu"
        );
        $data = $query->row_array();
        $no_urut = sprintf("%'.04d", $data['no_urut']);

        $id = 'K' . $no_urut;


        return $id;
    }
    public function addKategoriMenu()
    {
        $data = [
            "id_kategoriMenu" => $this->input->post('idKategori'),
            "namaKategori" => $this->input->post('namaKategori')

        ];
        $this->db->insert('tbl_kategorimenu', $data);
    }

    public function deleteKategoriMenu($id)
    {
        $this->db->delete('tbl_kategorimenu', array('id_kategoriMenu' => $id));
    }

    public function updateKategoriMenu($id)
    {
        $data = [
            "namaKategori" => $this->input->post('namaKategori')
        ];
        $this->db->where('id_kategoriMenu', $id);
        $this->db->update('tbl_kategorimenu', $data);
    }
}
