<?php

class Transaksi_model extends CI_Model
{
    public function
    getAllTransaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->order_by('idt', 'desc');
        $this->db->join('pelanggan', 'transaksi.pelanggan = pelanggan.id');
        return $this->db->get()->result();
    }

    public function
    update_status($idt, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('idt', $idt);
        $this->db->update('transaksi');
    }

    public function
    update_status1($idt, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('idt', $idt);
        $this->db->update('transaksi');
    }

    function hapus($idt)
    {
        $this->db->where('idt', $idt);
        if ($this->db->delete('transaksi'))
            return true;
        else
            return false;
    }
}

/* End of file ModelName.php */
