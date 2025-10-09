<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->load->database();
    }

    // ✅ Tampilkan semua data peminjaman
    public function index()
    {
        $data['peminjaman'] = $this->Peminjaman_model->get_all();
        $this->load->view('peminjaman_list', $data);
    }

    // ✅ Form tambah peminjaman
    public function tambah()
    {
        $data['mahasiswa'] = $this->db->get('mahasiswa')->result();
        $data['alat'] = $this->db->get('alat')->result();
        $this->load->view('peminjaman_form', $data);
    }

    // ✅ Simpan peminjaman baru (tanpa denda & pengembalian)
    public function simpan()
    {
        $data = [
            'id_mahasiswa' => $this->input->post('id_mahasiswa'),
            'id_alat' => $this->input->post('id_alat'),
            'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'tanggal_kembali_expected' => $this->input->post('tanggal_kembali_expected'),
            'tanggal_kembali_actual' => null,
            'denda' => 0,
            'biaya_perbaikan' => 0,
            'total_biaya' => 0
        ];

        $this->Peminjaman_model->insert($data);
        redirect('peminjaman');
    }

    // ✅ Form edit (untuk pengembalian)
    public function edit($id)
    {
        $data['peminjaman'] = $this->Peminjaman_model->get_by_id($id);
        $data['mahasiswa'] = $this->db->get('mahasiswa')->result();
        $data['alat'] = $this->db->get('alat')->result();
        $this->load->view('peminjaman_edit', $data);
    }

    // ✅ Form Pengembalian
    public function pengembalian($id)
    {
        $data['peminjaman'] = $this->Peminjaman_model->get_by_id($id);
        $this->load->view('peminjaman_pengembalian', $data);
    }

    // ✅ Simpan Pengembalian
    public function simpan_pengembalian()
    {
        $id = $this->input->post('id_peminjaman');
        $tanggal_kembali_expected = $this->input->post('tanggal_kembali_expected');
        $tanggal_kembali_actual = $this->input->post('tanggal_kembali_actual');
        $status_rusak = $this->input->post('status_rusak');

        // Hitung selisih hari
        $telat = (strtotime($tanggal_kembali_actual) - strtotime($tanggal_kembali_expected)) / (60 * 60 * 24);
        $denda = ($telat > 3) ? ($telat - 3) * 2000 : 0;
        $biaya_perbaikan = ($status_rusak) ? 10000 : 0;
        $total_biaya = $denda + $biaya_perbaikan;

        // Update hanya field pengembalian
        $data = [
            'tanggal_kembali_actual' => $tanggal_kembali_actual,
            'denda' => $denda,
            'biaya_perbaikan' => $biaya_perbaikan,
            'total_biaya' => $total_biaya
        ];

        $this->Peminjaman_model->update($id, $data);
        redirect('peminjaman');
    }


    // ✅ Update data (otomatis hitung denda dan biaya)
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

    // ✅ Hitung denda & biaya otomatis (dipanggil saat pengembalian)
    private function _hitung_biaya()
    {
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');
        $tanggal_kembali_expected = $this->input->post('tanggal_kembali_expected');
        $tanggal_kembali_actual = $this->input->post('tanggal_kembali_actual');
        $status_rusak = $this->input->post('status_rusak');

        // Hitung telat dalam hari
        $telat = 0;
        if ($tanggal_kembali_actual && $tanggal_kembali_expected) {
            $telat = (strtotime($tanggal_kembali_actual) - strtotime($tanggal_kembali_expected)) / (60 * 60 * 24);
        }

        // Aturan denda: jika > 3 hari, Rp2.000 per hari lewat dari 3
        $denda = ($telat > 3) ? ($telat - 3) * 2000 : 0;

        // Jika alat rusak → biaya tambahan 10.000
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
