<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('idJabatan') == 1) {
            echo 'Anda tidak bisa mengakses halaman ini';
            die();
        } else if ($this->session->userdata('status') != "login") {
            redirect(base_url("auth"));
        } else {

            $this->load->model('Order_M');
            $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $halamanOrder['Orders'] = $this->Order_M->getAllOrder();
        $this->load->view('barista/v_Order', $halamanOrder);
    }

    public function detailOrder($id)
    {
        $data['Details'] = $this->Order_M->getOrderDetails($id);
        $data['Nama'] = $this->Order_M->getCustomerName($id);
        $this->load->view('barista/v_detailOrder', $data);
    }
}
