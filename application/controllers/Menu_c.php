<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_c extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        } else {
            $this->load->model('Menu_m');
            $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $dataMenu['dataMenu'] = $this->Menu_m->getAllMenu();
        $this->load->view('barista/Menu', $dataMenu);
    }
    public function getId()
    {
        $data = $this->Menu_m->idMenu();
        echo json_encode($data);
    }

    public function delete($id)
    {
        $this->Menu_m->deleteMenu($id);
        redirect('Menu_c');
    }

    public function update()
    {
        $id = $this->input->post('idMenu');
        $this->form_validation->set_rules('idKategoriMenu', 'ID Kategori', 'required|trim');
        $this->form_validation->set_rules('namaMenu', 'Nama Menu', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('ketersediaan', 'Ketersediaan', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('fotoMenu', 'Foto Menu', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('barista/v_Menu');
        } else {

            $this->Menu_m->updateMenu($id);
            redirect('Menu_c');
        }
    }
}
