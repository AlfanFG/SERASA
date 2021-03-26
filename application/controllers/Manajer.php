<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajer extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $nama = $_SESSION['Nama'];
        $jabatan = $_SESSION['idJabatan'];
        echo 'Selamat datang' . ' ' . $nama . '. ' . 'Di halaman Manajer';

        // $data['tbl_pegawai'] = $this->db->get_where('tbl_pegawai', ['id_pegawai' => $this->session->userdata('id_pegawai')])->row_array();
        // echo 'Selamat datang' . $data['tbl_pegawai']['namaPegawai'];
    }
}
