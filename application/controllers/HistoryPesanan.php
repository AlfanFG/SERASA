<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HistoryPesanan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        //$this->load->library('form_validation');
        $this->load->model('HistoryPesanan_m');
        //$this->load->helper('file');
        $this->load->database();
    }
    //data pegawai  
    public function index()
    {
        $data['HistoryPesanan'] = $this->HistoryPesanan_m->getAllHistoryPesanan();
        $this->load->view('manajer/view_HistoryPesanan', $data);
    }
    public function getId()
    {
        $data[0] = $this->HistoryPesanan_m->id_transaksi();
        $data[1] = $this->HistoryPesanan_m->id_pesanan();

        echo json_encode($data);
    }
}
