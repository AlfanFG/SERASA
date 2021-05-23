<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("auth"));
        }
        if (!isset($_SERVER['HTTP_REFERER'])) {

            $this->load->helper('url');
            redirect('/page404');
        }
        $this->load->library('form_validation');
        $this->load->model('Pemesanan_m');
        $this->load->helper('file');
    }

    public function index()
    {
        $data['pemesanan'] = $this->Pemesanan_m->getDataMenu();
        $data['kategori'] = $this->Pemesanan_m->getDataKategori();
        $this->load->view('barista/v_pemesanan', $data);
    }

    public function getMenuById($id)
    {
        $data = $this->Pemesanan_m->getDataMenuById($id);
        echo json_encode($data);
    }

    public function insertPemesanan($namaCust)
    {
        $arr = $this->input->post('arr');
        $tgl = date('YMd');

        foreach ($arr as $row) {
            $data = array(
                'id_pesanan' => '001',
                'id_menu' => $row[4],
                'id_pegawai' => $this->session->userdata('idPegawai'),
                'namaCustomer' => $namaCust,
                'tgl_pesan' => $tgl,
                'jml_pesan' => $row[2],
                'totalHarga' => $row[1]
            );
            $this->Pemesanan_m->insertDataPemesanan($data);
        }

        // for ($i = 0; $i <= count($data); $i++) {
        //     for ($j = 0; $j <= count($data[$i]); $j++) {
        //         echo $data[$i][$j];
        //     }
        // }

    }
}
