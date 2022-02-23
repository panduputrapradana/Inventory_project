<?php

class Pelanggan_model extends CI_Model
{
    function select()
    {
        $result = $this->db->get('pelanggan');
        if ($result->num_rows() > 0)
            return $result->result();
        else
            return $result->result();
    }

    public function edit($id)
    {
    	$this->db->select('*');
    	$this->db->from('pelanggan');
    	$this->db->where('id', $id);
    	return $this->db->get()->row_array();
    }

    function hapus($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('pelanggan'))
            return true;
        else
            return false;
    }
}

/* End of file ModelName.php */
