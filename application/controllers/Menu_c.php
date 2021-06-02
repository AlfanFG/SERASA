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
            $this->load->model('KategoriMenu_m');
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

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error);
            redirect('Menu_c');
        } else {
            $name = $this->upload->data('file_name');
            return $name;
        }
    }

    public function addMenu()
    {
        $this->form_validation->set_rules('idMenu', 'ID Menu', 'required');
        $this->form_validation->set_rules('idKategori', 'ID Kategori Menu', 'required');
        $this->form_validation->set_rules('namaMenu', 'Nama Menu', 'required');
        $this->form_validation->set_rules('harga', 'Harga Menu', 'required');
        $this->form_validation->set_rules('ketersediaan', 'Ketersediaan', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if (empty($_FILES['image']['name'])) {
            $this->form_validation->set_rules('image', 'Foto', 'required');
        }


        if ($this->form_validation->run()) {

            echo $this->input->post('idMenu');
            echo $this->input->post('idKategori');
            echo $this->input->post('namaMenu');
            echo $this->input->post('harga');
            echo $this->input->post('ketersediaan');
            echo $this->input->post('deskripsi');
            echo $this->uploadImage();

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

            // redirect('Pegawai');
        } else {
            $json = array();
            $json = array(

                'idMenu' => form_error('idMenu', '<p class="mt-3 text-danger">', '</p>'),
                'idKategori' => form_error('idKategori', '<p class="mt-3 text-danger">', '</p>'),
                'namaMenu' => form_error('namaMenu', '<p class="mt-3 text-danger">', '</p>'),
                'harga' => form_error('harga', '<p class="mt-3 text-danger">', '</p>'),
                // 'jmlPermohonan' => form_error('jmlPermohonan', '<p class="mt-3 text-danger">', '</p>'),
                'ketersediaan' => form_error('ketersediaan', '<p class="mt-3 text-danger">', '</p>'),
                'deskripsi' => form_error('deskripsi', '<p class="mt-3 text-danger">', '</p>'),
                'foto' => form_error('foto', '<p class="mt-3 text-danger">', '</p>'),
                // 'jangkaWaktu' => form_error('jangkaWaktu', '<p class="mt-3 text-danger">', '</p>'),
                // 'mengetahui' => form_error('mengetahui', '<p class="mt-3 text-danger">', '</p>'),
                'status' => 'invalid'

            );


            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($json));
        }
    }

    public function delete($id)
    {
        $this->Menu_m->deleteMenu($id);
        redirect('Menu_c');
    }

    public function update()
    {
        $id = $this->input->post('idMenu');
        if (empty($_FILES["image"]["name"])) {
            $name = $this->input->post('old_image');
        } else {
            $name = $this->uploadImage();
        }
        $data = array(
            'id_menu' => $this->input->post('idMenu'),
            'id_kategoriMenu' => $this->input->post('idKategori'),
            'namaMenu' => $this->input->post('namaMenu'),
            'harga' => $this->input->post('harga'),
            'ketersediaan' => $this->input->post('ketersediaan'),
            'Deskripsi' => $this->input->post('deskripsi'),
            'fotoMenu' => $name

        );


        $this->Menu_m->updateMenu($data, $id);

        // redirect('Menu_c');
    }
}
