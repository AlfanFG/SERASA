<?php

class KategoriMenu_m extends CI_Model
{
    public function getAllKategoriMenu()
    {
        return $this->db->get('tbl_kategorimenu')->result_array();
    }

    public function addKategoriMenu()
    {
        $data = [
            "id_kategoriMenu" => $this->input->post('idKategori'),
            "namaKategori" => $this->input->post('namaKategori')

        ];
        $this->db->insert('tbl_kategorimenu', $data);
    }
}
