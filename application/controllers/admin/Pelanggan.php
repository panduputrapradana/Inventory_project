<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('admin/Pelanggan_model', 'PelangganModel');

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
        $data['pelanggan'] = $this->PelangganModel->select();
        $this->load->view('admin/pelanggan/pelanggan', $data);
    }

    public function tambah()
    {
        $data['pelanggan'] = $this->PelangganModel->select();
        $this->load->view('admin/pelanggan/tambah_pelanggan', $data);
    }

    public function simpan()
    {
        $this->load->library('form_validation', 'upload');

        $this->form_validation->set_rules('id', 'Id', 'trim|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('instagram', 'Instagram', 'required|trim|min_length[1]|max_length[255]|is_unique[pelanggan.instagram]', [
            'required' => 'Instagram Wajib Diisi !',
            'is_unique' => 'Username Instagram Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|min_length[9]|max_length[14]', [
            'min_length' => 'Masukkan No telepon aktif minimal 9 angka!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['pelanggan'] = $this->PelangganModel->select();
            $this->load->view('admin/pelanggan/tambah_pelanggan', $data);
            $this->load->library('form_validation');
        } else {

            $id        = $this->input->post('id');
            $instagram = $this->input->post('instagram');
            $facebook  = $this->input->post('facebook');
            $nama      = $this->input->post('nama');
            $telepon   = $this->input->post('telepon');

            

            $pelanggan = array(
                'id'        => $id,
                'instagram' => $instagram,
                'facebook'  => $facebook,
                'nama'      => $nama,
                'telepon'   => $telepon

            );
            $this->db->insert('pelanggan', $pelanggan);

            $this->session->set_flashdata('pelanggan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/pelanggan');
        }
    }

    public function edit($id)
    {
        $data['pelanggan'] = $this->PelangganModel->edit($id);
        $this->load->view('admin/pelanggan/edit_pelanggan', $data);
    }

    public function simpan_edit()
    {
        $this->load->library('form_validation', 'upload');

        $this->form_validation->set_rules('id', 'Id', 'trim|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('instagram', 'Instagram', 'trim|min_length[1]|max_length[255]', [
        ]);
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|min_length[9]|max_length[14]', [
            'min_length' => 'Masukkan No telepon aktif minimal 9 angka!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/pelanggan/edit_pelanggan', $data);
            $this->load->library('form_validation');
        } else {

            $id        = $this->input->post('id');
            $instagram = $this->input->post('instagram');
            $facebook  = $this->input->post('facebook');
            $nama      = $this->input->post('nama');
            $telepon   = $this->input->post('telepon');

            

            $pelanggan = array(
                'instagram' => $instagram,
                'facebook'  => $facebook,
                'nama'      => $nama,
                'telepon'   => $telepon
           
            );

            $this->db->update('pelanggan', $pelanggan, [
                'id'        => $id,
            ]);

            $this->session->set_flashdata('epelanggan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah diedit! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/pelanggan');
        }
    }

    public function hapus($id)
    {
        if ($this->PelangganModel->hapus($id))
            $this->session->set_flashdata('hpelanggan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        else
            $this->session->set_flashdata('hpelanggan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data gagal dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('admin/pelanggan');
    }

    public function keluar()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', 'Logout berhasil, success');
        redirect('login?alert=logout');
    }


    // END CRUD MEMBER   
}
