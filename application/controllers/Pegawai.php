<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }

        $this->load->model('M_Pegawai');
        $this->load->helper('file');
    }
    //data pegawai  
    public function index()
    {
        $data['dataPegawai'] = $this->M_Pegawai->getDataPegawai();
        $this->load->view('manajer/v_dataPegawai', $data);
    }
    public function getId()
    {
        $data[0] = $this->M_Pegawai->idManajer();
        $data[1] = $this->M_Pegawai->idBarista();

        echo json_encode($data);
    }

    public function uploadImage()
    {
        $config['upload_path']          = './assets/images';
        $config['allowed_types']        = 'png|jpg|gif|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 40000;
        $config['max_height']           = 40000;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error);
            redirect('Pegawai');
        } else {
            $name = $this->upload->data('file_name');
            return $name;
        }
    }

    public function addPegawai()
    {

        $data = array(
            'id_pegawai' => $this->input->post('idPegawai'),
            'id_jabatan' => $this->input->post('idJabatan'),
            'namaPegawai' => $this->input->post('namaPegawai'),
            'tgl_lahir' => $this->input->post('tglLahir'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('noTelp'),
            'foto' => $this->uploadImage()

        );
        $this->M_Pegawai->insertPegawai($data);

        redirect('Pegawai');

        // $insert = $this->M_Pegawai->insertGambar($name);
    }

    public function editPegawai()
    {
        $id = $this->input->post('idPegawai');
        if (empty($_FILES["image"]["name"])) {
            $name = $this->input->post('old_image');
        } else {
            $name = $this->uploadImage();
        }
        $data = array(
            'id_jabatan' => $this->input->post('idJabatan'),
            'namaPegawai' => $this->input->post('namaPegawai'),
            'tgl_lahir' => $this->input->post('tglLahir'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('noTelp'),
            'foto' => $name
        );

        $this->M_Pegawai->updatePegawai($data, $id);
        echo $name;
        redirect('Pegawai');

        // $insert = $this->M_Pegawai->insertGambar($name);
    }


    public function deletePegawai($id)
    {
        $this->db->where('id_pegawai', $id);
        $query = $this->db->get('tbl_pegawai');
        $row = $query->row();

        if ($row->foto != "") {
            $path = './assets/images/' . $row->foto;
            unlink($path);
            $this->M_Pegawai->deletePegawai($id);
        } else {
            redirect('Manajer');
        }
    }
}
