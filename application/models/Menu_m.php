<?php

class Menu_m extends CI_Model
{
    public function getAllMenu()
    {
        return $this->db->get('tbl_menu')->result_array();
    }

    public function idMenu()
    {
        $query = $this->db->query("SELECT IFNULL(MAX(SUBSTRING(id_menu,5)),0)+1 AS no_urut FROM tbl_menu");
        $data = $query->row_array();
        $no_urut = sprintf("%'.04d", $data['no_urut']);

        $id = 'M' . $no_urut;

        return $id;
    }

    function insertMenu($data)
    {
        $this->db->insert('tbl_menu', $data);
    }

    public function deleteMenu($id)
    {
        $this->db->delete('tbl_menu', array('id_menu' => $id));
    }

    public function updateMenu($id)
    {
        $data = [
            "id_kategoriMenu" => $this->input->post('id_kategoriMenu'),
            "namaMenu" => $this->input->post('namaMenu'),
            "harga" => $this->input->post('harga'),
            "ketersediaan" => $this->input->post('ketersediaan'),
            "deskripsi" => $this->input->post('deskripsi'),
            "fotoMenu" => $this->input->post('fotoMenu')

        ];
        $this->db->where('id_menu', $id);
        $this->db->update('tbl_menu', $data);
    }
}
