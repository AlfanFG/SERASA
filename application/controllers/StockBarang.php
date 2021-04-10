<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockBarang extends CI_Controller
{
    public function index()
    {
        $dataBarang['stockBarang'] = $this->databarang_m->getAllBarang();
        $this->load->view('barista/StockBarang/stockbarang', $dataBarang);
    }

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        } else {

            $this->load->model('databarang_m');
            $this->load->library('form_validation');
        }
    }

    public function tambahBarang()
    {

        $dataBarang['stockBarang'] = $this->databarang_m->getAllBarang();

        $this->form_validation->set_rules('idBarang', 'Id Barang', 'required|trim');
        $this->form_validation->set_rules('idMenu', 'Id Menu', 'required|trim');
        $this->form_validation->set_rules('namaBarang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('qty', 'Quantity', 'required|trim');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('barista/StockBarang/stockbarang');
        } else {

            $this->databarang_m->addBarang();
            redirect('StockBarang');
        }
    }

    function hapusBarang($id_barang)
    {
        $this->databarang_m->hapusBarang($id_barang);
        redirect('StockBarang');
    }
}
