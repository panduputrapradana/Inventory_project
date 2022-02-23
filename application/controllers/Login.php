<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login/m_login', 'Mlogin');
    }

    public function index()
    {
        $this->load->view('login/form_login');
    }

    public function ceklogin()
    {
        $this->load->library('form_validation', 'upload');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != false) {

            // Menangkap data username dan password dari halaman login
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $where = array(
                'username' => $username,
                'password' => md5($password)
            );
            $this->load->model('Mlogin');

            // Cek kesesuaian login pada table pengguna
            $cek = $this->Mlogin->cek_login('user', $where)->num_rows();

            // Cek jika Login benar
            if ($cek > 0) {

                // ambil data penggunna yang melakukan login
                $data = $this->Mlogin->cek_login('user', $where)->row();
                $level = $data->level;
                if ($level == 'admin') {
                    // buat session untuk pengguna yang berhasil login
                    $data_session = array(
                       'id'       => $data->id,
                       'nama'     => $data->nama,
                       'username' => $data->username,
                       'level'    => $data->level,
                       'status'   => 'telah_login'
                    );

                    $this->session->set_userdata($data_session);


                    // alihkan halaman ke halaman dashboard pengguna yang berasil login

                    redirect(base_url('admin/home'));
                }
            } else {
                $this->session->set_flashdata('pesan', 'Username & Password tidak sesuai, error');
                redirect(base_url() . 'login?alert=gagal');
            }
        } else {
            $this->load->view('login/form_login');
        }
    }
}
