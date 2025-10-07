<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

    private $table = 'peminjaman';

    public function get_all()
    {
        $this->db->select('p.*, m.nama as nama_mahasiswa, a.nama_alat');
        $this->db->from($this->table . ' p');
        $this->db->join('mahasiswa m', 'm.id_mahasiswa = p.id_mahasiswa');
        $this->db->join('alat a', 'a.id_alat = p.id_alat');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id_peminjaman', $id);
        return $this->db->get($this->table)->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_peminjaman', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_peminjaman', $id);
        return $this->db->delete($this->table);
    }
}
