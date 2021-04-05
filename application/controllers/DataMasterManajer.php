<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataMasterManajer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->library('upload');
        $this->load->model('M_dataMasterManajer');
    }
    //data pegawai  
    public function index()
    {

        $data['dataPegawai'] = $this->M_dataMasterManajer->getDataPegawai();


        $this->load->view('manajer/v_dataPegawai', $data);
    }
    public function getId()
    {
        $data[0] = $this->M_dataMasterManajer->idManajer();
        $data[1] = $this->M_dataMasterManajer->idBarista();
        echo json_encode($data);
    }


    public function addManajer()
    {
        if ($this->input->post()) {
            $this->M_dataMasterManajer->insertPegawai();
            echo "Data Inserted";
        } else {
            echo 'gagal';
        }
    }
}
