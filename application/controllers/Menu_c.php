<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_c extends CI_Controller
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

    public function uploadImage()
    {
        $config['upload_path']          = './assets/images/menu_kategori';
        $config['allowed_types']        = 'png|jpg|gif|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 40000;
        $config['max_height']           = 40000;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $fotoMenu = "fotoMenu";
        if (!$this->upload->do_upload($fotoMenu)) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect('Menu_c');
        } else {
            $name = $this->upload->data('file_name');
            return $name;
        }
    }

    public function addMenu()
    {
        $data = array(
            'id_menu' => $this->input->post('idMenu'),
            'id_kategoriMenu' => $this->input->post('idKategori'),
            'namaMenu' => $this->input->post('namaMenu'),
            'harga' => $this->input->post('harga'),
            'ketersediaan' => $this->input->post('ketersediaan'),
            'Deskripsi' => $this->input->post('deskripsi'),
            'fotoMenu' => $this->uploadImage()
        );
        $this->Menu_m->insertMenu($data);
        return redirect('Menu_c');
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
