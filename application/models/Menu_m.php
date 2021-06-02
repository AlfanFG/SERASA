<?php

class Menu_m extends CI_Model
{
    public function getAllMenu()
    {
        return $this->db->get('tbl_menu')->result_array();
    }

    public function idMenu()
    {
        $query = $this->db->query("SELECT IFNULL(MAX(SUBSTRING(id_menu,4)),0)+1 AS no_urut FROM tbl_menu");
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

    function updateMenu($data, $id)
    {
        $this->db->where('id_menu', $id);
        $this->db->update('tbl_menu', $data);
        return TRUE;
    }
}
