<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    //  FUNGSI CRUD
    // fungsi  untuk mengambil data dari database
    function get_data($table)
    {
        return $this->db->get($table);
    }

    // fungsi untuk menginput data ke database
    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // fungsi untuk mengedit data
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    // fungsi untuk mengupdate atau mengubah data di database
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // fungsi untuk menghapus data daari database
    function delete_data($where, $table)
    {
        $this->db->delete($table, $where);
    }
    // AKHIR FUNGSI CRUD

    // profile outlet
    function select()
    {
        $result = $this->db->get('tb_profil');
        if ($result->num_rows() > 0)
            return $result->result()[0];
        else
            return $result->result();
    }

    function selectpaket()
    {
        $result = $this->db->get('tb_paket');
        if ($result->num_rows() > 0)
            return $result->result();
        else
            return $result->result();
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('tb_profil');
        $this->db->where('id_profil', $id);
        return $this->db->get()->row_array();
    }

    function selectkaryawan()
    {
        $result = $this->db->get('tb_karyawan');
        if ($result->num_rows() > 0)
            return $result->result()[0];
        else
            return $result->result();
    }

    function selectmember()
    {
        $result = $this->db->get('tb_member');
        if ($result->num_rows() > 0)
            return $result->result();
        else
            return $result->result();
    }

    function selectpengguna()
    {
        $result = $this->db->get('tb_user');
        if ($result->num_rows() > 0)
            return $result->result();
        else
            return $result->result();
    }

    public function
    generate_kode_member()
    {
        $this->db->select('RIGHT(tb_member.id_member,3) as kode', false);
        $this->db->order_by('id_member', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('tb_member');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax =
            str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "PL" . $kodemax;
        return $kodejadi;
    }

    public function
    generate_kode_user()
    {
        $this->db->select('RIGHT(tb_user.id_user,3) as kode', false);
        $this->db->order_by('id_user', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('tb_user');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax =
            str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "USR" . $kodemax;
        return $kodejadi;
    }

    public function
    total_karyawan()
    {
        return $this->db->get('tb_karyawan')->num_rows();
    }

    public function
    total_pelanggan()
    {
        return $this->db->get('tb_member')->num_rows();
    }

    public function
    total_pesanan()
    {
        return $this->db->get('tb_transaksi')->num_rows();
    }

    public function
    total_pesanan_baru()
    {
        $this->db->where('status', 'baru');
        return $this->db->get('tb_transaksi')->num_rows();
    }
    public function
    total_outlet()
    {
        return $this->db->get('tb_outlet')->num_rows();
    }
}
