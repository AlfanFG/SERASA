<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {

            $dataPage = [
                'title' => 'Login | Form'
            ];
            $this->load->view('auth/login',  $dataPage);
        } else {

            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_login', ['username' => $username])->row_array();
        $pegawai = $this->db->get_where('tbl_pegawai', ['id_pegawai' => $user['id_pegawai']])->row_array();

        // User available
        if ($user) {
            // Password Match
            if (($password == $user['password'])) {
                $data = [

                    'idJabatan' => $pegawai['id_jabatan'],
                    'Nama' => $pegawai['namaPegawai'],
                    'tglLahir' => $pegawai['tgl_lahir'],
                    'Alamat' => $pegawai['alamat'],
                    'noTelp' => $pegawai['no_telp'],
                    'foto' => $pegawai['foto'],
                    'status' => 'login'
                ];
                $this->session->set_userdata($data);
                if ($data['idJabatan'] == 1) {

                    redirect('manajer');
                } else {

                    redirect('barista');
                }
            } else {
                $dataPage = [
                    'title' => 'Login | Form'
                ];
                $this->load->view('auth/login',  $dataPage);
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("auth"));
    }
}
