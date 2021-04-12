<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barista extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }


    //     public function index()
    //     {
    //         // $nama = $_SESSION['Nama'];
    //         // $jabatan = $_SESSION['idJabatan'];
    // <<<<<<< .merge_file_a11104
    //         echo 'Selamat datang' . ' ' . $nama . '. ' . 'Di halaman Manajer';

    //         $data['tbl_pegawai'] = $this->db->get_where('tbl_pegawai', ['id_pegawai' => $this->session->userdata('id_pegawai')])->row_array();
    //         echo 'Selamat datang' . $data['tbl_pegawai']['namaPegawai'];
    //         $this->load->view('barista/index');
    // =======
    //         echo 'Selamat datang' . ' ' . $nama . '. ' . 'Di halaman Barista';

    //         $data['tbl_pegawai'] = $this->db->get_where('tbl_pegawai', ['id_pegawai' => $this->session->userdata('id_pegawai')])->row_array();
    //         echo 'Selamat datang' . $data['tbl_pegawai']['namaPegawai'];
    //         $this->load->view('manajer/dataPegawai');
    // >>>>>>> .merge_file_a16652
    //     }
}
