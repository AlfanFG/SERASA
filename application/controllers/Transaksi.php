<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('idJabatan') == 2) {
            echo 'Anda tidak bisa mengakses halaman ini';
            die();
        } else if ($this->session->userdata('status') != "login") {
            redirect(base_url("auth"));
        } else {
            $this->load->model('M_Transaksi');
            $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $data['dataTransaksi'] = $this->M_Transaksi->getDataTransaksi();
        $this->load->view('manajer/transaksi', $data);
    }

    // public function print()
    // {
    //     $data['transaksi'] = $this->M_Transaksi->getDataTransaksi();
    //     $this->load->view('manajer/print_transaksi', $data);
    // }
    public function print()
    {
        $tglawal = $this->input->post('tglawal');
        $tglakhir = $this->input->post('tglakhir');
        $data['transaksi'] = $this->M_Transaksi->getFilter($tglawal, $tglakhir);
        $this->load->view('manajer/print_transaksi', $data);
    }

    public function filter()
    {
        $tglawal = $this->input->post('tglawal');
        $tglakhir = $this->input->post('tglakhir');
        $submittype = $this->input->post('submittype');
        if ($submittype == 'filter') {
            $data['dataTransaksi'] = $this->M_Transaksi->getFilter($tglawal, $tglakhir);
            $data['tglawal'] = $tglawal;
            $data['tglakhir'] = $tglakhir;
            $this->load->view('manajer/transaksi', $data);
        } else if ($submittype == 'print') {
            $data['transaksi'] = $this->M_Transaksi->getFilter($tglawal, $tglakhir);
            $this->load->view('manajer/print_transaksi', $data);
        }
    }
}
