<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('admin/Transaksi_model', 'TransaksiModel');

        // Cek session yang login,
        // jika session status tidak sama dengan session telahlogin, berarti pengguna belum login
        // maka halaman akan di alihkan kembali ke halaman login.
        if ($this->session->userdata('status') != "telah_login") {
            $this->session->set_flashdata('pesan', 'Anda Harus Login Terlebih Dahulu, error');
            redirect(base_url() . 'login?alert=belum_login');
        }
    }

    public function index()
    {
        $data['transaksi'] = $this->TransaksiModel->getAllTransaksi();
        $this->load->view('admin/transaksi/transaksi', $data);
    }

    public function tambah()
    {
        $data['pelanggan'] = $this->db->get('pelanggan')->result();
        $this->load->view('admin/transaksi/tambah_transaksi', $data);
    }

    public function simpan()
    {
        $this->load->library('form_validation', 'upload');

        $this->form_validation->set_rules('idt', 'Idt', 'trim|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('pelanggan', 'Pelanggan', 'required|trim|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('tgl_masuk', 'Tgl_Masuk', 'trim|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('total', 'Total', 'required|trim|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('status', 'Status', 'trim|min_length[1]|max_length[255]');

        if ($this->form_validation->run() == false) {
            $data['pelanggan'] = $this->db->get('pelanggan')->result();
            $this->load->view('admin/transaksi/tambah_transaksi', $data);
            $this->load->library('form_validation');
        } else {

            $id        = $this->input->post('idt');
            $pelanggan = $this->input->post('pelanggan');
            $tgl_masuk = $this->input->post('tgl_masuk');
            $total     = $this->input->post('total');
            $status    = $this->input->post('status');

            

            $transaksi = array(
                'idt'        => $idt,
                'pelanggan' => $pelanggan,
                'tgl_masuk' => $tgl_masuk,
                'total'     => $total,
                'status'    => $status

            );
            $this->db->insert('transaksi', $transaksi);

            $this->session->set_flashdata('pelanggan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/transaksi');
        }
    }

    public function update_status()
    {
        $idt = $this->input->post('idt');
        $status = $this->input->post('stt');
        if ($status == "belum_lunas") {
            $this->TransaksiModel->update_status($idt, $status);
        } else {
            $this->TransaksiModel->update_status1($idt, $status);
        }
    }

    public function hapus($idt)
    {
        if ($this->TransaksiModel->hapus($idt))
            $this->session->set_flashdata('hpelanggan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        else
            $this->session->set_flashdata('hpelanggan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data gagal dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('admin/transaksi');
    }

    public function keluar()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', 'Logout berhasil, success');
        redirect('login?alert=logout');
    }


    // END CRUD MEMBER   
}
