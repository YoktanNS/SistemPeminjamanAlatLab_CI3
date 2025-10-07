<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tambah Data Peminjaman</title>
</head>
<body>
  <center><h1>Tambah Data Peminjaman</h1></center>
  <form action="<?php echo base_url().'peminjaman/tambah_aksi'; ?>" method="post">
    <table style="margin:20px auto;">
      <tr><td>Nama Mahasiswa</td><td><input type="text" name="nama_mahasiswa" required></td></tr>
      <tr><td>Nama Alat</td><td><input type="text" name="nama_alat" required></td></tr>
      <tr><td>Tanggal Pinjam</td><td><input type="date" name="tanggal_pinjam" required></td></tr>
      <tr><td>Harus Kembali</td><td><input type="date" name="tanggal_kembali_expected" required></td></tr>
      <tr><td></td><td><input type="submit" value="Simpan"></td></tr>
    </table>
  </form>
</body>
</html>
