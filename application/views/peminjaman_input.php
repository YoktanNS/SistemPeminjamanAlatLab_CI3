<h2>Tambah Peminjaman Alat</h2>
<form method="post" action="<?= site_url('peminjaman/simpan'); ?>">

  <label>Mahasiswa</label><br>
  <select name="id_mahasiswa" required>
    <option value="">-- Pilih Mahasiswa --</option>
    <?php foreach ($mahasiswa as $m): ?>
      <option value="<?= $m->id_mahasiswa; ?>"><?= $m->nama; ?></option>
    <?php endforeach; ?>
  </select><br><br>

  <label>Alat</label><br>
  <select name="id_alat" required>
    <option value="">-- Pilih Alat --</option>
    <?php foreach ($alat as $a): ?>
      <option value="<?= $a->id_alat; ?>"><?= $a->nama_alat; ?></option>
    <?php endforeach; ?>
  </select><br><br>

  <label>Tanggal Pinjam</label><br>
  <input type="date" name="tanggal_pinjam" required><br><br>

  <label>Tanggal Harus Kembali</label><br>
  <input type="date" name="tanggal_kembali_expected" required><br><br>

  <button type="submit">Simpan</button>
</form>
