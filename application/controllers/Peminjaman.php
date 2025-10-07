<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->load->database();
    }

    // ✅ Menampilkan semua data
    public function index()
    {
        $data['peminjaman'] = $this->Peminjaman_model->get_all();
        $this->load->view('peminjaman_list', $data);
    }

    // ✅ Form tambah
    public function tambah()
    {
        $data['mahasiswa'] = $this->db->get('mahasiswa')->result();
        $data['alat'] = $this->db->get('alat')->result();
        $this->load->view('peminjaman_form', $data);
    }

    // ✅ Simpan data baru
    public function simpan()
    {
        $data = $this->_hitung_biaya();
        $this->Peminjaman_model->insert($data);
        redirect('peminjaman');
    }

    // ✅ Form edit
    public function edit($id)
    {
        $data['peminjaman'] = $this->Peminjaman_model->get_by_id($id);
        $data['mahasiswa'] = $this->db->get('mahasiswa')->result();
        $data['alat'] = $this->db->get('alat')->result();
        $this->load->view('peminjaman_edit', $data);
    }

    // ✅ Update data
    public function update()
    {
        $id = $this->input->post('id_peminjaman');
        $data = $this->_hitung_biaya();
        $this->Peminjaman_model->update($id, $data);
        redirect('peminjaman');
    }

    // ✅ Hapus data
    public function hapus($id)
    {
        $this->Peminjaman_model->delete($id);
        redirect('peminjaman');
    }

    // ✅ Hitung denda dan biaya otomatis
    private function _hitung_biaya()
    {
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');
        $tanggal_kembali_expected = $this->input->post('tanggal_kembali_expected');
        $tanggal_kembali_actual = $this->input->post('tanggal_kembali_actual');
        $status_rusak = $this->input->post('status_rusak');

        $telat = (strtotime($tanggal_kembali_actual) - strtotime($tanggal_kembali_expected)) / (60 * 60 * 24);
        $denda = ($telat > 3) ? ($telat - 3) * 2000 : 0;
        $biaya_perbaikan = ($status_rusak) ? 10000 : 0;
        $total_biaya = $denda + $biaya_perbaikan;

        return [
            'id_mahasiswa' => $this->input->post('id_mahasiswa'),
            'id_alat' => $this->input->post('id_alat'),
            'tanggal_pinjam' => $tanggal_pinjam,
            'tanggal_kembali_expected' => $tanggal_kembali_expected,
            'tanggal_kembali_actual' => $tanggal_kembali_actual,
            'denda' => $denda,
            'biaya_perbaikan' => $biaya_perbaikan,
            'total_biaya' => $total_biaya
        ];
    }
}
