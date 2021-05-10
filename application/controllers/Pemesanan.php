<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
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
}
