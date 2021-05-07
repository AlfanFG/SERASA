<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_c extends CI_Controller{
    function __construct(){
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }else{
            $this->load->model('Menu_m');
            $this->load->library('form_validation');
        }
    }

    public function index(){
        $dataMenu['dataMenu'] = $this->Menu_m->getAllMenu();
        $this->load->view('barista/Menu', $dataMenu);
    }
}