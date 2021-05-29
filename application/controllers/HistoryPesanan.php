<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HistoryPesanan extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        if ($this->session->userdata('idJabatan') == 2) {
            echo 'Anda tidak bisa mengakses halaman ini';
            die();
        } else if ($this->session->userdata('status') != "login") {
            redirect(base_url("auth"));
        } else {
            //$this->load->library('form_validation');
            $this->load->model('HistoryPesanan_m');
            //$this->load->helper('file');
            $this->load->database();
        }
    }
    //data pegawai  
    public function index()
    {
        $data['HistoryPesanan'] = $this->HistoryPesanan_m->getAllHistoryPesanan();
        $this->load->view('manajer/view_HistoryPesanan', $data);
    }

    public function detail($id)
    {
        $data['Details'] = $this->HistoryPesanan_m->getOrderDetails($id);
        $data['Nama'] = $this->HistoryPesanan_m->getCustomerName($id);
        $this->load->view('manajer/v_detailOrder', $data);
    }

    public function getId()
    {
        $data[0] = $this->HistoryPesanan_m->id_transaksi();
        $data[1] = $this->HistoryPesanan_m->id_pesanan();

        echo json_encode($data);
    }
    public function print($id)
    {
        $data['Orders'] = $this->HistoryPesanan_m->getOrderDetails($id);
        $data['Nama'] = $this->HistoryPesanan_m->getCustomerName($id);
        $this->load->view('print_Struk', $data);
    }
}
