<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
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
            $this->load->library('form_validation');
            $this->load->model('Pemesanan_m');
            $this->load->helper('file');
        }
        // if (!isset($_SERVER['HTTP_REFERER'])) {

        //     $this->load->helper('url');
        //     redirect('/page404');
        // }

    }

    public function index()
    {
        $data['pemesanan'] = $this->Pemesanan_m->getDataMenu();
        $data['kategori'] = $this->Pemesanan_m->getDataKategori();
        $this->load->view('barista/v_pemesanan', $data);
    }

    public function getMenuById($id)
    {
        $data = $this->Pemesanan_m->getDataMenuById($id);
        echo json_encode($data);
    }

    public function insertPemesanan()
    {
        $arr = $this->input->post('arr');
        $total = $this->input->post('tot');
        $idPesanan = $this->input->post('id');
        $bayar = $this->input->post('bayar');
        $nama = $this->input->post('nama');


        date_default_timezone_set('Asia/Jakarta');
        $tgl = date('Y-m-d H:i');
        $data = array(
            'id_pesanan' => $idPesanan,
            'id_pegawai' => $this->session->userdata('idpegawai'),
            'tgl_pesan' => $tgl,
            'nama_Customer' => $nama,
            'bayar' => $bayar,
            'total' => $total

        );
        $this->db->insert('tbl_pesanan', $data);

        foreach ($arr as $row) {
            $data = array(
                'id_pesanan' => $idPesanan,
                'id_menu' => $row[4],
                'Qty' => $row[2],
                'subTotal' => $row[3]
            );
            $this->Pemesanan_m->insertDataPemesanan($data);
        }

        // for ($i = 0; $i <= count($data); $i++) {
        //     for ($j = 0; $j <= count($data[$i]); $j++) {
        //         echo $data[$i][$j];
        //     }
        // }
        redirect('Pegawai');
    }

    public function indexPesanan()
    {
        $halamanOrder['Orders'] = $this->Pemesanan_m->getAllOrder();
        $this->load->view('barista/v_Order', $halamanOrder);
    }
    public function detailOrder($id)
    {
        $data['Details'] = $this->Pemesanan_m->getOrderDetails($id);
        $data['Nama'] = $this->Pemesanan_m->getCustomerName($id);
        $this->load->view('barista/v_detailOrder', $data);
    }

    public function cetak($id)
    {
        $data['Orders'] = $this->Pemesanan_m->getOrderDetails($id);
        $data['Nama'] = $this->Pemesanan_m->getCustomerName($id);
        $data['Id'] = $this->Pemesanan_m->getID($id);
        $this->load->view('print_Struk', $data);
        // $mpdf = new \Mpdf\Mpdf();
        // $doc = $this->load->view('print_Struk', $data, TRUE);;
        // $mpdf->WriteHTML($doc);
        // $mpdf->Output();
    }
    public function delete($id)
    {
        $this->Pemesanan_m->deleteDetail($id);
        $this->Pemesanan_m->deleteOrder($id);
        redirect('Pemesanan/indexPesanan');
    }
}
