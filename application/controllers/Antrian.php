<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        if ($this->session->userdata('idJabatan') == 1) {
            echo 'Anda tidak bisa mengakses halaman ini';
            die();
        } else if ($this->session->userdata('status') != "login") {
            redirect(base_url("auth"));
        }
    }

    public function index()
    {

        $this->load->view('barista/v_antrianPemesanan');
    }
}
