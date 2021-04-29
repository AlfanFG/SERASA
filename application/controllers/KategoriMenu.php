<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriMenu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        } else {

            $this->load->model('KategoriMenu_m');
            $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $dataKategori['kategoriMenu'] = $this->KategoriMenu_m->getAllKategoriMenu();
        $this->load->view('barista/v_dataKategoriMenu', $dataKategori);
    }
    public function tambah()
    {

        // $dataKategori['kategoriMenu'] = $this->KategoriMenu_m->getAllKategoriMenu();

        $this->form_validation->set_rules('idKategori', 'Id Kategori', 'required|trim');
        $this->form_validation->set_rules('namaKategori', 'Nama Kategori', 'required|trim');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('barista/v_dataKategoriMenu');
        } else {

            $this->KategoriMenu_m->addKategoriMenu();
            redirect('KategoriMenu');
        }
    }
    public function getId()
    {
        $data = $this->KategoriMenu_m->idKategoriMenu();
        echo json_encode($data);
    }

    public function delete($id)
    {
        $this->KategoriMenu_m->deleteKategoriMenu($id);
        redirect('KategoriMenu');
    }

    public function update()
    {
        $id = $this->input->post('idKategori');
        $this->form_validation->set_rules('namaKategori', 'Nama Kategori', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('barista/v_dataKategoriMenu');
        } else {

            $this->KategoriMenu_m->updateKategoriMenu($id);
            redirect('KategoriMenu');
        }
    }
}
