<?php

class Menu_m extends CI_Model
{
    public function getAllMenu()  {
        return $this->db->get('tbl_menu')->result_array();
    }

    public function idMenu(){
        $query = $this->db->query(
            "SELECT IFNULL(MAX(SUBSTRING(id_menu,10)),0)+1 AS no_urut FROM tbl_menu"
        );
        $data = $query->row_array();
        $no_urut = sprintf("%'.04d", $data['no_urut']);

        $id = 'K' . $no_urut;


        return $id;
    }
    public function addMenu(){
        $data = [
            "id_menu" => $this->input->post('idMenu'),
            "id_kategoriMenu" => $this->input->post('idKategori'),
            "namaMenu" => $this->input->post('namaMenu'),
            "harga" => $this->input->post('harga'),
            "ketersediaan" => $this->input->post('ketersediaan'),
            "Deskripsi" => $this->input->post('deskripsi'),
            "fotoMenu" => $this->input->post('fotoMenu')
        ];
        $this->db->insert('tbl_menu', $data);
    }
}